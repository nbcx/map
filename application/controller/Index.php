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

use util\Controller;

/**
 * Index
 *
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2018/8/9
 */
class Index extends Controller {

    public function index() {
        $this->assign('ak','DD205ad29d809f6a8cc23d82189745fa');
        $this->display('index');
    }

    //供应商详情
    public function details() {
        echo md5('123456');
    }

    public function post($lng, $lat, $start=1, $search=null) {
        $rows=10;
        $suppliers = \model\Supplier::nearby($lng,$lat,$start,$rows,$search);
        echo json_encode($suppliers);
    }

}