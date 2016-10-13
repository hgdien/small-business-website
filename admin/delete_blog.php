<?php
        $blogID = $_GET['blogID'];


        //include the Blog object and then save the new blog to the database
        include_once "../mySQL_connection.inc.php";

        $conn = dbConnect();
        $sql = "DELETE FROM `comment` WHERE BlogID = ".$blogID;
        //        echo $sql.'<br/><br/>';
        mysql_query($sql) or die(mysql_error());

        $sql = "DELETE FROM `blog` WHERE BlogID = ".$blogID;
        //        echo $sql.'<br/><br/>';
        mysql_query($sql) or die(mysql_error());



        mysql_close($conn);
        header("Location: adminhome.php");

?>
