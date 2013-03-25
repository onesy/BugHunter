<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class BH_View{
    
    /*
     * 打开输出缓冲区
     */
    public function ViewStart(){
        ob_start();
    }
    
    public function ViewFinish(){
        ob_flush();
    }
    
    private function _construct(){
        
    }
    
    public static function Rende(string $file){
        $this->ViewStart();
        require VIEW_ROOT . $file; //模板渲染
        $this->ViewFinish();
    }
    
    public static function getInstance(){
        new BH_View();
    }
}
?>
