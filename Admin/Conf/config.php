<?php
return array(
	//'配置项'=>'配置值'
	'SESSION_AUTO_START'=>true,
	'TMPL_L_DELIM'=>'<{',		//修改左定界符
	'TMPL_R_DELIM'=>'}>',		//修改右定界符
	'DB_DSN' => 'mysql://root:88888888@localhost:3306/company', 
	'DB_PREFIX' => 'c_', // 数据库表前缀	
	'TMPL_ACTION_SUCCESS' => 'Public:jump',
	'TMPL_ACTION_ERROR' => 'Public:jump', 
);
?>