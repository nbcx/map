<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * 程序配置
 */
return [

    //是否开启调试
    'debug'=>true,

    'default_index' => 'shared',

    'ip'=>'127.0.0.1',

    //数据库配置
    'dao' => [
        'driver'	=> 'mysql',
        'host' 		=> 'data.nb.cx',
        'port' 		=> '3306',
        'dbname'    => 'hymap',
        'user' 		=> 'dev',
        'pass' 		=> '123456',
        'connect'   => 'false',
        'charset' 	=> 'UTF8',
    ],

    //服务器配置
    'server' => [
        'driver'=>'Websocket',
        'register'=>\util\Websocket::class,//  'event\\Websocket',//注册一个类，来实现swoole自定义事件
        'host'=>'0.0.0.0',
        'port'=>9503,
        'max_request'=>100,//worker进程的最大任务数
        'worker_num'=>2,//设置启动的worker进程数。
        'dispatch_mode'=>2,//据包分发策略,默认为2
        'debug_mode'=>3,
        'enable_gzip'=>0,//是否启用压缩，0为不启用，1-9为压缩等级
        'log_file'=>__APP__.'tmp'.DS.'swoole-socket.log',
        'enable_pid'=>__APP__.'tmp'.DS.'swoole.pid',
        'daemonize'=>false,
        //异步任务处理配置
        'task_worker_num'=>2,
        'enable_http'=>true,//启用内置的onRequest回调
    ],



];

