<?php 

namespace core\lib;
use core\lib\conf;
    class model extends \PDO
    {
         public function __construct()
         {
              // $dsn='mysql:host=127.0.0.1;dbname=laravel';       //连库
              // $username='root';
              // $passwd='root';
              $database = conf::all('database');
              // p($database);
             try{
                parent::__construct($database['dsn'],$database['username'],$database['password']);
             } catch(\PDOException $e) {

                 // p($e->getMessage());                           //连接不上抛出异常
             }

         }
    }

?>