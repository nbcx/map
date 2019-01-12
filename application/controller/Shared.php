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

use util\Controller;

/**
 * Shared
 *
 * @package controller
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/11
 */
class Shared extends Controller {

    public function index() {
        $this->assign('ak','DD205ad29d809f6a8cc23d82189745fa');
        $this->display('shared');
    }

    public function post($lat,$lng) {
        $serv = Server::driver();
        $conn_list = Server::driver()->getClientList(0, 100);
        if ($conn_list===false or count($conn_list) === 0) {
            echo "finish\n";
            return;
        }
        //$start_fd = end($conn_list);
        //var_dump($conn_list);
        foreach($conn_list as $fd) {
            $serv->push($fd,json_encode([
                'action'=> 'push-postion',
                'fd'=>$fd,
                'lat'=>$lat,
                'lng'=>$lng
            ]));
        }
    }

    protected function push($fd,$action,array $data=null) {
        $redata = [
            "action"=> 'push-'.$action,
        ];
        $data and $redata = array_merge($redata,$data);
        b('push-'.$fd,$redata);
        Server::driver()->push($fd,json_encode($redata));
    }

}