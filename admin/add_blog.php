<?php

    if(isset($_POST['submitBlog']))
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $referer  = $_SERVER['HTTP_REFERER'];
        $picture = $_FILES['picture']['name'];
        $blogID = $_POST['blogID'];
        
        if($title == "" OR $content == "")
        {
            $message = "Please fill in the blog title and content";
            header("Location: $referer"."?warning=$message");
        }
        else
        {
            $sucess = true;
            if($picture != "")
            {
                
                $fileName = substr($title,0,6).$count."_".date("d_m_y").".".findexts(basename($picture));
                $target_path = "../uploadImages/".$fileName;
//                echo $fileName." | ".$blogID." | ".$target_path;
//                echo "<br/>".move_uploaded_file($_FILES['picture']['tmp_name'], $target_path);
                if(!move_uploaded_file($_FILES['picture']['tmp_name'], $target_path))
                {
                    $message = "There was an error occured when uploading the picture, please try again!";
                    header("Location: $referer"."?warning=$message");
                    $sucess = false;
                }

            }
            else if($blogID != "" AND $_POST['oldLink'] != "")
            {
                $fileName = $_POST['oldLink'];
                $target_path = "../uploadImages/".$fileName;

                if(!move_uploaded_file($_FILES['picture']['tmp_name'], $target_path))
                {
                    $message = "There was an error occured when uploading the picture, please try again!";
                    header("Location: $referer"."?warning=$message");
                    $sucess = false;
                }
            }

            if($sucess)
            {

                //include the Blog object and then save the new blog to the database
                include_once '../objects/Blog.php';

                if($blogID == "")
                {

                    $newBlog = new Blog($title, $content, $fileName);
                    $newBlog->save();
                    header("Location: $referer");
                }
                else
                {
                    $blog = new Blog("", "", "");
                    $blog->update($blogID,$title, $content, $fileName);
                    $message = "Blog Updated.";
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