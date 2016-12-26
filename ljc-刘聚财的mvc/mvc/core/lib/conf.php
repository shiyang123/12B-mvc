<?php
namespace core\lib;
class conf
{
    static public $conf = array();//定义一个静态属性来存放我们缓存的配置
    static public function get($name,$file)
    {
        //$name 我们要加载的名字 $file 我们要加载的文件
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        //判断如果我们的缓存存在就直接返回我们的缓存
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else{
            $path = IMOOC."/core/config/".$file.".php";
            if(is_file($path)){
                $conf = include $path;
                if(isset($conf[$name])){
                    //缓存我们的配置
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                }else{
                    throw new \Exception("没有这个配置项".$name);
                }
            }else{
                throw new \Exception("找不到配置文件".$file);
            }
        }
    }
    //数据库
    static public function all($file)
    {
        //$file 我们要加载的文件
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        //判断如果我们的缓存存在就直接返回我们的缓存
        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        }else{
            $path = IMOOC."/core/config/".$file.".php";
            if(is_file($path)){
                $conf = include $path;
                self::$conf[$file] = $file;
                return $conf;
            }else{
                throw new \Exception("找不到配置文件".$file);
            }
        }
    }
}