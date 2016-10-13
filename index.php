<?php


    include_once "mySQL_connection.inc.php";

    $conn = dbConnect();

    $sql = "SELECT * FROM blog ORDER BY Date DESC LIMIT 5";
    //        echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    while($row = mysql_fetch_array($result))
    {
         $blogList[] = $row;
    }

    for($count = 0; $count < count($blogList); $count++)
    {
        $blog = $blogList[$count];
        $sql = "SELECT COUNT(*) AS COMMENTNO FROM `comment` WHERE comment.BlogID = ".$blog['BlogID'];
        //        echo $sql.'<br/><br/>';
        $result = mysql_query($sql) or die(mysql_error());
        $row= mysql_fetch_array($result);
        
        $blogList[$count]['comment'] = $row['COMMENTNO'];

    }

    //check if the blog is the latest or oldest blog to
    //decide wherether to display the blog navigation buttons
    $hasPrevious = true;
    $hasNewer = true;

    $sql = " SELECT * FROM blog WHERE BlogID < ".$blogList[(count($blogList) -1 )]['BlogID'];
//            echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    if(mysql_num_rows($result) == 0)
    {
        $hasPrevious = false;
    }

    $sql = " SELECT * FROM blog WHERE BlogID > ".$blogList[0]['BlogID'];
//            echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());
 
    if(mysql_num_rows($result) == 0)
    {
        $hasNewer = false;
    }

    mysql_close($conn);


    $twitter_id= '142489195';

    $status = get_status($twitter_id, true);

//    var_dump($status);

    function get_status($twitter_id, $hyperlinks = true) {
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/$twitter_id.xml?count=1");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        $src = curl_exec($c);
        curl_close($c);
        preg_match('/<text>(.*)<\/text>/', $src, $m);
        $status = htmlentities($m[1]);
        if( $hyperlinks ) $status = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\">\\0</a>", $status);
        return($status);
    }




?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Cornish Property Services | 24-hours Emergency calls for Sydney Plumbing, Sydney Electricians and Sydney Properties</title>
        <meta name="keywords" content="plumbing,plumbers,blocked drains,hot water system,onsite,Emergency Calls,electical,building,domestic,commerical,industrial, 24/7,Cornish Property Services" />
        <meta name="description" content="Professional commercial, domestic and industrial plumbing, electrical and building services 24/7. " />
        
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

        <!-- Favicon -->
        <link rel="icon" href="images/favicon.ico" type="image/ico"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/styles.css" />
	
	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.roundabout-1.0.min.js"></script> 
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!--script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script-->
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.1.css" media="screen" />

        <script type="text/javascript" src="js/main.js"></script>

	<script type="text/javascript">		
		$(document).ready(function() { //Start up our Featured Project Carosuel
                       var interval;

                       $('#featured ul').roundabout({
				easing: 'easeOutInCirc',

				duration: 1000
			});

                        $('#featured ul').hover(
						function() {
							//stop the auto scroll
							clearInterval(interval);
						},
						function() {
							// continues to auto scroll
							interval = startAutoPlay();
						}
					);


                        interval = startAutoPlay();


			function startAutoPlay() {
				return setInterval(function() {
					$('#featured ul').roundabout_animateToNextChild();
				}, 8000);
			}


                        $("#jobButton").fancybox({
				'titleShow'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
//				'width'				: '75%',
//				'height'			: '75%'
                                'autoScale'			: true


			});

                        $("#bookingButton").fancybox({
				'titleShow'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                                'autoScale'			: true

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
	<div id="wrapper" class="container_12 clearfix">

		<!-- Text Logo -->
		<h1 id="logo" class="grid_4" onclick="window.location='index.php'"></h1>
		
		<!-- Navigation Menu -->
		<ul id="navigation" class="grid_8">
			<li ><a href="contact.php"><span class="meta">Get in touch</span><br />Contact Us</a></li>
			<li ><a href="location.php"><span class="meta">Where we serve?</span><br />Locations</a></li>
			<li><a href="specialoffer.php"><span class="meta">Who wants it most?</span><br />Special Offers</a></li>
                        <li style="margin-left: 30px;" id="aboutMenu" style="height:80px;" onmouseover="document.getElementById('subMenu').style.visibility='visible';" onmouseout="document.getElementById('subMenu').style.visibility='hidden'">
                            <a><span class="meta">What we provide</span><br />Our Services &nbsp;<img src="images/arrowdown.gif" alt="ArrowImage" style="position: absolute; margin-top: 2px;"/></a>
                        </li>
			<li style="margin-left: 20px;"><a href="index.php" class="current"><span class="meta">Homepage</span><br />Home</a></li>

		</ul>

                <ul id="subMenu" onmouseover="this.style.visibility='visible';" onmouseout="this.style.visibility='hidden'">
                    <li><a href="plumbing.php">Plumbing</a></li>
                    <li><a href="electrical.php">Electrical</a></li>
                    <li><a href="building.php">Building</a></li>
                    <li><a href="about.php">About us</a></li>
                </ul>

                
		<div class="hr grid_12" style="margin-top:10px;">&nbsp;</div>
		<div class="clear"></div>
		
		<!-- Featured Image Slider -->
		<div id="featured" class="clearfix grid_12">
			<ul id="featuredUL">
                            	<li id="firstBanner">
                                    <?php
                                    //Message box appear when a job or booking is successfully lodged
                                    if(isset($_GET['msg']))
                                    {
                                    ?>
                                    <div id="alertBox">
                                        <img src="images/confirmtick.png" alt="ConfirmTickImage" style="margin: 0px; width: 121px; height: 121px; " />
                                        <p>
                                        <?php echo $_GET['msg'];?>
                                        </p>


                                        <input type="button" class="button medium black center" value="Ok" 
                                               onclick="closeAlertBox()"/>
                                    </div>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>

					<!--a href="">
						<span>Learn more</span-->
						<img src="images/freequote.gif" alt="$25 free quote avaliable only for plumbers in sydney" title="Receive a free quote value at $25 when you confirm a booking with one of our plumbers" />
					
                                    <?php
                                    }
                                    ?>
				</li>

				<li>
					
						
                        <img src="images/cornishservices247.jpg" alt="At Cornish Services we are ready to fix all your problems 24 hours everyday of the week." title="24 Hours emergency calls all day everday" />
					
				</li>  

				<li>
					
						<img src="images/cornishservicesblockdrain.jpg" alt="Is your dripping tap a problem? if so, Cornish Services can help you." title="Dripping taps or blocked drains can be fixed by us" />
					
				</li>  

				<li>


						<img src="images/cornishservicerecentclients.gif" alt="Recent clients include McDonalds, 3M, stockland, R&amp;W, Spotless, Northy Ryde RSL Club, Taylor Nicholas, Randwick City Council, Warringah Council and Rockdale City Council" title="Recent clients include McDonalds, 3M, stockland, R&amp;W, Spotless, Northy Ryde RSL Club, Taylor Nicholas, Randwick City Council, Warringah Council and Rockdale City Council" />
					
				</li>  
				<li>
					<a href="cornishEffect.php">
						<span>Learn more</span>
						<img src="images/cpseffectbanner.jpg" alt="Use the CPS Effect to see how Cornish can improve your life." title="Know how much your suburb is spending on electricity and water and how much you can save more than your neighbours" />
					</a>
				</li>
                            	<li>
					<a href="about.php">
						<span>Learn more</span>
						<img src="images/cornishservices108years.jpg" alt="We have over 108 years of experience in the field of plumbing, electrical and building." title="Since 1902 we have been in operation for 108 years and changing with technology" />
					</a>
				</li>
			</ul> 
		</div>

                <!--img alt="leftArrow" src="images/arrow2.png" style="position:absolute; left: 180px; top: 425px;"/>
                <img alt="RightArrow" src="images/arrow1.png" style="position:absolute; left: 1045px; top: 425px;"/-->
		<div class="hr grid_12 clearfix">&nbsp;</div>
			
		<!-- Caption Line -->
                <h2 class="grid_12 caption clearfix">Welcome! This is Cornish Property Services - professional plumbing, electrical and building services 24/7. Call us on <span style="color:red;">1300 1300 98</span> and speak to our friendly staffs.</h2>

                <div class="hr grid_12 clearfix">&nbsp;</div>

                <div class="infoBox">
                    <!img src="images/chat.png" alt="ChatImage" style="margin-left: 180px; margin-top: -40px;"/>
                    <img src="images/whychoosecornish.png"  title="Why Choose Cornish Services"alt="Why Choose Cornish Property Services" style="position: relative; left: 385px; top: 2px;"/>
                    <div style="margin-top: -82px;">
                        <label style="color: #0069b6; font-weight: bold; font-size: 16px;">Why choose Cornish Property Services?</label>
                        <br/><br/>
                        <ul class="infoList">
                            <li>Contact licensed plumbers and technicians 24/7.</li>
                            <li>Guaranteed fixed right the first time.</li>
                            <li>24 hours 7 days Emergency Calls.</li>
                            <li>No jobs too big or too small, prices start from as low as $25!</li>
                            <li>Follow-up call to make sure your expectations were met.</li>
                        </ul>
                    </div>
                </div>

                <div class="infoBox">
                    <!img src="images/star.png" alt="StarImage" style="margin-left: 180px; margin-top: -30px; margin-bottom: 24px;"/>
                    <img src="images/light.png"  title="Our excellent services  "alt="Our excellent services Image" style="position: relative; left: 382px; top: 0px;"/>
                    <div style="margin-top: -87px;">
                        <label style="color: #0069b6; font-weight: bold; font-size: 16px;">Our excellent services</label>
                        <br/><br/>
                        <ul class="infoList">
                            <li>We provide all kind of services about plumbing, especially<br/> problems with blocked drains and hot water system.<a title="Read more about our plumbing services" href="plumbing.php" style="color: red;">  More detail...</a></li>
                            <li>Our <a title="Read more about our electrical services" href="electrical.php" style="color: red;">Electrical</a> and <a title="Read more about our building services" href="building.php" style="color: red;">Building services</a> is unmatched in both price and quality. We charge by the job, not by the hour!</li>
                            <li>Our company covers all types of onsite domestic, commercial and industrial jobs in Sydney.</li>
                        </ul>
                    </div>
                </div>


                
                <div class="hr grid_12 clearfix quicknavhr">&nbsp;</div>
		<div id="quicknav" class="grid_12">
			<a class="quicknavgrid_3 quicknav alpha" href="recent_work.php" title="Gallery images of recent completed plumbing,electrical and building work">
					<h4 class="title ">Recent Work</h4>

					<p>View our gallery of recently completed works. </p>
			<p style="text-align:center;"><img  title="Photo camera of gallery"alt="Photo Camera" src="images/gallery.png" /></p>
				
		  </a>
			<a id="bookingButton" class="quicknavgrid_3 quicknav" href="#bookingBox" title="New and improved online booking system for plumbers">
					<h4 class="title ">Online Booking</h4>
					<p>Our new and improved online booking system will save you time. </p>
			<p style="text-align:center;"><img alt="Online booking form computer" src="images/onlinebooking.png" title="Online booking form to save you time" /></p>
				
		  </a>
                        <a id="jobButton" class="quicknavgrid_3 quicknav" href="#employeeBox" title="Job opportunities open for any talented plumber, electrician and builder">
                        <h4 class="title">Job Opportunities</h4>
                        <p>Are you a talented trademan? We need you. </p>
			<p style="text-align:center;"><img alt="Job form" src="images/job.png" title="Job form for trademen looking for work" /></p>
                </a>
			<a class="quicknavgrid_3 quicknav" href="cornishEffect.php" title="Follow us on Facebook for updates on promotion and news">
					<h4 class="title ">CPS Effect</h4>
					<p>What can Cornish do for you?<br/> Try our CPS Effect. </p>
					<p style="text-align:center;"><img alt="Cornish Property Services Effect" src="images/cpseffectchart.png" title="The CPS Effect." /></p>
				
		  </a>

		</div>

                <div style="display: none;">
                    <div id="employeeBox" style="width: 670px; height: 445px; overflow:hidden;">
                        <form id="job_form" class ="form_1" action="submit_job.php" method="post">
                            <input type="hidden" name="submitJob" value="true"/>
                            <h3>Employee Form</h3>
                            <div class="hr dotted clearfix">&nbsp;</div>
                            <ul>
                                    <li class="clearfix">
                                            <label for="job_name">Your Name</label>
                                            <input id="job_name" name="job_name" type="text" />
                                    </li>
                                    <li class="clearfix">
                                            <label for="job_contact">Contact Number</label>
                                            <input id="job_contact" name="job_contact" type="text" />
                                    </li>
                                    <li class="clearfix">
                                            <label for="email">Email (optional)</label>
                                            <input id="email" name="email" type="text" />
                                    </li>
                                    <li class="clearfix">
                                            <label for="skill">Tell us in 500 words about your skills set</label>
                                            <textarea id="skill" name="skill" rows="3" cols="40"></textarea>
                                    </li>
                                    <li class="clearfix">

                                            <!-- Add Comment Button -->
                                            <a type="button" class="button medium black right" onclick="submitJob()">Submit</a>
                                    </li>
                            </ul>
                        </form>
                        <div id="job_msgBox" class="formMsgBox"></div>
                    </div>

                    <div id="bookingBox" style="width: 640px; height: 405px; overflow:hidden;">
                        <form id="booking_form" class="form_1" action="submit_booking.php" method="post">
                            <input type="hidden" name="submitBooking" value="true"/>
                            <h3>Booking Form</h3>
                            <div class="hr dotted clearfix">&nbsp;</div>
                            <ul>
                                    <li class="clearfix">
                                            <label for="booking_name">Your Name</label>
                                            <input id="booking_name" name="booking_name" type="text" />
                                    </li>
                                    <li class="clearfix">
                                            <label for="booking_contact">Contact Number</label>
                                            <input id="booking_contact" name="booking_contact" type="text" />
                                    </li>
                                    <li class="clearfix">
                                            <label for="case">Case detail (optional)</label>
                                            <textarea id="case" name="case" rows="3" cols="40"></textarea>
                                    </li>
                                    <li class="clearfix">

                                            <!-- Add Comment Button -->
                                            <a type="button" class="button medium black right" onclick="submitBooking()">Submit</a>
                                    </li>
                            </ul>
                        </form>
                        <div id="booking_msgBox" class="formMsgBox"></div>
                    </div>

                </div>

                <div id="alertBox" style="display: none;"></div>


		<div class="hr grid_12 clearfix">&nbsp;</div>
                
                <div id="blog">
                    <!-- Blog Post -->
                    <div id="blogBox" class="grid_8" style="width: 450px;">
                        <?php
                        if(count($blogList) > 0 )
                        {
                            for($count = 0; $count < 3; $count ++)
                            {
                                $blog = $blogList[$count];
                        ?>
                                <div class="post">
                                        <!-- Post Title -->
                                        <h3 class="title" style="font-size: 16px;">
                                            <a href="single.php?blogID=<?php echo $blog['BlogID'];?>"><?php echo $blog['Title'];?></a>
                                        </h3>
                                        <!-- Post Data -->
                                        <p class="sub">&bull; <?php echo date('jS M Y',strtotime($blog['Date']));?> &bull; <a href="single.php#comment?blogID=<?php echo $blog['BlogID'];?>"><?php echo $blog['comment'];?> Comment</a></p>
                                        <div class="hr dotted clearfix">&nbsp;</div>
                                        <!-- Post Image -->
                                        <!-- Post Content -->
                                        <p>
                                            <?php
                                                $content = str_replace("\n", "<br/>", $blog['Desc']);
                                                if(strlen($content) > 240)
                                                {
                                                    echo substr($content, 0, 237)."...";
                                                }
                                                else
                                                {
                                                    echo str_replace("\n", "<br/>", $content);
                                                }

                                            ?>
                                        </p>

                                        <!-- Read More Button -->
                                        <p class="clearfix"><a href="single.php?blogID=<?php echo $blog['BlogID'];?>" class="button right"> Read More...</a></p>
                                </div>

                        <?php
                            }
                        }
                        ?>                           

                        <!-- Blog Navigation -->
                        <p class="clearfix">
        <?php
        if($hasPrevious)
        {
        ?>
            <a class="button float" onclick="changeBlog(<?php echo $blogList[2]['BlogID'];?>, 'previous')">&lt;&lt; Previous Posts</a>
        <?php
        }

        if($hasNewer)
        {
        ?>
            <a class="button float right" onclick="changeBlog(<?php echo $blogList[0]['BlogID'];?>, 'new')">Newer Posts >></a>
        <?php
        }
        ?>
                        </p>
                    </div>

                    <!-- Column 2 / Sidebar -->
                    <div class="grid_4" style="width: 200px; margin-left: 5px; margin-right: 5px;">

                            <h4>Latest News</h4>
                            <ul class="sidebar" >
                                <?php
                                foreach($blogList as $blog)
                                {
                                    echo "<li><a href='single.php?blogID=".$blog['BlogID']."'>".$blog['Title']."</a></li>";

                                }

                                ?>

                            </ul>

                            <!--h4>Archives</h4>
                            <ul class="sidebar">
                                    <li><a href="">May 2010</a></li>
                                    <li><a href="">April 2010</a></li>
                                    <li><a href="">March 2010</a></li>

                            </ul-->
                    </div>
                </div>
                <img alt="Twitter Bird" src="images/twitter.png" style="margin-left:50px; cursor: pointer;" onclick="window.location='http://twitter.com/cornishservices'" title="Follow us on twitter and keep up to date with news and promotions"/>
                <img alt="Facebook Icon" src="images/facebook.png" style="margin-left:10px; cursor: pointer;" onclick="window.location='http://www.facebook.com/pages/Lindfield-Australia/Cornish-Property-Services/104206049626263'" title="Follow us on facebook and keep up to date with news and promotions"/>
                <div id="quicknav" class="grid_12" style="width:245px;">

                
                
                <script src="http://widgets.twimg.com/j/2/widget.js"></script>
                <script>
                new TWTR.Widget({
                  version: 2,
                  type: 'profile',
                  rpp: 4,
                  interval: 6000,
                  width: 'auto',
                  height: 400,
                  theme: {
                    shell: {
                      background: '#00366b',
                      color: '#ffffff'
                    },
                    tweets: {
                      background: '#efefef',
                      color: '#494949',
                      links: '#0abfbf'
                    }
                  },
                  features: {
                    scrollbar: false,
                    loop: false,
                    live: false,
                    hashtags: true,
                    timestamp: true,
                    avatars: true,
                    behavior: 'all'
                  }
                }).render().setUser('cornishservices').start();
                </script>
                
                
                <!-- Method of Payments -->
			<br /><br />
            <h4>Method of Payments</h4> 
			<div class="hr dotted clearfix">&nbsp;</div>
			<a href="http://www.visa-asia.com/ap/au/index.shtml" title="We accept all type of Visa cards"><img alt="visa" src="images/visa.gif" title="We accept all type of Visa cards" /></a>
			
            <a href="http://www.mastercard.com/au/gateway.html" title="Mastercard is a very popular choice by many customers"><img alt="mastercard" src="images/mastercard.gif" title="Mastercard is a very popular choice by many customers." ></a>
<a href="https://home.americanexpress.com/home/au/home_p.shtml?page=pr" title="We also accept Amex or American Express"><img alt="American Express" src="images/amex.gif" title="We also accept Amex or American Express" /></a>
<a href="http://www.http://www.stgeorge.com.au/" title="EFT and Bank Deposit is also a popular choice"><img alt="bank deposit" src="images/bank.gif" title="EFT and Bank Deposit is also a popular choice." /></a>
			</li> 
			</ul> 
                  </div>
		<div class="hr grid_12 clearfix">&nbsp;</div>
		
        <!-- Footer -->
       		<?php include_once 'footer.php';?>
		
</div><!--end wrapper-->
</body>
</html>
