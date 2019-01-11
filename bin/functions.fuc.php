<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * functions
 *
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2018/8/11
 */

/**
 * 生成安全连接
 * @param $path
 * @param string $prefix
 * @return mixed
 */
function safe($path, $prefix='') {
    return \util\Security::url($path, $prefix);
}

function makeUrl($name, array $value = NULL) {
    return \nb\Router::driver()->url($name,$value);
}