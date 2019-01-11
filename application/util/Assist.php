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


trait Assist {

    //获取安全地址
    protected function safe($path, $prefix='') {
        return Security::url($path, $prefix);
    }

    //验证地址是否安全
    protected function protect($func=null) {
        $func or $func = function (){
            tips('非法请求');
        };
        Security::protect($func);
    }

    protected function json($data) {
        return json_encode($data);
    }
}