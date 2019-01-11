<?php
//路由配置
return [
    'index'=>[
        'url'=>'/',
        'action'=>'index'
    ],
    'chapter'=>[
        'url' => '/d/[slug:alpha]-[no:alpha].htm',
        'action' => 'index/chapter'
    ],
    'book'=>[
        'url'=>'/d/[slug:alpha].htm',
        'action'=>'index/detail'
    ],
    'user'=>[
        'url'=>'/u/[id:alpha]',
        'action'=>'user'
    ],
    'admin'=>[
        'url'=>'/admin',
        'action'=>'admin/index/index'
    ],
    'login'=>[
        'url'=>'/login',
        'action'=>'admin/login/index'
    ],
    'logout'=>[
        'url'=>'/logout',
        'action'=>'admin/logout/post'
    ],
];