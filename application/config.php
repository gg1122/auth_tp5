<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

return [
    'url_route_on' => true,
    'log'          => [
        'type' => 'trace', // 支持 socket trace file
    ],
    // 'default_return_type'=>'json',
    'cache'=>[
    	'type'=>'Redis',
    	'path'=>CACHE_PATH,
    	'prefix'=>'',
    	'expire'=>0,
    ],
    //默认错误跳转对应的模板文件
    'dispatch_error_tmpl' => 'public/error',
    //默认成功跳转对应的模板文件
    'dispatch_success_tmpl' => 'public/success',

    'UC_APP_ID'=>1,
    'UC_API_TYPE'=>'Model',
    'UC_AUTH_KEY'=>'P~^nlxj3i?e-%pwSHr"gLyA|EQ+Is@5!1.2RbM<W',

    'session'                => [
        'prefix'         => '',
        'type'           => '',
        'auto_start'     => true,
    ],
];