<?php

/**
 * 需要做的事情
 * 1.配置文件
 * 2.加载类加载器
 */
define('DEBUG', true);
require_once 'Common_Cfg.php';           // 通用配置文件，通常不许要更改 
if (defined(DEBUG) && DEBUG) {
    require_once 'Debug_Cfg.php';        // 调试配置文件
}
require_once 'RootCfg.php';              // 加载配置文件，并加载类
require FRAMEWORK_ROOT . 'BH_Frameworks' . DIRECTORY_SEPARATOR . 'BH_FrameworkLoader.php';
var_dump($_SERVER);
/**
 * 初始化请求和框架的基本信息
 */
//echo '<br /><hr/>' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/') + 1);
?>
