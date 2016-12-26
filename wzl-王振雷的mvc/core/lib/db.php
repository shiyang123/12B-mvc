<?php
namespace core\lib;
class db extends \PDO
{
    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=lian1';
        $username='root';
        $passwd = 'root';
        try{
            parent::__construct($dsn,$username,$passwd);
        }catch(\PDOException $e){
            p($e->getMessage());
        }
    }
}