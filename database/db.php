<?php
$config['db_host'] = 'localhost';
$config['db_user'] = 'cms_sys';
$config['db_pass'] = 'g5I#sc8&vd31%kA';
$config['db_name'] = 'eldis_cms';

foreach($config as $key => $value) {
   define(strtoupper($key), $value);
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME)
   or die('connection error');
?>