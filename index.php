<?php

       	define('APP_NAME','PipeTrans');   		//1.确定应用名称 HOME,APP_HOME死记硬背
        define('APP_PATH','./PipeTrans/');  		//2.确定应用路径       
        require './ThinkPHP/ThinkPHP.php';  //3.引入核心文件
        									//include路径异常下面代码还能跑，require不行，所以用require引入重要文件
       define('APP_DEBUG',TRUE); // 开启thinkphp调试模式,有助于我们书写查看错误。

       ?>