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

use model\User;
use util\Administration;

/**
 * Admin
 *
 * @package controller
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/2
 */
class Admin extends Administration {

    public function index() {

        $admins = User::fetchs('deleted=?',0,'*','isdel');

        $this->assign('users',$admins);
        $this->display('user');
    }

    public function add() {
        $this->display('user-add');
    }

    public function edit($id) {
        $user = User::findId($id);

        $this->assign('user',$user);
        $this->display('user-edit');
    }

    public function post($action) {
        \service\User::run($action,function ($msg) {
            ed($msg);
        });
        redirect('/admin');
    }

    protected function pass() {

    }

}