<?php 
namespace core\lib;
class model extends \PDO
    {
         public function __construct()
         {
              $dsn="mysql:host=127.0.0.1;dbname=xuepeiyu";
              $username='root';
              $passwd='root';
             try{
                parent::__construct($dsn,$username,$passwd);
             } catch(\PDOException $e) {

                 p($e->getMessage());
             }

         }
    }

?>