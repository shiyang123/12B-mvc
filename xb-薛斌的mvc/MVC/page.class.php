<?php 	
header('content-type:text/html;charset=utf-8;');
/**
* 分页类
*/
class PageName
{
	private $count; 	    //总条数
	private $size=5;	    //每页显示条数
	private $num; 		    //总页数
	private $page; 			//当前页
	private $offset=3;		//偏移量(步长)
	private $config = array(
		   'last' => "&lt&lt",
		   'next' => "&gt&gt",
		);					//默认分页样式

	function __construct($count,$size)
	{
		$this->count = $count;
		$this->size  = $size;
		$this->page  = isset($_GET['page'])?$_GET['page']:1;
	}

	/**
	 * 展示分页
	 */
	public function show()
	{
		//总页数
		$this->num = $num = ceil($this->count/$this->size);
		
		//左步长
		$leftPage  = max($this->page - $this->offset,1);

		//右步长
		$rightPage = min($this->page + $this->offset,$num);

		//上一页
		$lastPage="";
		if ($this->page > 1) {
			$lastNum = $this->page-1;
			$lastPage='<a href="?page='.$lastNum.'">'.$this->config['last'].'</a> ';
		}

		//下一页
		$nextPage="";
		if ($this->page < $num) {
			$nextNum = $this->page+1;
			$nextPage='<a href="?page='.$nextNum.'">'.$this->config['next'].'</a> ';
		}

		//分页链接
		$PageLike="";
		for ($i=$leftPage; $i <= $rightPage; $i++) { 
			$PageLike.=' <a href="?page='.$i.'">'.$i.'</a> ';
		}
		return $lastPage.$PageLike.$nextPage;
	} 

	//修改分页样式
	public function setConfig($config)
	{
		foreach ($config as $key => $value) {
			$this->config[$key]=$value;
		}
	}



}
$array = array('last'=>"上一页",'next'=>'下一页');
$obj = new PageName(100,3);
$obj->setConfig($array);
echo $obj->show();
?>