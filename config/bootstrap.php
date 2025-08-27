<?php 
    session_start();

    require_once 'autoload.php';


    $database = new Database('MySQL-5.7','phpoopblog','root','');
    $pdo = $database->connect();
    Post::$pdo = $pdo;
   


?>