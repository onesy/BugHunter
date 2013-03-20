<?php

/**
 * 需要做的事情
 * 1.配置文件
 * 2.加载类加载器
 */
require_once 'Common_Cfg.php';           // 通用配置文件，通常不许要更改 
if (defined(DEBUG) && DEBUG) {
    require_once 'Debug_Cfg.php';        // 调试配置文件
}
require_once 'RootCfg.php';              // 加载配置文件

/**
 * 运行文件加载器
 */
$loader = ClassLoader::getInstance();
$loader->loadClass();

/**
 * 初始化请求和框架的基本信息
 */

?>
