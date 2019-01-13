<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace util;

use model\Room;
use nb\event\Swoole;

/**
 *
 * User: Collin
 * QQ: 1169986
 * Date: 17/12/2 下午4:46
 */
class Websocket extends Swoole {

    public function connect($server, $fd) {
        echo "connection open: {$fd}\n";
    }


    public function close($server, $fd) {
        //删除位置缓存信息
        $map = Redis::get('fd:'.$fd);
        Redis::delete('fd:'.$fd);

        if(!$map) {
            return false;
        }

        Redis::hdel('map:'.$map,$fd);

        //通知该地图其它用户有用户掉线
        $data = Redis::hGetAll('map:'.$map);
        foreach($data as $k=>$ll) {
            $server->push($k,json_encode([
                'action' => 'push-exit',
                'fd'=>$fd
            ]));
        }
    }

    public function shutdown() {

    }

}