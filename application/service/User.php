<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace service;

use nb\Session;
use util\Auth;
use util\Service;

/**
 * Login
 *
 * @package service
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/2
 */
class User extends Service {

    public function in() {
        list($name,$pass) = $this->input('post',[
            'name','pass'
        ]);

        $user = \util\Auth::find('name=?',$name);
        if($user->empty) {
            $this->msg = '用户不存在';
            return false;
        }

        if($user['pass'] !== md5($pass)) {
            $this->msg = '密码错误';
            return false;
        }

        Session::set('login',$user);
        return true;
    }

    public function out() {
        Session::clear();
        return true;
    }

    public function add() {
        $data = $this->form('post');

        //检查用户是否存在
        $user = \model\User::find('name=?',$data['name']);
        if($user->have) {
            $this->msg = '登录名已经存在';
            return false;
        }

        //密码加密
        $data['pass'] = md5($data['pass']);
        $data['ct']  = time();

        \model\User::insert($data);
        return true;
    }

    public function edit() {
        $id = $this->input('id');

        $data = $this->form('post');

        if($data['pass']) {
            $data['pass'] = md5($data['pass']);
        }
        else {
            unset($data['pass']);
        }

        \model\User::updateId($id, $data);
        return true;
    }

    public function del() {
        $id = $this->input('id');
        $user = \model\User::findId($id);

        if(!$user->isdel) {
            $this->msg = '不能删除';
            return false;
        }

        //只有系统管理员可以删除用户
        if(Auth::init()->type) {
            $this->msg = '无权限删除';
            return false;
        }

        \model\User::updateId($id,[
            'deleted'=>1
        ]);

        return true;

    }

}