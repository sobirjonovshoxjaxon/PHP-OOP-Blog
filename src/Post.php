<?php

   
    class Post {

        public static $pdo;

        public $id;
        public $title;
        public $body;
        public $created_at;



        // Index.php sahifais uchun yaratilgan method vazifasi baza ichidagi hamma ma'lumotni olib Post classiga solib qo'yish index.php dagi vazifasi ma'lumotlarni hammasini chiqarib berish. Static method yaratilganini sababi bu methodni faqat Post class ishlata olishi uchun
        public static function getAll(){

            $statement = self::$pdo->prepare("SELECT * FROM posts");
            $statement->setFetchMode(PDO::FETCH_CLASS, 'Post'); // you can find this code in chrome by "pdo fetch class array" Bu kodni vazifasi Post classiga kevotgan ma'lumotlarni solib qo'yish
            $statement->execute();
            $posts = $statement->fetchAll();

            return $posts;

        }

        // Bu methodni vazifasi post.php da postni ichki sahifasini id orqali ajratib olish va ekranga chiqarish 
        public static function getById($id){


            $statement = self::$pdo->prepare("SELECT * FROM posts WHERE id = ?");
            $statement->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $statement->execute([$id]);
            $post = $statement->fetch();

            return $post;
        }


        //Bu methodni vazifasi yangi post yaratish 
        public static function create($title,$body){

            $statement = self::$pdo->prepare("INSERT INTO posts(title,body) VALUES (:title, :body)");
            $statement->execute([

                'title' => $title,
                'body' => $body,
            ]);
            $row = $statement->rowCount(); // rowCount() funksiyasi nechta qator o'zgarganini sanab beradi va 1 qaytaradi
            return $row;

        }


        


    }

   







?>