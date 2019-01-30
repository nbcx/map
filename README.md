# 地图应用

本项目为研究性质项目，主要研究地图相关应用，如计算定位点与所查店铺间距离，共享定位等。

## 线上部署了一个demo，可以看看演示效果：

https://map.7ve.cn/

如需体验后台,自己添加测试数据，请加群@群主获取账号密码

## 环境要求

1. Linux/MAC, PHP 7.0 +, Redis
2. [Swoole 2.1.3](https://github.com/swoole/swoole-src/releases) +
3. [NB Framework](https://github.com/nbcx/framework)


## 安装

1.下载项目
```shell
git clone https://github.com/nbcx/map.git
cd /path/to/map
git clone https://github.com/nbcx/framework.git nb
```
or
```shell
git clone https://github.com/nbcx/map.git
cd /path/to/map
composer install
```

2. 部署
将项目源文件复制到网站根目录。
> 确保项目`tmp`文件有读写权限

项目根目录下的`config.inc.php`文件为配置文件，需在里面填写正确的数据库信息：
```php
//数据库配置
'dao' => [
    'driver'	=> 'mysql',
    'host' 		=> 'data.nb.cx',
    'port' 		=> '3306',
    'dbname'    => 'map', //数据库名子
    'user' 		=> 'dev',  数据库用户名
    'pass' 		=> '123456', 数据库密码
    'connect'   => 'false',
    'charset' 	=> 'UTF8',
]

```

添加Nginx配置
```
server {
    listen 80;
    server_name yourdoname.com;
    index index.php;

    location / {
        rewrite ".+" "/index.php" last;
    }

    location ~ .*\.php {
        root /path/to/map/public/;
        fastcgi_pass   127.0.0.1:9100;
        fastcgi_index index.php;
        include fastcgi.conf;
    }

    location ~ .*\.(svg|woff2|map|html|woff|ttf|ico|css|js|gif|jpg|jpeg|png|bmp|swf)$ {
        root /path/to/map/;
        expires 90d;
    }
}
```

以上方式不能使用共享定位的功能，如需使用，需要使用Swoole和Redis，启动Websocket服务。如下：
```shell
cd bin
./server start

#根据你的php安装方式，上面的命令可能执行错误，你可以用你自己完整的php路径方式启动：

/path/to/php server start
```

> 项目开发中，一些配置为开发者自己本地配置，如想自己部署体验，需自行修改，遇到问题可加群@群主解答。

## 功能

- [x] 计算定位点与所查店铺间距离
- [x] 共享定位(不完善)

## 技术交流

QQ群: 1985508