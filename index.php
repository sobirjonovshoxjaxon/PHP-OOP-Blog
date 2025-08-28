<?php

   

    require_once 'config/bootstrap.php';

    $posts = Post::getAll();

   /* 
        $post = Post::getById(5); // Bu kod orqali 5 idga oid postni olsak bo'ladi
        $posts = Post::getAll(); // Bu kod orqali hamma ma'lumotni olsak bo'ladi 
    */


    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['DELETE'])){

        $id = $_GET['post_id'];

        Post::delete($id);

        $_SESSION['post-deleted'] = 'Post deleted successfully';
        header('location: index.php');
        exit;
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1>OOP Blog</h1>
    
        <?php if(isset($_SESSION['post-created'])): ?>
            <p>
                <?= $_SESSION['post-created']; ?>
                <?php unset($_SESSION['post-created']); ?>
            </p>
        <?php endif;?>

        <?php if(isset($_SESSION['post-updated'])): ?>
            <p>
                <?= $_SESSION['post-updated']; ?>
                <?php unset($_SESSION['post-updated']); ?>
            </p>
        <?php endif;?>

         <?php if(isset($_SESSION['post-deleted'])): ?>
            <p>
                <?= $_SESSION['post-deleted']; ?>
                <?php unset($_SESSION['post-deleted']); ?>
            </p>
        <?php endif;?>





    
    <a href="create.php">Create New Post</a>
    <ul>
        <?php foreach($posts as $post): ?>
            <li>
               <a href="post.php?id=<?= $post->id; ?>"> Title: <?= $post->title; ?></a>
               -
              <a href="edit.php?id=<?= $post->id; ?>"><i class="fa-solid fa-pencil"></i></a>
              - 
              <form action="" method="GET">

                <input type="hidden" name="DELETE">
                <input type="hidden" name="post_id" value="<?= $post->id; ?>">

                <button type="submit" style="background-color: white; border: none;">
                    <i class="fa-solid fa-trash"></i>
                </button>
              </form>
            </li>
        <?php endforeach; ?>
    </ul>



</body>
</html>