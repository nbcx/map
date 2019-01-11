<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace model;

use nb\Model;
use sdk\Bar;

/**
 * User
 *
 * @package model
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2018/9/8
 */
class User extends Model {

    protected static function __config() {
        return ['user', 'id'];
    }

    protected function _date() {
        return date('Y-m-d H:i:s',$this->ct);
    }

    protected function _identity() {
        return $this->type?'业务管理员':'系统管理员';
    }

}