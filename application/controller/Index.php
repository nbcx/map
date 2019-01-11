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

    }

    public function post($lng,$lat,$search=null) {
        $suppliers = \model\Supplier::nearby($lng,$lat,$search);
        echo json_encode($suppliers);
    }

}