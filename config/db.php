<?php

$dsnVal = 'mysql:host=herennowidentifier.clns7dnu70de.us-west-2.rds.amazonaws.com;port=3306;dbname=crm';
	$connection = [
		'class' => 'yii\db\Connection',
		'dsn' => $dsnVal,//'mysql:host=localhost;port=3306;dbname=f45training',//
		'username' => 'herennowdb',
		'password' => 'herennowpass',//'metrimap@aws',
		'charset' => 'utf8',
	];

return $connection;
