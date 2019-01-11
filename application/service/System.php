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
 * System
 *
 * @package service
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/1/9
 */
class System extends Service {

    public function edit() {
        $data = $this->form('post');

        foreach ($data as $k=>$v) {
            \model\System::update(['value'=>$v],'name=?',$k);
        }

        return true;
    }

}