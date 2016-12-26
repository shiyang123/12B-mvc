<?php
namespace app\ctrl;
use app\ctrl\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $arr=M()->table('aa')->select();
        $this->assign('arr',$arr);
        $this->display('index.php');
    }
    public function del(){
        $id=$_GET['id'];
        M()->delete('aa',['id'=>$id]);
        echo "<script>location.href='http://localhost/da/pzmvc/index.php/index/index';</script>";
    }
    public function update(){
        $id=$_GET['id'];
        $ar=M()->table('aa')->where(['id'=>$id])->select();
        $this->assign('arr',$ar[0]);
        $this->display('update.php');
    }
    public function upone()
    {
        $id=$_POST['id'];
        $uname=$_POST['uname'];
        $pwd=$_POST['pwd'];
        M()->update('aa',['name'=>$uname,'pwd'=>$pwd],['id'=>$id]);
        echo "<script>location.href='http://localhost/da/pzmvc/index.php/index/index';</script>";
    }
    public function insert()
    {
        $this->display('insert.php');
    }
    public function inone()
    {
        $name=$_POST['uname'];
        $pwd=$_POST['pwd'];
        M()->add('aa',['name'=>$name,'pwd'=>$pwd]);
         echo "<script>location.href='http://localhost/da/pzmvc/index.php/index/index';</script>";
    }
}