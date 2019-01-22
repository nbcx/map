<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace model;

use nb\Model;

/**
 * Supplier
 *
 * @package model
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/6
 */
class Supplier extends Model {

    public static function nearby($lng,$lat, $start=1, $rows=10,$search=null) {
        $er = 6366.564864;
        $dist=200; #Search radius (km)

        $lat_length = 111.132944;//20003.93/180; #lat length

        $db = self::dao()->field("*,ROUND({$er}*2*ASIN(SQRT(POWER(SIN(({$lat} - latitude)*pi()/180 / 2), 2 ) +  COS({$lat} * pi()/180) * COS(latitude * pi()/180) *  POWER(SIN(({$lng}- longitude) * pi() /180 / 2), 2) )),2) as dist");
        $db->where('deleted=0');

        $search and $db->like('name',$search);
        $db->between('latitude',"({$lat} - ({$dist}/{$lat_length})) AND ({$lat} + ({$dist}/{$lat_length}))");
        $db->between('longitude',"({$lng}-{$dist}/abs(cos(radians({$lat}))*{$lat_length})) AND ({$lng}+{$dist}/abs(cos(radians({$lat}))*{$lat_length}))");

        $db->having("dist < ?",$dist);
        $db->orderby('dist');
        $db->limit($rows,$start);
        return $db->paginate();
    }

}