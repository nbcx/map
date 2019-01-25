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

use bin\Config;
use nb\Router;

/**
 * Administration
 *
 * @package util
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2018/12/27
 */
class Administration extends Controller {

    public function __before() {
        $auth = Auth::init();
        if($auth->empty) {
            redirect('/login');
            return false;
        }

        if(!$auth->power()) {
            $this->tips('无权限执行此操作！');
        }
        $this->assign('auth',$auth);
        $this->assign('system',\model\System::findkv('name,value'));
        $this->assign('conf',Config::$o);
        $this->assign('router',Router::driver());
        return true;
    }

}