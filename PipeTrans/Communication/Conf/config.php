<?php
return array(
	//'配置项'=>'配置值'
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES' => array( //定义路由规则 
	    'new/:id\d'    => 'Index/hi',
	    // 'new/:name'    => 'News/read',
	    // 'new/:year\d/:month\d'  => 'News/archive',
	),
);