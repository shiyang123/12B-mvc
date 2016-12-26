<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/25
 * Time: 19:55
 * 配置类
 */
namespace core\lib;
class config{
    //因为我们的配置文件需要经常用到，所以我们要给他一个静态方法。
    //$name;所要加载的配置的名称
    //$file:所要加载的文件
    static public $conf=array();    //静态的配置属性
    //加载配置文件中单个的配置
    static public function get($name,$file){
        //1、判断我们的配置文件是否存在
        //2、判断配置是否存在
        //3、缓存已经加载配置
        //判断是否已经有缓存文件
        //p(self::$conf);
        if(isset(self::$conf[$file])){
            //直接返回配置文件里的值
            return self::$conf[$file][$name];
        }else{
            //配置文件的位置
            $path = JWW.'\core\config\\'.$file.'.php';
            //p($file);die;
            //判断配置文件是否存在
            if(is_file($path)){
                $config = include $path;   //加载配置文件
                //判断对应的配置是否存在
                if(isset($config[$name])){
                    //前两项都存在的进行缓存
                    self::$conf[$file] = $config;
                    return $config[$name];
                }else{
                    throw new \Exception('找不到配置项'.$name);
                }
            }else{
                throw new \Exception('找不到配置文件'.$file);
            }
        }
    }

    //引入整个配置文件
    static public function all($file){
        if(isset(self::$conf[$file])){
            //直接返回配置文件里的值
            return self::$conf[$file];
        }else{
            //配置文件的位置
            $path = JWW.'\core\config\\'.$file.'.php';
            //p($file);die;
            //判断配置文件是否存在
            if(is_file($path)){
                $config = include $path;   //加载配置文件
                //判断对应的配置是否存在
                self::$conf[$file] = $config;
                return $config;
            }else{
                throw new \Exception('找不到配置文件'.$file);
            }
        }
    }
}