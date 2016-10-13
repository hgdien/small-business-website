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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Cornish Property Services | Search areas where we provide plumbing, electrical and building services | Location</title>
        <meta name="keywords" content="plumbing,plumbers,blocked drains,hot water system,onsite,Emergency Calls,electical,building,domestic,commerical,industrial, 24/7,Cornish Property Services" />
        <meta name="description" content="Professional commercial, domestic and industrial plumbing, electrical and building services 24/7. " />
        
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Favicon -->
        <link rel="icon" href="images/favicon.ico" type="image/ico"/>
        
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/styles.css" />
	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAA2HiTA_bxP3H35tG5VEZHUBQYMZ-9ENnL0uMsa24o8H64rS4teRS2Jrmi5CMT6csEZNBjnVFJuoXYVw"></script>


        <script type="text/javascript">
            google.load("jquery", '1.3');
            google.load("maps", "2.x");
        </script>
		<script type="text/javascript" charset="utf-8">
                    var markers = [];
                    var addresses = [];
                    var currentMap;

			$(document).ready(function(){
				var map = new GMap2(document.getElementById('map'));
                                currentMap = map;
				var GordonMN = new GLatLng(-33.75268,151.145267);
				map.setCenter(GordonMN, 10);

                                map.addControl(new GSmallMapControl());
                                map.addControl(new GMapTypeControl());

                                // Create our "CPS" marker icon
                                var CPS_icon = new GIcon(G_DEFAULT_ICON);
                                CPS_icon.image = "images/cpspointer.png";

                                // Set up our GMarkerOptions object
                                markerOptions = { icon:CPS_icon };

                                  <?php

                                  for($count = 0; $count < count($suburbList); $count++)
                                  {
                                        $suburb = $suburbList[$count];
                                         ?>
                                         addresses[<?php echo $count;?>] = "<?php echo $suburb['SuburbName'];?>";
                                         var point = new GLatLng(<?php echo $suburb['Latitude'];?>, <?php echo $suburb['Longitude'];?>);
                                         var marker = new GMarker(point,markerOptions);
                                         map.addOverlay(marker);
                                         markers[<?php echo $count;?>] = marker;
                                 <?php
                                  }

                        ?>
                                


			});
                        
                    function goToMarker(x, name)
                    {
                        var marker = markers[x];
                        currentMap.panTo(marker.getLatLng());
                        marker.openInfoWindowHtml(name +"<br/>Cornish Property Services<br/>Plumbing - Electrical - Building");
                    }

                    function checkArea()
                    {

                        var area = document.getElementById("area").value;
                        if(area != "")
                        {

                            var match = false;
                            for(var i=0; i < addresses.length; i ++)
                            {
                                var str= addresses[i].toString().toLowerCase();
                                if(area.toLowerCase() == str || (str.indexOf(area.toLowerCase()) != -1))
                                {
                                    document.getElementById('message').innerHTML = "You are livng in a Cornish Servicing Area";
                                    goToMarker(i, area);
                                    match = true;
                                    break;
                                }
                            }

                            if(!match)
                            {
                                document.getElementById('message').innerHTML = "Sorry, the suburb you entered is not a Cornish Servicing area.";
                            }
                        }
                    }

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

	<div id="wrapper" class="container_12 clearfix">		
		
		<!-- Text Logo -->
		<h1 id="logo" class="grid_4"  onclick="window.location='index.php'"></h1>
		
		<!-- Navigation Menu -->
		<ul id="navigation" class="grid_8">
			<li ><a href="contact.php"><span class="meta">Get in touch</span><br />Contact Us</a></li>
			<li ><a href="location.php" class="current"><span class="meta">Where we serve?</span><br />Locations</a></li>
			<li><a href="specialoffer.php"  ><span class="meta">Who wants it most?</span><br />Special Offers</a></li>
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
			
		<!-- Caption Line -->
		<h2 class="grid_12 caption clearfix">Our <span>Servicing Areas</span>, where we are dedicated to respond to your needs.</h2>
		
		<div class="hr grid_12 clearfix">&nbsp;</div>


                <div class="grid_12">
                    <h6>Check if our services is avaliable in your area: </h6>
                    <p style="line-height:-10px">Type your suburb name in the search field.</p>
                    <input type="text" id="area" onkeydown="if (event.keyCode == 13) checkArea();"/>&nbsp;&nbsp;<button class="button" onclick="checkArea();">Check Area</button>
                    <div id="message" style=" width: 500px; height: 30px;  font-size: 14px; color: red; position: relative; top: -22px; left: 280px;"></div>
                    <br/>

                    <div id="map"></div>
                    <br/><br/><br/>
                    <h6>A-Z List of Suburbs we are servicing:</h6>
                    <ul id="list"></ul>
                    <?php
                        $column_no = count($suburbList)/100;

                        for($count = 0; $count < $column_no; $count ++)
                        {
                            echo "<ul class='suburbList'>";
                            for($x = ($count*100); $x < count($suburbList); $x++)
                            {
                                if($x == (($count+1)* 100))
                                {
                                    break;
                                }
                                $suburb = $suburbList[$x];
                                ?>
                                <li id='suburbPoint' value="<?php echo $x;?>" onclick="goToMarker(<?php echo $x;?>, '<?php echo $suburb['SuburbName'];?>')"><a title="Electricians, Builders and Plumbers <?php echo $suburb['SuburbName'];?>"  href='#area'><?php echo $suburb['SuburbName'];?></a></li>
                                <?php
                            }
                            echo "</ul>";
                        }

                    ?>
                    </div>
         		
               <div class="hr grid_12 clearfix">&nbsp;</div>
					<h2 class="grid_12 caption clearfix">Cornish Property Services have qualified plumbers, electricians and builders located all over Sydney and NSW. This gives us the ability to return your urgent emergency calls 24 hours 7 days a week. Currently we have 10 Sydney plumbers, 4 trained electricians and 6 experienced builders on board. If you have located that we service in your area, why not give us a call on <span style="color:red;">1300 1300 98</span> to arrange a free quote*.</h2><br  />
               <div class="grid_12">
                    <p>*conditions apply</p>
                    </div>

        			<div class="hr grid_12 clearfix">&nbsp;</div>

		<!-- Footer -->
		<?php include_once 'footer.php';?>
		
	</div><!--end wrapper-->

</body>
</html>
