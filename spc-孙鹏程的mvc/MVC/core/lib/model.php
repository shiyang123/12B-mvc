<?php

namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        // $dns = 'mysql:host=localhost;dbname=two;charset=utf8';
        // $username = 'root';
        // $passwd = 'root';
        // try {
        //     parent::__construct($dns ,$username ,$passwd);
        // } catch (\PDOException $e){
        //     p($e->getMessage());
        // }
        

      $conf = conf::all('database');
	 $dns = 'mysql:host='.$conf['DB_HOST'].';dbname='.$conf['DB_NAME'].';';
	 $username = $conf['DB_USER'];
	 $passwd = $conf['DB_PWD'];
	  try {
            parent::__construct($dns ,$username ,$passwd);
        } catch (\PDOException $e){
            p($e->getMessage());
        }

    
    
    }

	



}