<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/25
 * Time: 18:22
 * 链接数据库
 */
namespace core\lib;
use core\lib\config;
class model extends \PDO{
    public function __construct(){
        $database = config::all('database');
        try{
            parent::__construct($database['DSN'],$database['USERNAME'],$database['PASSWD']);
        }catch(\PDOException $e){
            p($e->getMessage());
        }
    }
}
