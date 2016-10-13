<?php
//put the project path for redirecting paths later
//    $PROJECT_PATH = "";
    date_default_timezone_set('Australia/NSW');
function dbConnect()
{
  $conn = mysql_connect('localhost:3306',"hgdien","devilbat") or die ('Cannot connect to server');
  mysql_select_db("cornish_hglong",$conn) or die ('Cannot open database');
  return $conn;

  }

?>
