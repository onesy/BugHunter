<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * 路径查找规则
 *  relative path to index . Folder/FileName.php
 * 生成的类的路径就是
 *  relative path base on Project . folder_filename
 * 其实说反了
 */

/**
 * 查找顺序
 * 首先，拿到一个路径的数组，遍历数组，得到其中处理方式(value)和内容(key)
 * 然后，按照指定的处理方式将文件包含进来
 */
class ClassLoader {

    private function __construct() {
        
    }

    public static function getInstance() {
        return new ClassLoader();
    }

    private function load($urls = array()) {
        if (is_array($urls) && !empty($urls)) {
            foreach ($urls as $url => $method) {
                $this->loadAsMethod($method, $url);
            }
        }
    }

    private function loadAsMethod($methodCode, $url = null) {
        if ($methodCode == 0) {
//            echo $url;
            require $url;
        } else if ($methodCode == 1) {
            require $this->analyzeUrl($url);
        } else if ($methodCode == 2) {
            /**
             * TODO 待开发,按照文件夹进行加载，一次性加载文件夹内所有的php文件
             */
        } else if ($methodCode == 3) {
            /**
             * TODO 待开发，一次性全部加载所有的Common下的.php文件
             */
        }
    }

    /**
     * 路径存储的模式
     * @param type $url
     */
    public static function analyzeUrl($url = null) {
        $path = '';
        //Module_Class Name
        if ($url) {
            $array = explode("_", $url);
            $path = $array[1] . DIRECTORY_SEPARATOR . $array[1] . '.php';
            if ($array[0] == 'Module') {
                $path = MODULE_ROOT . $path;
            } else if ($array[0] == 'Model') {
                $path = MODEL_ROOT . $path;
            } else if ($array[0] == 'Collection') {
                $path = COLLECTION_ROOT . $path;
            } else if ($array[0] == 'Helper') {
                $path = HELPER_ROOT . $path;
            } else if ($array[0] == 'Util') {
                $path = UTIL_ROOT . $path;
            } else {
                throw new Exception('路径字符串错误');
            }
            return $path;
        }
        throw new Exception('无法解析为空的路径');
    }

    public function loadClass($classLoad = null) {
        if (!$classLoad) {
            throw new Exception('传入为空');
        }else {
            $this->load($classLoad);
        }
    }

}

?>
