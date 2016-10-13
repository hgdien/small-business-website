<?php

    if(isset($_POST['submitWork']))
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $type = $_POST['type'];
        $referer  = $_SERVER['HTTP_REFERER'];
        $workID = $_POST['workID'];

        

        if($title == "" OR $content == "")
        {
            $message = "Please fill in the recent work title and content";
            header("Location: $referer"."?warning=$message");
        }
        else
        {


                for($count = 1; $count < 6; $count++)
                {

                    if($workID != "")
                    {
                        if($_POST["oldLink$count"] != "" AND  $_FILES["picture$count"]['name'] == "")
                        {
                            $pictureList[] = $_POST["oldLink$count"];
                            $descList[] = $_POST["picdesc$count"];
                        }
                        else
                        {
                            $picture = $_FILES["picture$count"]['name'];
            //                echo $picture."<br/>";
                            if($picture != "")
                            {
                                $fileName = substr($title,0,6).$count."_".date("d_m_y").".".findexts(basename($picture));

                                $target_path = "../uploadImages/".$fileName;
            //                    echo $target_path;
            //                    echo move_uploaded_file($_FILES["picture$count"]['tmp_name'], $target_path);
                                if(!move_uploaded_file($_FILES["picture$count"]['tmp_name'], $target_path))
                                {
                                    $message = "There was an error occured when uploading the picture, please try again!";
                                    header("Location: $referer"."?warning=$message");
                                }
                                $pictureList[] = $fileName;
                                $descList[] = $_POST["picdesc$count"];
                            }
                        }
                    }
                    else
                    {

                        $picture = $_FILES["picture$count"]['name'];
        //                echo $picture."<br/>";
                        if($picture != "")
                        {
                            $fileName = substr($title,0,6).$count."_".date("d_m_y").".".findexts(basename($picture));

                            $target_path = "../uploadImages/".$fileName;
        //                    echo $target_path;
        //                    echo move_uploaded_file($_FILES["picture$count"]['tmp_name'], $target_path);
                            if(!move_uploaded_file($_FILES["picture$count"]['tmp_name'], $target_path))
                            {
                                $message = "There was an error occured when uploading the picture, please try again!";
                                header("Location: $referer"."?warning=$message");
                            }
                            $pictureList[] = $fileName;
                            $descList[] = $_POST["picdesc$count"];
                        }
                    }

                }

                if(count($pictureList) == 0)
                {
                    $message = "Please upload at least one picture !";
                    header("Location: $referer"."?warning=$message");
                }
                else
                {
                    //include the Work object and then save the new Work to the database
                    include_once '../objects/Work.php';
                    //add new work
                    if($workID =="")
                    {


                        $newWork = new Work($title, $content, $pictureList, $descList, $type);
                        $newWork->save();

                        header("Location: $referer");
                    }
                    else //edit existing work
                    {

                        $work = new Work("","","", "","");
                        $work->update($workID, $title, $content, $pictureList, $descList, $type);

                        $message = "Work Updated.";
                        header("Location: $referer"."&warning=$message");
                    }
                }



        }


    }

         function findexts ($filename)
         {
             $filename = strtolower($filename) ;
             $exts = split("[/\\.]", $filename) ;
             $n = count($exts)-1;
             $exts = $exts[$n];
             return $exts;
         }
?>