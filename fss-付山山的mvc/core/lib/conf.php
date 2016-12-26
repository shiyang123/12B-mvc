<?php  

namespace core\lib;

class conf
{
    static public $conf = array();                            //建一个配置属性来存放配置
    static public function get($name,$file)                   //get方法加载单个配置文件
    {
        /**
         * 1.判断配置文件是否存在
         * 2.判断对应配置是否存在
         * 3.配置已经被加载过，缓存一下配置
         */
            //p(self::$conf);
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];                       //判断盖缓存文件是否已经加载配置文件，若缓存过直接返回                             
        } else {
            // p(1);                                                   //验证是否只加载一次配置文件
            $path = MVC.'/core/config/'.$file.'.php';
            // p($file);                                            //输出缓存的配置文件名
            if(is_file($path)){

                $conf = include $path;
                if(isset($conf[$name])){
                    self::$conf[$file] = $conf;                                     //把配置存入配置属性(静态配置属性)

                    return $conf[$name];                                            //返回要加载的配置
                } else {
                    throw new \Exception('没有这个配置项'.$name);                   //配置项异常
                }

            } else {

                throw new \Exception('找不到配置文件'.$file);                        //没有这个配置文件                         
            }
        }

    }

    static public function all($file)                //因为要加载多个配置文件,所以建立一个all方法来加载整个配置文件
    {  
        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        } else {
            //(1);
            $path = MVC.'/core/config/'.$file.'.php';
            // p($file);
            if(is_file($path)){

                $conf = include $path;
                if(isset($conf)){

                self::$conf[$file] = $conf;
                return $conf;
                } else {
                throw new \Exception('没有这个配置项');
                }

            }else{

            throw new \Exception('找不到配置文件'.$file);
            }
        }
    }



}