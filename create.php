<?php 
   
    require_once 'config/bootstrap.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $title = $_POST['title'];
        $body = $_POST['body'];

        $result = Post::create($title,$body);

        
        if($result == 1){

            $_SESSION['post-created'] = 'Post created successfully';
            header('location: index.php');
            exit;
        }else{

            echo "Your post couldn't created";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <h3>Create Post</h3>
    <form action="" method="POST">

       <div>
            <label><b>Title</b></label>
            <input type="text" name="title">
       </div>

        <div>
            <label><b>Description:</b></label><br>
            <textarea name="body" cols="50" rows="10"></textarea>
        </div>

        <button type="submit">Create</button>
    </form>

    <a href="index.php">Back</a>
</body>
</html>