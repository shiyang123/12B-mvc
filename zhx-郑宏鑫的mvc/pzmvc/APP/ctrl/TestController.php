<?php
namespace app\ctrl;
use app\ctrl\Controller;

class TestController extends Controller
{
    public function index()
    {
        $arr=M()->table('aa')->select();
        $this->assign('arr',$arr);
        $this->display('index.php');
    }
    
}