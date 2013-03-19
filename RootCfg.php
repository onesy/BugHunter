<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$CfgConfig = array(); //需要加载的配置文件都被定义在这个数组中以备调用
/**
 * 指定其他配置文件的位置
 * 所有base在后面加上/
 */
define('COMMON_CFG_FILE_NAME', 'Common_Cfg.php'); //配置文件名定义
define('DEBUG_CFG_FILE_NAME', 'Debug_Cfg.php'); //配置文件名定义
define('CLASS_DEFINE_FILE_NAME','ClassDefine_Cfg.php');

define('ROOT_CFG_BASE', './'); //Base路径定义 root_cfg
define('PROJECT_BASE', './'); //Base路径定义 项目根目录
define('FRAMEWORK_BASE', ROOT_CFG_BASE . 'BH_Framework/'); //Base路径定义 framework
define('COMMON_BASE', ROOT_CFG_BASE . 'Common/'); //Base路径定义 common
define('LOG_BASE', ROOT_CFG_BASE . 'Log/'); //Base路径定义 log

define('COMMON_CFG_PATH', ROOT_CFG_BASE . COMMON_CFG_FILE_NAME); //全路径定义
define('DEBUG_CFG_PATH', ROOT_CFG_BASE . DEBUG_CFG_FILE_NAME); //全路径定义
define('CLASS_DEFINE', ROOT_CFG_BASE . CLASS_DEFINE_FILE_NAME);
//------------------------需要加载的文件在这里被放入变量中--------------------//
$CfgConfig[] = COMMON_CFG_PATH;
$CfgConfig[] = DEBUG_CFG_PATH;
//----------------------------------------------------------------------//
ConfigLoader($CfgConfig);//加载配置文件

// 下面是要调用的函数，过程代码和函数分开
function ConfigLoader($CfgArray = array()) {
    if (!empty($CfgArray) && is_array($CfgArray)) {
        try {
            foreach ($CfgArray as $CfgPath){
                require $CfgPath;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    } else if(!empty ($CfgArray) && is_array($CfgArray)) {
        $CfgArray = array($CfgArray);
        ConfigLoader($CfgArray);
    } else {
        echo "参数错误，ConfigLoader加载配置文件失败，程序即将退出 文件：" . __FILE__ . "行数：" . __LINE__;
    }
}

?>
