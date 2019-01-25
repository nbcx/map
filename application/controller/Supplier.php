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

use nb\Session;
use util\Administration;
use util\Auth;

/**
 * Supplier
 *
 * @package controller
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/6
 */
class Supplier extends Administration {

    public $_rule = [
        'longitude'=>'require',
        'latitude'=>'require'
    ];

    public $_message  =   [
        'longitude.require'=>'请填写经纬度',
        'latitude.require'=>'请填写经纬度'
    ];

    public function index($start=1,$search='') {
        list($num,$suppliers) = \model\Supplier::admin(10,$start, $search);
        $this->assign('search',$search);
        $this->assign('num',$num);
        $this->assign('start',$start);
        $this->assign('suppliers',$suppliers);
        $this->display('supplier');
    }

    public function add() {
        $this->display('add');
    }

    public function edit($id) {
        Session::set('_s_page',$this->form(['start','search']));

        $supplier = \model\Supplier::findId($id);
        $this->assign('supplier',$supplier);
        $this->display('edit');
    }

    public function post($action) {
        if(!Auth::init()->power('supplier/post-'.$action)) {
            $this->tips('无权限执行此操作！');
            return true;
        }
        \service\Supplier::run($action,function ($msg) {
            $this->tips($msg);
        });
        $page = Session::pull('_s_page');
        if($page) {
            redirect("/supplier?start={$page['start']}&search={$page['search']}");
        }
        redirect('/supplier');
    }

}