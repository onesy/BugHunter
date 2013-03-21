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
//3 = 加载全部层和工具

$ClassLoadList[COLLECTION_ROOT . 'loadExample.php'] = 0;
$ClassLoadList[MODEL_ROOT . 'loadExample.php'] = 0;
$ClassLoadList[MODULE_ROOT . 'loadExample.php'] = 0;
$ClassLoadList[HELPER_ROOT . 'loadExample.php'] = 0;
$ClassLoadList[UTIL_ROOT . 'loadExample.php'] = 0;
/**
 * 运行文件加载器
 */
$loader = ClassLoader::getInstance();
$loader->loadClass($ClassLoadList);
?>
