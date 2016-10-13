<?php
    if(isset($_GET['workID']))
    {
        include_once "mySQL_connection.inc.php";
        include_once 'objects/Work.php';

        $work = new Work("","","", "","");
        $work->load($_GET['workID']);


    }
    else
    {
        header("Location: errorPage.php");
    }


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/">
<head>
	<title>Cornish Property Services | <?php echo $work->title;?></title>
        <meta name="keywords" content="plumbing,plumbers,bathroom,electical,lighting,landscaping,building,maintenance services,qualified,Cornish" />
        <meta name="description" content="View Our recent work gallery, home to our latest, and greatest works in Plumbing, Electrical and Building." />

        	<!-- CPS, meta tags, searchengine, submit -->
        <meta name="author" content="Cornish Property Services" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 DAYS" />
        <meta name="copyright" content="Cornish Property Services" />
        <meta name="web_copy_date" content="20100525" />
        <meta name="web_content_type" content="Plumbing Services" />
        <meta name="country" content="AUSTRALIA" />
        <meta name="web_author" content="Long and Peter" />

        <meta name="reply-to" content="info@cornishservices.com.au" />
        <meta name="robots" content="index, follow" />
        <meta name="resource-type" content="services" />

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

        <!-- Facebook like button meta tags -->
        <meta property="og:title" content="Recent Work - <?php echo $work->title;?>"/>
        <meta property="og:site_name" content="Cornish Property Services | 24/7 Plumbing - Electrical - Building" />
        <meta property="og:image" content="http://www.cornishservices.com.au/uploadImages/<?php echo $work->pictureList[0]; ?>" />


        <!-- Favicon -->
        <link rel="icon" href="images/favicon.ico" type="image/ico"/>
        
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/styles.css" />
	
	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.roundabout-1.0.min.js"></script> 
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.roundabout-shapes-1.1.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">
		$(document).ready(function() { //Start up our Project Preview Carosuel
			$('ul#folio_scroller').roundabout({
				easing: 'easeOutInCirc',
				shape: 'waterWheel',
				duration: 600
			});
		});
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
			<li ><a href="contact.php"><span class="meta">Get in touch</span><br />Contact Us</a></li>
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
			
		<!-- Catch Line and Link -->
			<h2 class="grid_12 caption clearfix">Our <span>portfolio</span>, home to our latest, and greatest work.</h2>
		
		<div class="hr grid_12 clearfix">&nbsp;</div>
		
		<!-- Column 1 / Project Information -->
		<div class="grid_4">
		<!--a class="meta" href="#">www.siteurlgoeshere.com</a-->
		<h4 class="title"><?php echo $work->title; ?></h4>


		<div class="hr dotted clearfix">&nbsp;</div>
                    <p><?php echo $work->content;?></p>

			<p class="clearfix">
                            <fb:like href="http://www.cornishservices.com.au/work_single.php?workID=<?php echo $_GET['workID'];?>" width="350" action="like"></fb:like>
			</p>
                        <p class="clearfix">

                            <a href="recent_work.php" class="button float">&lt;&lt; Back to Gallery</a>
                        </p>
		</div>
		
		<!-- Column 2 / Image Carosuel -->
		<div id="folio_scroller_container" class="grid_8 cleafix">
			<ul id="folio_scroller">
                            <?php
                                $checkNo= 0;
                                for($count=0; $count < count($work->pictureList); $count++)
                                {
                                   echo "<li><span>".$work->picdescList[$count]."</span><img alt='' src='uploadImages/".$work->pictureList[$count]."' /></a></li> ";
                                   $checkNo = $count;
                                }

                                if($checkNo < 4)
                                {
                                    echo "<li><span>Blank Picture Slot</span><a href='#'><img alt='' src='images/600x300.gif' /></a></li>";
                                }
					

                            ?>
			</ul> 
		</div>
		
		<div class="hr grid_12 clearfix">&nbsp;</div>
		
		<!-- Client pickup line -->
		<h2 class="grid_12 caption">Like this project? We can do something similar for you. <a href="contact.php"><span>Get in touch...</span></a></h2>
		
		<div class="hr grid_12 clearfix">&nbsp;</div>
		
		<!-- Footer -->
		<?php include_once 'footer.php';?>

		
	</div><!--end wrapper-->

</body>
</html>
