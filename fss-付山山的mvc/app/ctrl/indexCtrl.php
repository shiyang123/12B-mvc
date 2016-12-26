<?php

namespace app\ctrl;

   class indexCtrl extends \core\imooc
   {  
       public function index()
       {  
        // p(456); 
          // header("content-type:text/html;charset=utf8");      
          // p('this is a index sAS');
           // $temp=\core\lib\conf::get('CTRL','route');               //加载配置类
           //    $temp=\core\lib\conf::get('ACTION','route');               //加载配置类
           $temp = new \core\lib\model();
           print_r($temp);
          //  $model = new \core\lib\model();                          //实例化
          //  $sql="select * from user";
          //  $arr=$model->query($sql);
          //  // p($arr->fetchAll());
          // $title = '这是视图文件';
          // $this->assign('title',$title);
          // $data = 'hello world';
          // $this->assign('data',$data);
          // $this->display('index/index.html');

       }
   }
  // function test()
  //  {
  //      $obj = new indexCtrl();            //实例化对象依然输出123 和456
  //      p($obj);                  
  //  }
   

   // function __distruct()
   // {
   //    p(789);                          //调用index/index方法和不调用都会，则只输出构造函数和方法中的值即123和456
   // }

?>