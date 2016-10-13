<?php
        $workID = $_GET['workID'];


        //include the Blog object and then save the new blog to the database
        include_once "../mySQL_connection.inc.php";

        $conn = dbConnect();
        $sql = "DELETE FROM `work_picture` WHERE WorkID = ".$workID;
        //        echo $sql.'<br/><br/>';
        mysql_query($sql) or die(mysql_error());

        $sql = "DELETE FROM `recent_work` WHERE WorkID = ".$workID;
        //        echo $sql.'<br/><br/>';
        mysql_query($sql) or die(mysql_error());

        mysql_close($conn);
        header("Location: work.php");

?>
