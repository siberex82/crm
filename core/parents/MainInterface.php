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
   function getContent($data);
}
?>