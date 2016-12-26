<?php  
namespace core\lib;

class model extends \PDO{
   public function __construct(){
   	$dsn = 'mysql:host=localhost;dbname=yii3';
   	$userName = 'root';
   	$passWord= 'root';
	   	try{	
	   		parent::__construct($dsn,$userName,$passWord);
	   	} catch (\PDOException $e){

          p($e->getMessage());

	   	}
   }
}



?>