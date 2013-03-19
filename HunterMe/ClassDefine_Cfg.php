<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * 定义哪些class需要被加载
 */
$ClassLoadList = array();
//key就是class的路径，value就是处理方式
//0 = 直接路径加载
//1 = 按照预订格式进行加载
//2 = 按照目录行加载
$ClassLoadList[PROJECT_BASE . ''] = 0;

define('ClassToLoad', $ClassLoadList);
?>
