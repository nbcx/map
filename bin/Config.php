<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bin;

/**
 * Config
 *
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2018/8/11
 *
 * @property array upload 上传配置
 * @property array option 用户配置
 */
class Config extends \nb\Config {

    public $default_index = 'index';

    //自动包含路径
    public $path_autoinclude =  [
        __APP__.'bin'.DS
    ];


    //注入一个类，来自定义框架里的一些事件，如报错处理，
    public $register    = 'util\\Framework';

    //模版引擎配置
    public $view = [
        'tpl_replace_string' => [
            '_pub_' =>'/public/',
        ]
    ];

    //SwooleHttpServer模式下，可添加此配置处理资源文件请求
    public $dispatcher = [
        'enable'=>true,//是否开启资源文件请求处理
        'path'=>__APP__,//资源文件根目录
        'allow'=>'ico|css|js|jpg|png|ttf|woff',//允许处理的资源文件后戳
        'expire'=>1800,//浏览器过期时间
    ];

    //文件缓存配置
    public $cache            = [
        'timeout'   => 86400,
        'ext'       => '.cache',
    ];

    public $i18n = [
        'path'=> __APP__.'lang/zh-cn.php'
    ];

    //路由
    public $router = [
        'default'=>false,//是否关闭默认路由，true 是，false 不关闭
        //'match'=>__APP__.'bin'.DS.'router.inc'
    ];

    //上传设置
    protected function _upload() {
        return include(__APP__.'bin'.DS.'upload.inc');
    }
}