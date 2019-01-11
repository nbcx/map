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
    ]

];

