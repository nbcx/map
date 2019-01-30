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
        return ['系统管理员','高级管理','普通管理'][$this->type];
    }

}