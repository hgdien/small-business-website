<?php

    if(isset($_GET['submitJob']))
    {
        $name = $_GET['job_name'];
        $contact = $_GET['job_contact'];
        $email = $_GET['email'];
        $skill = $_GET['skill'];
        $referer  = $_SERVER['HTTP_REFERER'];
        date_default_timezone_set('Australia/NSW');
        //include the Blog object and then save the new blog to the database
//        include_once "mySQL_connection.inc.php";
//
//        $conn = dbConnect();
//        $sql = "INSERT INTO employeeform (Name ,Contact, Email, Skill, Date) VALUE ('$name', $contact, '$email', '$skill', '".date('Y-m-d')."')";
//        echo $sql.'<br/><br/>';
//        mysql_query($sql) or die(mysql_error());
//
//        mysql_close();
//
//        header("Location: $referer?msg=Your application has been submitted.<br> We will contact you as soon as possible.");
        $email_to ='info@cornishservices.com.au';

        $subject ='New Cornish Employee Application';
        $message = "Employee Name: $name.

Contact Number: $contact.

Email: $email.

Apply Date: ".date('F j, Y ')." at ".date('H:i ', strtotime(date('y-m-d H:i:s')) - 60*60)." .

Skill Set: $skill.";

            

        if(mail($email_to, $subject, $message))
        {
            $message = "Your application has been submitted.<br> We will contact you as soon as possible.";
            ?>
                <img src="images/confirmtick.png" alt="ConfirmTickImage" style="margin: 0px; width: 121px; height: 121px; " />
                <p>
                <?php echo $message;?>
                </p>


                <input type="button" class="button medium black center" value="Ok"
                 onclick="document.getElementById('alertBox').style.display='none';document.getElementById('fancybox-overlay').style.display='none';"/>
            <?
        }
        else
        {
            $message = "Problem occurred. Mail send failed";
            ?>
                <img src="images/confirmcross.png" alt="ConfirmTickImage" style="margin: 0px; width: 121px; height: 121px; " />
                <p>
                <?php echo $message;?>
                </p>


                <input type="button" class="button medium black center" value="Ok"
                 onclick="document.getElementById('alertBox').style.display='none';document.getElementById('fancybox-overlay').style.display='none';"/>
            <?
        }


    }


?>