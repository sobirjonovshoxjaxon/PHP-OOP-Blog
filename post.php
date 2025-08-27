<?php 

    require_once 'config/bootstrap.php';

    $post_id = $_GET['id'];

    $post = Post::getById($post_id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postni ichki sahifasi</title>
</head>
<body>
    <h1><?= $post->id; ?> - <?= $post->title; ?></h1>
    <p><?= $post->body; ?></p>
    <small><?= $post->created_at; ?></small><br>

    <a href="index.php">Back</a>
</body>
</html>