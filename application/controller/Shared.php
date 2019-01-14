<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace controller;

use bin\Config;
use nb\Server;
use util\Controller;
use util\Redis;

/**
 * Shared
 *
 * @package controller
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/11
 */
class Shared extends Controller {

    public function index($map='0000') {
        $this->assign('ak','DD205ad29d809f6a8cc23d82189745fa');
        $ip = Config::$o->ip;
        $this->assign('server',"ws://{$ip}:9503");
        $this->assign('map',$map);
        $this->display('shared');
    }


    //注册我的地图信息，同时得到该地图的其它用户信息
    public function enroll($map) {
        $serv = Server::driver();
        $fd = $serv->fd;
        Redis::set('fd:'.$fd,$map);

        $data = Redis::hGetAll('map:'.$map);

        //移除自己的位置信息
        unset($data[$fd]);

        $serv->push($fd,json_encode([
            'action'=> 'reply-enroll',
            'data'=>$data
        ]));
    }

    //更新我的位置，并通知地图上的其它用户
    public function post($map,$lat,$lng) {
        $serv = Server::driver();
        $mefd =  $serv->fd;

        $data = Redis::hGetAll('map:'.$map);

        Redis::hmset('map:'.$map,[
            $mefd=>$lng.':'.$lat,
        ]);

        unset($data[$mefd]);

        foreach($data as $fd=>$pos) {
            $serv->push($fd,json_encode([
                'action'=> 'push-postion',
                'fd'=>$mefd,
                'lat'=>$lat,
                'lng'=>$lng
            ]));
        }
    }

}