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

use model\Role;
use model\User;
use nb\Pool;
use nb\Router;
use nb\Session;

/**
 * Auth
 *
 * @package util
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2018/12/27
 */
class Auth extends User {

    /**
     * @return Auth
     */
    public static function init() {
        if($user = Pool::get(get_class())) {
            return $user;
        }
        return Pool::set(get_class(),Session::get('login')?:new self());
    }


    public function power($action=null) {
        //非后台用户，无权限
        if(!$this->isadmin) {
            return false;
        }

        //系统管理员拥有所有权限
        if(!$this->type) {
            return true;
        }

        $power = load('power');

        $power = $power[$this->type];

        $this->power = $power;

        if($action === null) {
            $router = Router::driver();
            $action =$router->controller.'/'.$router->function;
        }

        if(in_array(strtolower($action),$power)) {
            return true;
        }
        return false;
    }



}