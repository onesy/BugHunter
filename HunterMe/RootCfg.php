<?php
/**
 * 根配置文件，本App的入口都需要加载这个文件
 */
$CfgConfig = array(); //需要加载的配置文件都被定义在这个数组中以备调用
/**
 * 指定其他配置文件的位置
 * 所有base在后面加上/
 */
define('COMMON_CFG_FILE_NAME', 'Common_Cfg.php'); //配置文件名定义
define('DEBUG_CFG_FILE_NAME', 'Debug_Cfg.php'); //配置文件名定义
define('CLASS_DEFINE_FILE_NAME','ClassDefine_Cfg.php');

define('APP_ROOT', dirname ( __FILE__ ) . DIRECTORY_SEPARATOR); //Base路径定义 root_cfg
define('PROJECT_ROOT', dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR); //Base路径定义 项目根目录
define('FRAMEWORK_ROOT', PROJECT_ROOT . 'BH_Framework'. DIRECTORY_SEPARATOR); //Base路径定义 framework
define('COMMON_ROOT', APP_ROOT . 'Common'. DIRECTORY_SEPARATOR); //Base路径定义 common
define('LOG_ROOT', APP_ROOT . 'Log'. DIRECTORY_SEPARATOR); //Base路径定义 log
// 应用分层结构路径的配置 start
define('CONTROLLER_ROOT',APP_ROOT . 'Controller' . DIRECTORY_SEPARATOR);// Base路径定义 Controller根路径定义
define('VIEW_ROOT', APP_ROOT . 'Page' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR); //Base路径定义 View根路径定义
define('MODULE_ROOT', COMMON_ROOT . 'Module' . DIRECTORY_SEPARATOR ); //Base路径定义 Module根路径定义
define('MODEL_ROOT', COMMON_ROOT . 'Model' . DIRECTORY_SEPARATOR); //Base路径定于 Model根路径定义
define('COLLECTION_ROOT', COMMON_ROOT . 'Collection' . DIRECTORY_SEPARATOR); //Base路径定义 Collection根路径定义
define('UTIL_ROOT',COMMON_ROOT . 'Util' . DIRECTORY_SEPARATOR); //Base路径定义 Util根路径定义
define('HELPER_ROOT',COMMON_ROOT . 'Helper' . DIRECTORY_SEPARATOR);
// 应用分层结构路径的配置 end
define('COMMON_CFG_PATH', APP_ROOT . COMMON_CFG_FILE_NAME); //全路径定义
define('DEBUG_CFG_PATH', APP_ROOT . DEBUG_CFG_FILE_NAME); //全路径定义
define('CLASS_DEFINE', APP_ROOT . CLASS_DEFINE_FILE_NAME);
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
