<?php
return array(
	//'配置项'=>'配置值'
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES' => array( //定义路由规则 
	    'new/:id\d'    => 'Index/hi',
	    // 'new/:name'    => 'News/read',
	    // 'new/:year\d/:month\d'  => 'News/archive',
	),
	'TMPL_L_DELIM'	=>'<{',//修改左定界符
	'TMPL_R_DELIM'	=>'}>',//右
	'DB_TYPE'		=>'mysql',
	'DB_HOST'		=>'localhost',
	'DB_NAME'		=>'pipe',
	'DB_USER'		=>'root',
	'DB_PWD'		=>'admin',
	'DB_PREFIX'		=>'pipe_',//表前缀
);