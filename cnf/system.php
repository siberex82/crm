<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Inspector
/@ Target: clear url route
/@ Method:
/@ Params:  
/* 
*/

define(SEPARATOR,"/");

define(ROOT,$_SERVER['DOCUMENT_ROOT']);

define(HOST,"http://".$_SERVER['HTTP_HOST']);

$TOKEN = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
?>