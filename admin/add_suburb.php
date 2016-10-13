<?php
    include("../mySQL_connection.inc.php");
    
    $conn = dbConnect();

    $string = $_POST['suburbstring'];

    $record = strtok($string,"<break>");

    $recordList[] = $record;

    while($record !== false)
    {
        $record = strtok("<break>");

        if($record AND $record != "")
        {
            $recordList[] = $record;
        }
    }

//    var_dump($recordList);
    foreach($recordList as $record)
    {
        $record = mysql_real_escape_string($record);

        $suburb = strtok($record,'|');
        $zipcode = strtok('|');
        $population = strtok('|');

        $sql = "INSERT INTO suburb (SuburbName ,ZipCode, Population) VALUE ('$suburb', $zipcode, $population)";
//        echo $sql.'<br/><br/>';
        mysql_query($sql) or die(mysql_error());
    }

    mysql_close();

    header("Location: suburb.php?message=Insert Suburb Successful")

?>
