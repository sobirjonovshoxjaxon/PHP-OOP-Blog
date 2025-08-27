<?php 


    require_once 'autoload.php';


    $conn = new Database('MySQL-5.7','phpoopblog','root','');
    Post::$pdo = $conn;
   


?>