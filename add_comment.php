<?php

    if(isset($_POST['submitComment']))
    {
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $blogID = $_POST['blogID'];
        $referer  = $_SERVER['HTTP_REFERER'];

        //include the Blog object and then save the new blog to the database
        include_once 'objects/Comment.php';
        include_once "mySQL_connection.inc.php";
        $newComment = new Comment($name, $comment, $blogID, date('Y-m-d H:i:s'));
        $newComment->save();

        header("Location: $referer");

        

    }


?>