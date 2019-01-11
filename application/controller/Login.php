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

use service\User;
use util\Controller;

/**
 * Login
 *
 * @package controller
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/1
 */
class Login extends Controller {

    public function index() {

        $this->display('login');
    }

    public function post($action) {
       User::run($action,function ($msg) {
            ed($msg);
       });

       redirect($action == 'in'?'/supplier':'/');
    }

}