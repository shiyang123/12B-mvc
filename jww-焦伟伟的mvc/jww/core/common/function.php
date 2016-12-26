<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/24
 * Time: 10:38
 * 函数库
 */
//打印数组变量
function p($var){
    if(is_bool($var)){
        var_dump($var);
    }else if(is_null($var)){
        var_dump(Null);
    }else{
        print_r($var);
    }
}