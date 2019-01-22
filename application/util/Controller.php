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

use nb\Config;
use nb\Request;

/**
 * Controller
 *
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2018/8/9
 */
class Controller extends \nb\Controller {

    public function __before() {
        $this->assign('auth',Auth::init());
        return true;
    }

    protected function tips($hint) {
        include __APP__ .'application/view/hint.html';
        quit();
    }

}