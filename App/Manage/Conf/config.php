<?php

return array(

	//配置AUTH权限
	'AUTH_CONFIG'       => array(
        'AUTH_ON'           => true, // 认证开关
        'AUTH_TYPE'         => 2, // 认证方式，1为实时认证；2为登录认证。
        'AUTH_GROUP'        => C('DB_PREFIX') . 'auth_group', // 用户组数据表名
        'AUTH_GROUP_ACCESS' => C('DB_PREFIX') . 'auth_group_access', // 用户-用户组关系表
        'AUTH_RULE'         => C('DB_PREFIX') . 'auth_rule', // 权限规则表
        'AUTH_USER'         => C('DB_PREFIX') . 'user', // 用户信息表
    ),
	'ADMIN_AUTH_KEY'  => 'yang_adm_superadmin',	//超级管理员识别\
	'USER_AUTH_KEY'   => 'yang_adm_uid',			//用户认证识别号
	'NOT_AUTH_MODULE' => 'Index,Public',			//无需认证的模块(控制器)
	// //退出不需要验证//安装的时候表前缀一定要更改(yy_)//debug
	'NOT_AUTH_ACTION' => 'logout',		//无需认证的动作方法


	//'VAR_SESSION_ID' => 'PHPSESSID',//post方式 提交 session_id//Public uploadFile
	'TMPL_TEMPLATE_SUFFIX' => '.html',//模板后缀

	//去掉伪静态后缀
	'URL_HTML_SUFFIX' => '',

    'URL_MODEL'            => 3, //URL模式
	//禁止路由
	'URL_ROUTER_ON' => false,
	//禁止静态缓存
	'HTML_CACHE_ON' => false,

	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__. ltrim(APP_PATH,'.'). MODULE_NAME . '/View/Public',
		'__DATA__' => __ROOT__. '/Data',
	),
);



?>