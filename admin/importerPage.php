<?php
    session_start();
//    require_once('ebayAPIIncludes/sessionHeader.php');
//    require_once('ebayAPIIncludes/SingleItem.php');

    if(isset($_SESSION['username']))
    {

        include("mySQL_connection.inc.php");

        $conn = dbConnect();

        $sql = "SELECT PaypalEmail FROM userpayment WHERE UserID = ".$_SESSION['userID'];

        $result = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_array($result))
        {
             $paypalEmail = $row['PaypalEmail'];
        }
        mysql_close();
    }
    

?>

<!--
    Document   : index.php
    Created on : Dec 22, 2009, 12:36:45 PM
    Author     : Peter
    Description:
        The main page.

    Updated: 12/1/2010
-->


<!Include php files for login, sign up function>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


        <script type="text/javascript" src="javascripts/main.js"></script>

        <?php
            include("stylesheet.inc.html");
        ?>

    </head>
    <body>
        <div id="content">
            <?php
                include("headSection.inc.php");
            ?>
            <div id="middleSection">
                <div id="middleLeftSection" style="font-size: 14px;">
                    <?php
                    if(!isset($_SESSION['username']))
                    {
    //                         var_dump($_GET);
                    ?>
                            <div id="bigHeading">
                                Please login to list items on your personal Twizla store.<br/>
                                Don't have a Twizla account? <br/>
                               <a href="registrationPage.php">Register</a> in 30 seconds and start listing and checking products.
                            </div>

                    <?php
                    }
                    else
                    {
                    ?>
                        <img id="importerImage" src="webImages/importer.png" alt="Importer" />
                        <br>
                        <?php
                            if(isset($_GET['message']))
                            {
                               ?>
                            <div style="border: 1px solid #c4c4c4; padding: 5px; font-size: 12px; margin: 15px;">
                                <?php echo $_GET['message'];?>
                            </div>
                        <?php
                            }
                            else
                            {
                                echo "<br>";
                            }
                        ?>
                        <br>
                        <label style="font-weight: bold; ">Import Source: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="source" onclick="document.getElementById('EBaySection').style.display=''; document.getElementById('CSVSection').style.display='none'"> Ebay
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="source" onclick="document.getElementById('EBaySection').style.display='none'; document.getElementById('CSVSection').style.display=''">CSV File

                        <br><br>
                        <div id="importDetail">

                            <div id="EBaySection" style="display: none; border: 1px solid #c4c4c4; padding: 10px;">
                            <?php
                            if($paypalEmail != null AND $paypalEmail != "")
                            {
                            ?>
                                Dear <?php echo $_SESSION['username'];?>, please note the Twizla Importer will assume that all currency format and shipping location of items to be imported are within Australia.
                                <br>
                                Please click on the button below to sign in your eBay account and allow Twizla to import all your eBay Active Selling items to Twizla.

                                <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <img src="webImages/signinpink.png" alt="SignInButton" onclick="window.location='importEBayItem.php'" />
                            <?php
                            }
                            else
                            {
                                ?>
                                Dear <?php echo $_SESSION['username'];?>, you need to <a target="#" href="<?php echo $SECURE_PATH;?>myAccountPage.php?page=Account&tab=5">update your PaypalEmail information</a> to be able to import items from Ebay.
                                <?php
                            }
                            ?>
                            </div>

                            <div id="CSVSection" style="display: none; border: 1px solid #c4c4c4; padding: 10px;">
                                You can upload your CSV file to import multiple item to Twizla.<br>
                                Please note that imported items will have the listing duration of 30 days and payment method set to PayPal by default.<br>
                                Therefore, if you have not already done so, please <a href="<?php echo $SECURE_PATH;?>myAccountPage.php?page=Account&tab=3">update your payment detail</a>.
                                You can also <a href="helpPage.php?subPage=17&height=1570">learn more about import CSV inventory file</a>.
                                <br><br>
                                <form id="CSVSubmitForm" enctype="multipart/form-data" method="POST" action="importCSVFile.php">
                                    <input type="hidden" name="CSVSubmit" value="true"/>
                                    <input type="file" name="CSVFile" value="" />
                                    <br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img src="webImages/importcsvfileblue.png" alt="ImportCSVFileButton" onclick="document.getElementById('CSVSubmitForm').submit()" />
                                </form>
                            </div>
                        </div>


                    <?php
                    }
                    ?>

                </div>
                <?php
                    include("middleRightSection.inc.php");
                ?>
            </div>

            <?php
                include("footerSection.inc.php");
            ?>

    </body>
</html>
