<?php
/* 上传附件配置 */
return [
    'path' => __APP__.'public/uploads/',
    'url'  => \nb\Request::driver()->domain.'/public/uploads/',
    'field' => 'upfile',/* 提交的文件表单名称 */
    'name' => 'image/{yyyy}{mm}{dd}/{time}{rand:6}',/* 上传保存路径,可以自定义保存路径和文件名格式 */
    'urlPrefix' => '',/* 文件访问路径前缀 */
    'max' => 51200000,/* 上传大小限制，单位B，默认50MB */
    'compressBorder' => 1600,/* 图片压缩最长边限制 */
    'insertAlign' => 'none',/* 插入的图片浮动方式 */
    'compressEnable' => false,/* 是否压缩图片,默认是true */
    'allow' => [/* 上传文件格式显示 */
        ".png", ".jpg", ".jpeg", ".gif", ".bmp",
        ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg",
        ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid",
        ".rar", ".zip", ".tar", ".gz", ".7z", ".bz2", ".cab", ".iso",
        ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".pdf", ".txt", ".md", ".xml"
    ]
];