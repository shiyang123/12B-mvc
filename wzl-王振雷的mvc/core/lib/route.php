<?php
namespace core\lib;
class route{
    public $ctrl;
    public $action;
    public function __construct(){
        //p($_SERVER);
        //隐藏index.php
        //获取url 参数部分
        //返回控制器和方法
       // p($_SERVER);
       // p($_SERVER['REQUEST_URI']);
        if(isset($_SERVER['REQUEST_URI'])&&$_SERVER['REQUEST_URI'] != '/'){
            $path=$_SERVER['REQUEST_URI'];
          // p($path);
            $patharr=explode('/',trim($path,'/'));
            //p($patharr);
            //p($patharr);
            if(isset($path[0])){
                $this->ctrl = $patharr[0];
            }
            unset($patharr[0]);
            if(isset($path[1])){
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else{
                $this->action = 'index';
            }
            $count = count($patharr)+2;
            $i=2;
            while($i<$count){
                if(isset($patharr[$i+1])) {
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i = $i + 2;
            }
           // p($patharr);
            //p($_GET);
        }else{
            $this->ctrl='index';
            $this->action='index';
        }
    }
}