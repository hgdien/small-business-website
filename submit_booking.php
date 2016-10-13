<?php
    session_start();
    if(isset($_GET['submitBooking']))
    {
        $name = $_GET['booking_name'];
        $contact = $_GET['booking_contact'];
        $case = $_GET['case'];
        $referer  = $_SERVER['HTTP_REFERER'];

        date_default_timezone_set('Australia/NSW');

//        //include the Blog object and then save the new blog to the database
//        include_once "mySQL_connection.inc.php";
//
//        $conn = dbConnect();
//        $sql = "INSERT INTO booking (Name , Contact, Case, Date) VALUE ('$name', $contact, '$case','".date('Y-m-d')."')";
////        echo $sql.'<br/><br/>';
//        mysql_query($sql) or die(mysql_error());
//
//        mysql_close();

        //send email to cornish
//        $headers  = "From: $email\r\n";
//        $headers .= "Reply-To: $email\r\n";

        $email_to ='info@cornishservices.com.au';


        $subject ='New Cornish Booking';
        $message = "Customer Name: $name.

Contact Number: $contact.

Booking Date: ".date('F j, Y ')." at ".date('H:i ', strtotime(date('y-m-d H:i:s')) - 60*60)." .

Case Detail: $case.";

        if(mail($email_to, $subject, $message))
        {
            $message = "Your case have been booked.<br> Please be patient and wait for our call in the next 24 hours.";
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