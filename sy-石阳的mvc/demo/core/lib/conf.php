<?php
namespace core\lib;
class conf
{
    static public $conf = array();
    static public function get($name,$file)
    {
        /*
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         * */
        p(self::$conf);
        if(isset( self::$conf[$file]))
        {
            return self::$conf[$file][$name];
        }else{
            p(1);
            $file = './core/config/'.$file.'.php';
            // p($file);exit();
            if(is_file($file))
            {
                $conf = include($file);
                if(isset($conf[$name]))
                {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                }else{
                    throw new \Exception('没有这个配置项'.$name);
                }
            }else{
                throw new \Exception('找不到控制器'.$file);
            }
        }
    }

}