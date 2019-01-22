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

use util\Administration;

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
        'sticking'  =>  'require',
        'press'=>  'require',
        'tile'=>  'require',
        'longitude'=>'require',
        'latitude'=>'require'
    ];

    public $_message  =   [
        'sticking.require' => '请填写粘箱机台数',
        'press.require' => '请填写印刷机台数',
        'tile.require' => '请填写瓦线台数',
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
        $supplier = \model\Supplier::findId($id);
        $this->assign('supplier',$supplier);
        $this->display('edit');
    }

    public function post($action) {
        \service\Supplier::run($action,function ($msg) {
            ed('msg:'.$msg);
        });
        redirect('/supplier');
    }

}