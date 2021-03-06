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
 * System
 *
 * @package controller
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/8
 */
class System extends Administration {

    public function index() {

        $this->display('system');
    }

    public function post() {
        \service\System::run('edit',function ($msg) {
            ed($msg);
        });

        redirect('/system');
    }

}