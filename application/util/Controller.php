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

    use Assist;

    /**
     * 设置布局
     * @param $name
     * @param string $replace
     */
    protected function layout($name, $replace = '') {
        $this->view->layout($name,$replace);
    }


}