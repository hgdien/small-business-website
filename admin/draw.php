<?php
    session_start();
    include("mySQL_connection.inc.php");
    include("login.php");

    include("loadHome.php");

    // create connection and connect to the Twizla database
    $conn = dbConnect();
   //get the list of users enter the draw
    $loadHomeSQL = "SELECT * FROM user WHERE user.registerDate <= '2010-06-11'
                                                        ORDER BY registerDate DESC";

    $result = mysql_query($loadHomeSQL) or die(mysql_error());;

    while($row = mysql_fetch_array($result))
    {
         $userList[] = $row;
    }

    mysql_close();

?>



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


        <!code for the share this button>
        <script type="text/javascript" src="http://w.sharethis.com/button/sharethis.js#publisher=4343c4c8-3b79-430e-8217-3cbce3bcbc34&amp;type=website&amp;post_services=facebook%2Ctwitter%2Cmyspace%2Cdigg%2Cdelicious%2Cemail%2Csms%2Cwindows_live%2Cstumbleupon%2Creddit%2Cgoogle_bmarks%2Clinkedin%2Cbebo%2Cybuzz%2Cblogger%2Cyahoo_bmarks%2Cmixx%2Ctechnorati%2Cfriendfeed%2Cpropeller%2Cwordpress%2Cnewsvine%2Cxanga&amp;headerbg=%23213155&amp;headerTitle=Share%20this%20Twizla%20Item&amp;button=false"></script>
        <style type="text/css">

        a.stbar.chicklet img {border:0;height:16px;width:16px;margin-right:3px;vertical-align:middle;}
        a.stbar.chicklet {height:16px;line-height:16px;}
        </style>
        
    </head>
    <body>

        <?php
            include("headSection.inc.php");
        ?>

            <div id="middleSection" style="padding-left: 27px; padding-top: 10px;">


                <img src="webImages/ipodBigAd.jpg" alt="IpodBidAd" />
                <div style="text-align: center;">
                    <div style="color: #F52887; font-size: 24px; margin-top: -52px;">
                        <?php
                            $timeRemain = strtotime("11-06-2010") - time();
                            $A_DAY_TIMESTAMP = 24*60*60;
                            $A_HOUR_TIMESTAMP = 60*60;
                            $dayRemain = floor($timeRemain/$A_DAY_TIMESTAMP);
                            $hourRemain = floor(($timeRemain - ($dayRemain * 24*60*60))/$A_HOUR_TIMESTAMP) ;
                            $minuteRemain = floor(($timeRemain - ($dayRemain * 24*60*60) - $hourRemain*60*60)/60);
                            if($timeRemain <= 0)
                            {
                                echo " Ended.";
                            }
                            else if($dayRemain < 1) //if less than one day display the countdown clock
                            {
                                ?>

                                <script type="text/javascript">
                                    countdown_clock(<?php echo strtotime($item['timeFinish']);?>, <?php echo time();?>);
                                </script>
                            <?php
                                echo "&nbsp;  (".date("d M, Y H:i:s T",strtotime($item['timeFinish'])).")";
                            }
                            else
                            {
                                echo $dayRemain ." DAYS ".$hourRemain." HOURS ".$minuteRemain." MINS.";
                            }

                        ?>
                        <br>
                        <div style="font-size: 11px;color: #213155; font-weight: bold;">TIME REMAINING</div>
                    </div>
                </div>
                <br>
                <div style="float: left; border: 1px solid #c4c4c4; width: 200px; height: 396px; padding-top: 3px; margin-top: 0px;">
                    <div style="font-size: 14px;color: #213155; font-weight: bold; margin-left: 40px; ">Newest Members</div>

                    <ul style="list-style: none; padding: 0px;  margin-left: 0px; margin-top: 5px; font-size: 14px; border-bottom:1px solid #c4c4c4; ">
                        <?php
//                        for($x = 0; $x < 40; $x++)
//                        {
//                            $userList[] = $userList[0];
//                        }
                        for($count = 0; $count < count($userList); $count++)
                        {
                            if($count > 14)
                            {
                                break;
                            }
                            echo "<li style='margin-bottom: 3px; padding-left: 40px; border-bottom: 1px dotted; '>".$userList[$count]['UserName']."</li>";
                        }

                        ?>
                        <li style='margin-bottom: 3px; padding-left: 40px; font-weight: bolder; '>...</li>
                    </ul>
                    <div style="font-size: 14px;color: #213155; position: absolute; bottom: 2px; left: 30px; "><b>Total Number Of<br> People in the Draw: </b><?php echo count($userList);?></div>

                </div>

                <div style="font-size: 14px; color: #213155; position: absolute; left: 245px; top: 307px; ; width: 910px; height: 386px;
                     background-image: url(webImages/drawinfobox.jpg); background-repeat: no-repeat;padding-top: 15px;">
                    <div style="margin-left: 0px; padding-left: 15px;">To celebrate the launch of Twizla, we are giving one lucky member a brand new 32GB iPod touch.<br>Spread the word with friends and family. The more you refer, the higher the chances of winning!<br>
                    <a href="registrationPage.php" class="helpLink">Click here to register</a>
                    <br><br>
                    The draw will commence on the 11th of June (12pm AEST), so make sure that you are online that day to find out who the lucky winner is.<br>
                    For more information, see <a href="helpPage.php?subPage=16&height=1680" class="helpLink">Terms and Conditions</a>.
                    <br><br><br><br>
                    </div>

                    <div style="position: absolute; left: 770px; top: 10px; border: 1px solid #c4c4c4; padding: 5px; font-family:helvetica,sans-serif;font-size:12px;">
                        <!insert the share item button>
                        <a id="ck_email" class="stbar chicklet" href="javascript:void(0);"><img src="http://w.sharethis.com/chicklets/email.gif" /></a>
                        <a id="ck_facebook" class="stbar chicklet" href="javascript:void(0);"><img src="http://w.sharethis.com/chicklets/facebook.gif" /></a>
                        <a id="ck_twitter" class="stbar chicklet" href="javascript:void(0);"><img src="http://w.sharethis.com/chicklets/twitter.gif" /></a>
                        <a id="ck_sharethis" class="stbar chicklet" href="javascript:void(0);"><img src="http://w.sharethis.com/chicklets/sharethis.gif" /></a>
                        <script type="text/javascript">
                                var shared_object = SHARETHIS.addEntry({
                                title: document.title,
                                url: document.location.href
                        });

                        shared_object.attachButton(document.getElementById("ck_sharethis"));
                        shared_object.attachChicklet("email", document.getElementById("ck_email"));
                        shared_object.attachChicklet("facebook", document.getElementById("ck_facebook"));
                        shared_object.attachChicklet("twitter", document.getElementById("ck_twitter"));
                        </script>
                    </div>

                    <img src="webImages/drawinfo1.jpg" alt="DrawInfo1" />
                    <img src="webImages/drawinfo2.jpg" alt="DrawInfo2" style="margin-left: 18px;"/>
                    <img src="webImages/drawinfo3.jpg" alt="DrawInfo3" style="margin-left: 18px;"/>
                    <img src="webImages/drawinfo4.jpg" alt="DrawInfo4" style="margin-left: 18px;"/>
                </div>


            </div>
            <?php
            $useragent = $_SERVER['HTTP_USER_AGENT'];

            if(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched))
            {
                    echo "<br/>";
            }
            ?>
            <?php
                include("footerSection.inc.php");
            ?>

    </body>
</html>
