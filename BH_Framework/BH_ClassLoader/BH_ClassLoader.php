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
    private function __construct(){
        
    }
    
    public static function getInstance(){
        return new ClassLoader();
    }
    
    private function load($urls = array()){
        if(is_array($urls) && !empty($urls)){
            foreach ($urls as $url => $method){
                $this->loadAsMethod($url,$method);
            }
        }
    }
    
    private function loadAsMethod($methodCode,$url = null){
        if($methodCode == 0){
            require $url;
        } else if($methodCode == 1) {
            require $this->analyzeUrl($url);
        }
    }

    /**
     * 路径存储的模式
     * @param type $url
     */
    public static function analyzeUrl($url = null){
        
    }

    public static function loadClass(){
        $this->load(ClassToLoad);
    }
}
?>
