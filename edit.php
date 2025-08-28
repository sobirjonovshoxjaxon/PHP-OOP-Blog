<?php 

    require_once 'config/bootstrap.php';

    $id = $_GET['id'];
    $post = Post::getById($id);

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PUT'])){

        $id = $_POST['post_id'];
        $title = $_POST['title'];
        $body = $_POST['body'];

        Post::update($id,$title,$body);

        $_SESSION['post-updated'] = 'Post updated successfully';
        header('location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
</head>
<body>
    
    <h1>Edit Post Page</h1>

    <form action="" method="POST">


        <div>
            <input type="hidden" name="PUT">
            <input type="hidden" name="post_id" value="<?= $post->id; ?>">
        </div>
        <div>
            <label><b>Title:</b></label>
            <input type="text" name="title" value="<?= $post->title; ?>">
        </div>

        <div>
            <label><b>Description:</b></label><br>
            <textarea name="body" cols="80" rows="10"><?= $post->body; ?></textarea>
        </div>


        <button type="submit">Edit</button>
        <a href="index.php">Back</a>
    </form>
</body>
</html>