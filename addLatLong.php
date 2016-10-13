<?php

    $no = $_GET['no'];

    $str = trim($_GET['string']);

    $record = strtok($str,"cut");

    $recordList[] = $record;

    while($record !== false)
    {
        $record = strtok("cut");

        if($record AND $record != "")
        {
            $recordList[] = $record;
        }
    }
//    echo var_dump($recordList);
    include_once "mySQL_connection.inc.php";
    $conn = dbConnect();

    foreach($recordList as $record)
    {
        $record = mysql_real_escape_string($record);

        $suburb = strtok($record,'|');
        $lat = strtok('|');
        $long = strtok('|');

        $sql = "UPDATE suburb SET Latitude = '".$lat."', Longitude = '".$long."'
                                                WHERE SuburbName = '".$suburb."'";
//        echo $sql;
        mysql_query($sql) or die(mysql_error());
    }



    mysql_close($conn);
//
    header("Location: location.php?no=".($no + 10));

?>
