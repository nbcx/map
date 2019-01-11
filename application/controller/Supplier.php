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

    public function index() {
        $suppliers = \model\Supplier::fetchs('deleted=0');
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