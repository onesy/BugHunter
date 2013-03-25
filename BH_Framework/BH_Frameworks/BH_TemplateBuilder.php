<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class BH_TemplateBuilder {

    private function _construct() {
        
    }

    public static function getInstance() {
        return new BH_TemplateBuilder();
    }
    
    public static function constructATTR($attr = array()){
        $attrStr = '';
        if (is_array($attr) && empty($attr)) {
            foreach ($attr as $key => $value) {
                $attrStr .= ' ' . $key . '=' . $value;
            }
        }
        return $attrStr;
    }
    
    /**
     * 拼接一个标签对
     * 
     * @param type $tagCategory
     * @param type $content
     * @param type $attrStr
     * @return type
     */
    public static function constructTagPair($tagCategory,$content , $attrStr){
        return '<' . $tagCategory . $attrStr . '>' . $content . '</' . $tagCategory . '>';
    }

    /**
     * 制造并返回新的单层tag paire
     * @param type $content
     * @param type $attr
     * @return type
     */
    public static function appendTag($content, $attr = array(),$tagCategory = 'div') {
        
        $attrStr = self::constructATTR($attr);
        
        return self::constructTagPair($tagCategory, $content, $attrStr);
    }
    
    public static function appendTABLE($content = array(), $attr = array(),$headOrNot =false){
        
        $tagCategory = 'table';
        
        $attrStr = self::constructATTR($attr);
        //调用tr传递给它一个数组
        return self::constructTagPair($tagCategory, $content, $attrStr);
    }
    
    public static function appendTR($content = array(), $attr = array()){
        $tagCategory = 'tr';
        
        $attrStr = self::constructATTR($attr);
        //调用td
        return self::constructTagPair($tagCategory, $content, $attrStr);
    }
    
    public static function appendTDArray($contents = array(), $attrs = array()){
        
        //$attrStr = self::constructATTR($attrs);
        $result = array_udiff($contents, $attrs,  "appendTDs"); //获取到好多好多td
        //return self::constructTagPair($tagCategory, $content, $attrStr);
    }
    
    public static function appendTDs($content = array(), $attr = array()){
        
        
    }
    
    public static function appendtdCallBack($content,$attr = array()){
        
    }

}

?>
