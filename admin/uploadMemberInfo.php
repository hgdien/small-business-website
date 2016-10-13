<?php

// process the script only if the form has been submitted

    if(isset($_POST['verifySubmit']))
    {
        //include the functions to connect to database
        include("mySQL_connection.inc.php");
        $referer  = $_SERVER['HTTP_REFERER'];
        $userID = $_POST['userID'];

        $fileName = $_FILES['uploadFile']['name'];
        $fileSize = $_FILES['uploadFile']['size'];
        $fileType = $_FILES['uploadFile']['type'];

        $fileName = preg_replace('/\s/', '_', $fileName);
        $file_ext = preg_split("/\./",$fileName);


        $message = "";
        //create the folder contains information for this user if not exist
        $target_path = "userProfile/user".$userID;
        if(!file_exists($target_path))
        {
            mkdir("userProfile/user".$userID, 0700);
        }


//        $target_path = "userProfile/";

//        echo $userID;
        

        if($fileName == "") // if no file input, kill it
        {
            $message = "Please select the identification file to upload";

        }
        else if(!(strtolower($file_ext[1]) =='jpg' || strtolower($file_ext[1])=='png' || strtolower($file_ext[1])=='jpeg' || strtolower($file_ext[1])=='pdf'))
             // if file does not equal these types, kill it
        {
            $message = "The upload file type is not an acceptable format.<br> Acceptable file type are: jpg, png, pdf, bmp.";
//            $message .= $file_ext[1];
        }
        else if($fileSize>'9000000') // if size is larger than 9MB, kill it
        {
            $message = $fileName . " is over 9MB. Please make it smaller.";
        }

        if($message == "")
        {
//            $ext = strrchr($_FILES['uploadFile']['name'], '.');
//            $target_path = $target_path."/user".$userID.$ext;
                $target_path = $target_path."/".$_FILES['uploadFile']['name'];
//            echo move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
            if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_path))
            {

                $conn = dbConnect();

                // prepare the query for updating the verify status of user
                $updateSQL = "UPDATE user SET verifyStatus = 'waiting' WHERE UserID = $userID";
        //            $message[] = $insertSQL;
        //            echo $insertSQL;
                mysql_query($updateSQL) or die(mysql_error());

                mysql_close($conn);

                $message = "The verification file has been submited";
            }
            else
            {
                $message = "There was an error during the upload process!";
            }

        }

        header("Location: $referer"."&warning=$message"); // go back to the page we came from
    }

?>
