<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Target: Main abstract classes
/@ Params:  #
/* 
*/

interface IntRouter{
   function route($data);
}

interface IntRedirect {
   static function url($data);
}

interface IntTemplater {
   function getCoreContent($template);
   function getContent($data);
}

interface IntSuperquery {
   function table($data);
   function getCustom($data);
   function getAssoc();
   function getArray();
   function getTable();
}

?>