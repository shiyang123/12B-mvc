<?php
namespace core\lib;
class route
{
    public $controller;
    public $action;
    public function __construct()
    {
        //p('route ok');
        /*
         * 1.隐藏index.php
         * 2.获取URL的参数部分
         * 3.获取对应的控制器和方法
         * */
        //获取URL的参数部分
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER["REQUEST_URI"] != '/')
        {
            //解析/index/index
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/',trim($path,'/'));
            //p($patharr);
            //判断是否存在
            if(isset($patharr[0]))
            {
                $this->controller = $patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1]))
            {
                $this->action = $patharr[1];
                unset($patharr[1]);
            }else{
                $this->action = 'index';
            }
            //url多余部分转换成GET参数
            $count = count($patharr) + 2;
            $i = 2;
            while($i<$count)
            {
                if(isset($patharr[$i+1]))
                {
                    $_GET[$patharr[$i]] = $patharr[$i+1];
                }
                $i = $i+2;
            }
            unset($_GET['url']);
        }else{
            //默认情况下控制器是index
            $this->controller = 'index';
            //默认情况下方法是index
            $this->action = 'index';
    }

    }
}