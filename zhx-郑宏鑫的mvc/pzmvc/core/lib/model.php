<?php
namespace core\lib;
class model
{
   public 	$dbtype='mysql';	//数据库类型
	public 	$host='localhost';	//域名
 	private $pdo;//PDO对象
 	// $sql语句
	private $sql=array(
				'select'=>'',	//查询子句
				'table'=>'',	//表名
				'where'=>'',	//条件子句
				'order'=>'',	//排序子句
				'limit'=>'',	//限制条数子句
			);
	public   $page;	        	//当前页
	public   $page_num;			//每页显示条数
	public   $last; 			// 上一页
	public   $next; 			// 下一页
	public   $page_sum; 		//总页数

	/**
	* 连接数据库 
	* @author   syh
	* @param    string $dbname 数据库名
	* @param    string $user   用户名
	* @param    string $pass   密码
	* @return   void
	*/
	public function __construct($dbname='xiaoer',$user='root',$pass='root')
	{
		$pdo = new \PDO("$this->dbtype:host=$this->host;dbname=$dbname", $user, $pass);
	   // 设置字符集
		$pdo->exec('set names utf8');	
		$this->pdo=$pdo;	  
	}
	/**
	* 打印sql语句 
	* @author   syh
	* @return   array
	*/
	public function sql()
	{
		if(is_array($this->sql))
		{
			return implode(' ',$this->sql);	
		}
		else
		{
			return $this->sql;
		}
	}
	/**
	* 执行sql  增，删，改
	* @author   syh
	* @param    string $sql
	* @return   int
	*/
	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}
	/**
	* sql语句初始化 
	* @author   syh
	* @return   void
	*/
	private function sql_init()
	{
		//初始化
		$this->sql=array(
				'select'=>'',	//查询子句
				'table'=>'',	//表名
				'where'=>'',	//条件子句
				'order'=>'',	//排序子句
				'limit'=>'',	//限制条数子句
			);
	}
	/**
	* 表名 
	* @author   syh
	* @param    string   $tableName  表名
	* @return   obj
	*/
	public function table($tableName) 
	{
		$this->sql_init();
		$this->sql["table"]="FROM ".$tableName.' ';
		return $this;
	}
	/**
	* 数据添加 
	* @author   syh
	* @param    string 	$table 	表名
	* @param    array 	$data 	数据
	* @return   int   返回最新插入的id
	*/
	public function add($table,$data)
	{
		// 过滤字段
		$data=$this->fill($table,$data);
		foreach ($data as $key => $value) 
		{
		 	$data[$key]='\''.$value.'\'';
		}
		$fields=implode(',', array_keys($data));
		$values=implode(',', array_values($data));
		$this->sql="INSERT INTO $table ($fields) VALUES ($values)";
		$num=$this->exec($this->sql);
		if($num>0)
		{
			return $this->pdo->lastInsertId();
		}
		else
		{
			return 0;
		}
	}
	/**
	* 数据批量添加 
	* @author   syh
	* @param    string $table 表名
	* @param    array  $data  二维数组
	* @return   int   受影响的行数
	*/
	public function addAll($table,$data)
	{
		$depth=$this->array_depth($data);
		if(is_array($data)&&$depth==2)
		{
			$num=0;
			foreach ($data as $key => $value)
			{
				$value=$this->fill($table,$value);
				$id=$this->add($table,$value);
				if($id==0)
				{
					return 0;
				}
				$num+=1;					 		 
			}
			return $num;		
		}
		else
		{
			return 0;
		}
	}
	/**
	* 数据刪除 
	* @author   syh
	* @param    string 	$table 表名
	* @param    array 	$where 条件
	* @param    string 	$logic 逻辑关系 'AND'/'OR'
	* @return   int  受影响的行数
	*/
	public function delete($table,$where='',$logic='AND')
	{
		// 初始化sql
		$this->sql_init();
		$this->where($where,$logic);
		$this->sql="DELETE FROM $table ".$this->sql['where'];
		return $this->exec($this->sql);	 
	}
	/**
	* 数据修改 
	* @author   syh
	* @param    string  $table 表名
	* @param    array  	$data  数据
	* @param    array  	$where 条件
	* @param    string 	$logic 逻辑关系 'AND'/'OR'
	* @return   int
	*/
	public function update($table,$data,$where=1,$logic='AND')
	{
		// 初始化sql
		$this->sql_init();
		$this->where($where,$logic);
		foreach ($data as $key => $value)
		{
			$list[]=$key.'='.'\''.$value.'\'';
		}
		$string=implode(',',$list);
		$a=$this->sql="UPDATE $table SET $string ".$this->sql['where'];
		return $this->exec($this->sql);
	}
    /**
	* 数据操作条件 
	* @author   syh
	* @param    array 	$where  条件
	* @param    string 	$logic 	逻辑关系
	* @return   obj
	*/
    public function where($where=1,$logic='AND')
    {
		// $where数组深度
		if(!is_array($where))
		{ 
			$this->sql["where"]=' WHERE '.$where.' ';
			return $this;
		}
    	$num=$this->array_depth($where);
		foreach ($where as $key => $value)
		{	
			switch ($num)
			{
				case 1:
					$list[]=$key.'='.'\''.$value.'\'';
					break;
				case 2:
					$list[]=$key.$value[0].'\''.$value[1].'\''; 
					break;
			}
		}
			$this->sql["where"]=' WHERE '.implode(' '.$logic.' ',$list).' ';
    		return $this;
    }
    /**
    * 数据排序 
    * @author   syh
    * @param    string/array    $field 排序字段 降序
    * @return   obj
    */
    public function order($field) 
    {
    	if(is_string($field))
    	{
        	$order="ORDER BY ".$field.' DESC'; 
    	}
    	if (is_array($field)) 
    	{
    		foreach ($field as $key => $value) 
    		{
    			$list[]='ORDER BY '.$field.' DESC';	 	
    		}
    		$order=implode(' ',$list);
    	}
    	$this->sql["order"]=$order;
    	return $this;

    }
    /**
    * 数据限制条数 
    * @author   syh
    * @param    string  args(0) 查询数据条数/起始记录，  
    * @param    string  args(1) 查询数据条数
    * @return   obj
    */
    public function limit() 
    {
		$numargs = func_num_args();
		switch ($numargs)
		{
			case 1:
				$limt="LIMIT  0,".func_get_arg(0);
				break;
			case 2:
				$limt="LIMIT  ".func_get_arg(0).','.func_get_arg(1);	 
				break;	
			default:
				break;
		}
		$this->sql["limit"]=' '.$limt.' ';
		return $this;
    }
    /**
    * 数据查询(多条) 
    * @author   syh
    * @param    string  $filds 查询字段
    * @return   array
    */
    public function select($filds='*')
    {
        $this->sql["select"]="SELECT ".$filds;
     	return $this->query($this->sql(),0);
    }
    /**
    * 数据查询(单条) 
    * @author   syh
    * @param    string  filds 查询字段
    * @return   array/false
    */
    public function find($filds='*')
	{
     	$this->sql["select"]="SELECT ".$filds.' ';
     	return $this->query($this->sql(),1);
	}
    /**
    * 执行sql语句 (查询) 
    * @author   syh
    * @param    string 		$sql  sql语句
    * @param    string 		$num  0查询多条，1查询单条
    * @return   array/false
    */
    public function query($sql,$num=0)
	{
		$obj=$this->pdo->query($sql);
		if($num==0)
		{
			return $obj->fetchAll(\PDO::FETCH_ASSOC);
		}
		elseif($num==1)
		{
			return $obj->fetch(\PDO::FETCH_ASSOC);
		}
	}
	/**
	* 检测数组深度 
	* @author   syh
	* @param    array  $arr 
	* @return   int
	*/
	private function array_depth($arr)
	{
		if(!is_array($arr)) return false;
		$array_max=1;
		foreach ($arr as $value) 
		{
			if(is_array($value))
			{
			    $depth=$this->array_depth($value)+1;       
				if($depth>$array_max)
			    {
			      	$array_max=$depth;
			    }
			}
		}
		return $array_max;
	}

	/**
	* 数据分页 
	* @author   syh
	* @param    string 			$table 		表名
	* @param    int 			$page 		当前页
	* @param    int 			$page_num 	每页条数
	* @param    string 			$fields 	查询字段
	* @param    string/array 	$where 		查询条件
	* @param    string 			$logic 		逻辑关系
	* @return   array
	*/
	public function fenye($table,$page=1,$page_num=5,$fields='*',$where=1,$logic='AND')
	{
		// 初始化sql
		$this->sql_init();
		// 当前页
		$this->page=$page;
		 // 总条数
		$count=$this->count($table,$fields,$where,$logic);
		 //总页数
		$this->page_sum=ceil($count/$page_num);
		  //偏移量
		$limt=($this->page-1)*($page_num);
		//上一页
		$this->last=$this->page-1<1?1:$this->page-1;
		 //下一页
		$this->next=$this->page+1>$this->page_sum?$this->page_sum:$this->page+1;
		//查询当页内容
		$this->limit($limt,$page_num)->where($where,$logic);
		$this->sql="SELECT $fields FROM $table ".$this->sql['where'].$this->sql['limit'];
		return $this->query($this->sql);
	}
	/**
	* 数据总条数 
	* @author   syh
	* @param    string  $table 	表名 
	* @param    string  $fields 字段 
	* @param    array   $where 	条件
	* @param    string  $logic 	逻辑关系
	* @return   int  
	*/
	public function count($table,$fields='*',$where=1,$logic='AND')
	{
		// 初始化sql
		$this->sql_init();
		$this->where($where,$logic);
		$sql="SELECT COUNT($fields) AS num FROM $table ".$this->sql['where'];
		return $this->query($sql,1)['num'];
	}
	/**
	* 多余字段过滤
	* @author   syh
	* @param    string  $table 表名
	* @param    array 	$data  被过滤数据
	* @return   array
	*/
	private function fill($table,$data)
	{
		
		 $fields=$this->pdo->query("DESC  $table")->fetchAll(\PDO::FETCH_COLUMN);  
		 foreach ($data as $key => $value) 
	   	 {
	   	     if(!in_array($key,$fields))
	   	     {
	   	     	unset($data[$key]);
	   	     }
	   	 } 
	   	 return $data; 
	}
}
