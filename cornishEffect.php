<?php
    include_once "mySQL_connection.inc.php";

    $conn = dbConnect();
//    $no = $_GET['no'];
    $sql = "SELECT * FROM suburb ORDER BY SuburbName ASC";
    //        echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    while($row = mysql_fetch_array($result))
    {
         $suburbList[] = $row;
    }

    mysql_close($conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/">
<head>

	<title>Cornish Property Services | 24/7 Emergency calls for Plumbing, Blocked Drain, Hot Water System, Electrical and Building in Sydney | CPS EFFECT</title>
        <meta name="keywords" content="plumbing,plumber,electricity usage, water usage,save money,save water,water management,suburb,sydney,hornsby,CBD,effect,cornish property services,zip code,improve living, save on my electricity bill,save on my water bill,government rebate" />
        <meta name="description" content="Cornish Property Services provides a fun way to see how much your suburb bill up annual for water and electricity. It will show on average how much you can save and how we can help you do it." />
        
        	<!-- CPS, meta tags, searchengine, submit -->   
        <meta name="author" content="Cornish Property Services" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 DAYS" />
        <meta name="copyright" content="Cornish Property Services"/>
        <meta name="web_copy_date" content="20100525"/>
        <meta name="web_content_type" content="Plumbing Services"/>
        <meta name="country" content="AUSTRALIA"/>
        <meta name="web_author" content="Long and Peter"/>
        
        <meta name="reply-to" content="info@cornishservices.com.au"/>
        <meta name="robots" content="index, follow"/>
        <meta name="resource-type" content="services"/>
    
        <meta name="classification" content="internet"/>
        <meta name="distribution" content="global"/>
        <meta name="rating" content="safe for kids"/>
        <meta name="doc-type" content="public"/>
        <meta name="Identifier-URL" content="http://www.cornishservices.com.au/"/>
        <meta name="subject" content="Cornish Property Services, plumbing services in Sydney"/>
        
        <meta name="contactName" content="Cornish Property Services"/>
        <meta name="contactOrganization" content="Cornish Property Services"/>
    
        <meta name="contactStreetAddress1" content="PO Box 192 Lindfield"/>
    
        <meta name="contactZipcode" content="2070"/>
        <meta name="contactCity" content="Sydney"/>
        <meta name="contactCountry" content="NSW"/>
        <meta name="contactPhoneNumber" content="+61 1300 1300 98"/>
        <meta name="contactNetworkAddress" content="info@cornishservices.com.au"/>
        <meta name="linkage" content="http://www.cornishservices.com.au/"/>
        
        <meta name="dc.language" content="english"/>
        <meta name="dc.source" content="http://www.cornishservices.com.au/"/>
        <meta name="dc.relation" content="www.cornishservices.com.au/"/>
        <meta name="dc.title" content="Cornish Property Services - Sydney best for plumbing, blocked drains, hot water system, electical and building services"/>
        <meta name="dc.keywords" content="plumbing, plumbers, blocked drains, hot water system, Sydney plumbing repairs, bathroom, onsite, emergency calls, 24/7 electical, building, cornish property services, cornishservices, cps,"/>
		
        <!-- CPS, meta tags, searchengine, submit --> 

        <!-- Facebook like button meta tags -->
        <meta property="og:title" content="The Cornish Effect"/>
        <meta property="og:site_name" content="Cornish Property Services | 24/7 Plumbing - Electrical - Building" />
        <meta property="og:image" content="http://www.cornishservices.com.au/images/CPSFaceBookImages.jpg" />

    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Favicon -->
        <link rel="icon" href="images/favicon.ico" type="image/ico"/>
        
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/styles.css" />

	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.roundabout-1.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">
            var nameList = [];
            var zipList = [];
            var populationList = [];
            var matchedName = [];
            var matchedPopulation = [];
            <?php
            for($count =0 ; $count < count($suburbList); $count++)
            {
                $suburb = $suburbList[$count];
                ?>
                nameList[<?php echo $count;?>] = "<?php echo $suburb['SuburbName'];?>";
                zipList[<?php echo $count;?>] = "<?php echo $suburb['ZipCode'];?>";
                populationList[<?php echo $count;?>] = "<?php echo $suburb['Population'];?>";
                <?php
            }

            ?>
	</script>

	<!--[if IE 6]>
	<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script>
	  /* EXAMPLE */
	  DD_belatedPNG.fix('.button');

	  /* string argument can be any CSS selector */
	  /* .png_bg example is unnecessary */
	  /* change it to what suits you! */
	</script>
	<![endif]-->
</head>
<body>
        <div id="fb-root"></div>
        <script>
          window.fbAsyncInit = function() {
            FB.init({appId: '107419305970604', status: true, cookie: true,
                     xfbml: true});
          };
          (function() {
            var e = document.createElement('script'); e.async = true;
            e.src = document.location.protocol +
              '//connect.facebook.net/en_US/all.js';
            document.getElementById('fb-root').appendChild(e);
          }());
        </script>
	<div id="wrapper" class="container_12 clearfix">

		<!-- Text Logo -->
		<h1 id="logo" class="grid_4" onclick="window.location='index.php'"></h1>

		<!-- Navigation Menu -->
		<ul id="navigation" class="grid_8">
			<li ><a href="contact.php" ><span class="meta">Get in touch</span><br />Contact Us</a></li>
			<li ><a href="location.php"><span class="meta">Where we serve?</span><br />Locations</a></li>
			<li><a href="specialoffer.php"><span class="meta">Who wants it most?</span><br />Special Offers</a></li>
                        <li style="margin-left: 30px;" id="aboutMenu" style="height:80px;" onmouseover="document.getElementById('subMenu').style.visibility='visible';" onmouseout="document.getElementById('subMenu').style.visibility='hidden'">
                            <a ><span class="meta">What we provide</span><br />Our Services &nbsp;<img src="images/arrowdown.gif" alt="ArrowImage" style="position: absolute; margin-top: 2px;"/></a>
                        </li>
			<li style="margin-left: 20px;"><a href="index.php" ><span class="meta">Homepage</span><br />Home</a></li>

		</ul>

                <ul id="subMenu" onmouseover="this.style.visibility='visible';" onmouseout="this.style.visibility='hidden'">
                    <li><a href="plumbing.php">Plumbing</a></li>
                    <li><a href="electrical.php">Electrical</a></li>
                    <li><a href="building.php">Building</a></li>
                    <li><a href="about.php">About us</a></li>
                </ul>
                
		<div class="hr grid_12" style="margin-top:10px;">&nbsp;</div>
		<div class="clear"></div>

                <div id="fancybox-overlay" style="background-color: rgb(102, 102, 102); opacity: 0.3; display: none; position: fixed; left: 0; right: 0; top:0; bottom: 0; z-index: 1100;"></div>
                
                <div id="alertBox" style="display: none; width: 250px; position: absolute; left: 40%; top: 180px; ">
                    <img src="images/confirmcross.png" alt="ConfirmCrossImage" style="margin: 0px; width: 121px; height: 121px; " />
                    <p id="msg" style="text-align:left;">

                    </p>


                    <input type="button" id="alertButton" class="button medium black center" value="Ok"
                           onclick="document.getElementById('alertBox').style.display='none';document.getElementById('fancybox-overlay').style.display='none';"/>

                    <input type="button" id="alertButton2" class="button medium black center" value="Ok"
                           onclick="chooseSuburb();" style="display: none;"/>
                </div>



                <div class="grid_12">
                    <table style="position: absolute; top: 50px; left: 100px;">
                        <tr>
                            <td style="color: red; font-size: 30px; text-align: right; font-family:'Lucida Grande','Lucida Sans Unicode',Tahoma,Arial,san-serif;">CPS Effect</td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td rowspan="2" style="padding-top: 5px;"><input type="text" id="zipcode" style="font-size: 30px; width: 150px;" /></td>
                        </tr>
                        <tr>
                            <td style="color: black; font-size: 12px; text-align: right;">
                                    Enter your zip code and see how <br/>Cornish
                                        will improve your life.
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: right;">
                                <input type="button" class="button float right" id="effectButton" onclick="startCPSEffect()" value="See the effect" />
                            </td>
                        </tr>
                    </table>
                    <br/><br/><br/>

                    <div id="effect">
                    <h2 class="effectInfo" style="visibility:visible; opacity: 100;">You live in...<label id="effectRow0" style="opacity: 0;"></label></h2>
                    <?php
                        for($count = 1; $count < 7; $count ++)
                        {
                            echo "<div class='effectInfo' id='effectRow".$count."' style='top: ".($count*40+180)."px;'></div>";
                        }


                    ?>
                    <div class='effectInfo' id="effectRow7"style='top: 500px;'>
                        <fb:like href='http://www.cornishservices.com.au/cornishEffect.php' width='350' action='like'></fb:like>
                        <!--fb:comments xid="1234" id="FBComm" url="http://www.cornishservices.com.au/cornishEffect.php">
                            
                        </fb:comments-->
                    </div>
                    <img src="images/goldfish.png" alt="Goldfish inside a lightbulb" style="position: absolute; left: 510px; z-index: 1; margin-top:30px; margin-left:180px;" title="The CPS effect will change the way you spend money on water and electricity"/>

                    </div>
                </div>


                <div style="position: relative; top: 570px;">
                <div class="hr grid_12 clearfix">&nbsp;</div>
		
        <!-- Footer -->
		<?php include_once 'footer.php';?>

                </div>
</div><!--end wrapper-->
</body>
</html>
