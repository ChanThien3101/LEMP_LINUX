<?php
class DModel{
   protected $db = array();
   public function __construct(){
       $connect = 'mysql:dbname=dblinux; host=localhost; charset=utf8';
       $user = 'root';
       $pass = '310102@';
       $this ->db = new Database($connect,$user,$pass);
    }
    
}
?>