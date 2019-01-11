<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace service;
use util\Service;

/**
 * Supplier
 *
 * @package service
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/8
 */
class Supplier extends Service {

    public function add() {
        $data = $this->form('post');
        \model\Supplier::insert($data);
        return true;
    }

    public function edit() {
        $id = $this->input('id');
        $data = $this->form('post');
        $this->data = \model\Supplier::updateId($id,$data);
        return true;
    }

    protected function del() {
        $id = $this->input('id');
        if(!is_array($id)) {
            $id = [$id];
        }

        foreach ($id as $v) {
            \model\Supplier::updateId($v,[
                'deleted'=>1
            ]);
        }

        return true;
    }

}