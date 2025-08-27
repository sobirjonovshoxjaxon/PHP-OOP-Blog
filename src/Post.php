<?php

   
    class Post {

        public static $pdo;

        public $id;
        public $title;
        public $body;
        public $created_at;
    }

    public function getAll(){

        $stmt = self::$pdo->prepare("SELECT * FROM posts");
        $stmt->execute([$id]);
        $user = $stmt->fetch();

    }







?>