<?php

//项目的跟路径
define('_APP_',__DIR__.'/..');

//加载初始化文件
include ('/home/www/sdk/boot.php');

\bin\Config::register();

\nb\Dispatcher::run();


