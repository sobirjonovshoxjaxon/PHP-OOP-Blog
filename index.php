<?php

   

    require_once 'config/bootstrap.php';

    $posts = Post::getAll();

   /* 
        $post = Post::getById(5); // Bu kod orqali 5 idga oid postni olsak bo'ladi
        $posts = Post::getAll(); // Bu kod orqali hamma ma'lumotni olsak bo'ladi 
    */


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Blog</title>
</head>
<body>
    <h1>OOP Blog</h1>
    
        <?php if(isset($_SESSION['post-created'])): ?>
            <p>
                <?= $_SESSION['post-created']; ?>
                <?php unset($_SESSION['post-created']); ?>
            </p>
        <?php endif;?>





    
    <a href="create.php">Create New Post</a>
    <ul>
        <?php foreach($posts as $post): ?>
            <li>
               <a href="post.php?id=<?= $post->id; ?>"> Title: <?= $post->title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>



</body>
</html>