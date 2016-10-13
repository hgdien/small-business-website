<?php

    include_once "mySQL_connection.inc.php";

    $conn = dbConnect();

    $sql = "SELECT * FROM recent_work, work_picture WHERE
                                        recent_work.WorkID = work_picture.WorkID
                                        GROUP BY recent_work.WorkID
                                        ORDER BY Date DESC";
    //        echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    while($row = mysql_fetch_array($result))
    {
        if($row['Type'] == "Plumbing")
        {
            $plumbingList[] = $row;
        }
        else if($row['Type'] == "Electrical")
        {
            $electricalList[] = $row;
        }
        else
        {
            $buildingList[] = $row;
        }

    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Cornish Property Services | Home to our latest, and greatest works | RECENT WORK GALLERY</title>
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
        <!-- Favicon -->
        <link rel="icon" href="images/favicon.ico" type="image/ico"/>
        
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/styles.css" />
	
	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
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

<body class="portfolio">

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
			<h2 class="grid_12 caption clearfix">Our <span>recent work gallery</span>, home to our latest, and greatest works.</h2>
		
		<div class="pr grid_12 clearfix">&nbsp;</div>
		
		<!-- Portfolio Items -->
		
		<!-- Section 1 -->
		
		<!-- Section 3 -->
		<div class="catagory_1 clearfix">
			<!-- Row 1 -->
			<div class="grid_3 textright" >
				<span class="meta">Create the ultimate functional bathroom</span>
				<h4 class="title ">Plumbing</h4>
				<div class="hr clearfix dotted">&nbsp;</div>
				<p>Looking for inspiration for your bathroom or kitchen? Cornish has a wide selection of value-for-money, functional products plus tips on how to make them work together in your home. Our plumbers are highly trained with over a 108 years experience and have worked for clients in London, America, China, Japan and Australia.</p>
			</div>
			<div class="grid_9">
                            <?php
                                if(count($plumbingList) > 0)
                                {
                                    $picPos = "portfolio_item float alpha";
                                    foreach($plumbingList as $project)
                                    {

                                        ?>
                                        <a class="<?php echo $picPos;?>" href="work_single.php?workID=<?php echo $project['WorkID'];?>">
                                                <span><?php echo $project['Title'];?></span>
                                                <img class="" src="uploadImages/<?php echo $project['Link'];?>" alt="Project Picture"/>
                                        </a>

                                        <?php

                                        if($picPos == "portfolio_item float alpha")
                                        {
                                           $picPos = "portfolio_item float";
                                        }
                                        else if($picPos == "portfolio_item float" )
                                        {
                                            $picPos = "portfolio_item float omega";
                                        }
                                        else if($picPos == "portfolio_item float omega")
                                        {
                                            $picPos = "portfolio_item float alpha";
                                        }
                                    }
                                }
                                else
                                {
                                    echo "There is no recent work available.";
                                }
                             ?>

			</div>
		</div>
			
		<div class="pr clearfix grid_12">&nbsp;</div>
		
		<div class="catagory_1 clearfix">
			<!-- Row 1 -->
			<div class="grid_3 textright" >
				<span class="meta">Lighting up your life!</span>
				<h4 class="title ">Electrical</h4>
				<div class="hr clearfix dotted">&nbsp;</div>
				<p>Not loving your lighting? Is your house appearing dual and boring? Do you want to whoa your friends the next time they visit? At Cornish, we provide a wide range of modern solutions that will help almost every room of your home to shine. Our electricians have worked for clients in China, USA and Australia.</p>
			</div>
			<div class="grid_9">
                            <?php
                                if(count($electricalList) > 0)
                                {
                                    $picPos = "portfolio_item float alpha";
                                    foreach($electricalList as $project)
                                    {

                                        ?>
                                        <a class="<?php echo $picPos;?>" href="work_single.php?workID=<?php echo $project['WorkID'];?>">
                                                <span><?php echo $project['Title'];?></span>
                                                <img class="" src="uploadImages/<?php echo $project['Link'];?>" alt="Project Picture"/>
                                        </a>

                                        <?php

                                        if($picPos == "portfolio_item float alpha")
                                        {
                                           $picPos = "portfolio_item float";
                                        }
                                        else if($picPos == "portfolio_item float" )
                                        {
                                            $picPos = "portfolio_item float omega";
                                        }
                                        else if($picPos == "portfolio_item float omega")
                                        {
                                            $picPos = "portfolio_item float alpha";
                                        }
                                    }
                                }
                                else
                                {
                                    echo "There is no recent work available.";
                                }
                             ?>
			<div class="clear"></div>
			</div>
		</div>
		<div class="pr clearfix grid_12">&nbsp;</div>
		
		<div class="catagory_1 clearfix">
			<!-- Row 1 -->
			<div class="grid_3 textright" >
				<span class="meta">Plan your home solution!</span>
				<h4 class="title ">Building</h4>
				<div class="hr clearfix dotted">&nbsp;</div>
				<p>Need assistance getting your home looking better than your neighbours? At Cornish we provide a selection of landscaping and home maintenance services that you will find all new and exciting. We aim to create a living environment that will turn heads for you. Our qualified builders have completed jobs in England, Korea, China and Australia.</p>
			</div>
			<div class="grid_9">
                            <?php
                                if(count($buildingList) > 0)
                                {
                                    $picPos = "portfolio_item float alpha";
                                    foreach($buildingList as $project)
                                    {

                                        ?>
                                        <a class="<?php echo $picPos;?>" href="work_single.php?workID=<?php echo $project['WorkID'];?>">
                                                <span><?php echo $project['Title'];?></span>
                                                <img class="" src="uploadImages/<?php echo $project['Link'];?>" alt="Project Picture"/>
                                        </a>

                                        <?php

                                        if($picPos == "portfolio_item float alpha")
                                        {
                                           $picPos = "portfolio_item float";
                                        }
                                        else if($picPos == "portfolio_item float" )
                                        {
                                            $picPos = "portfolio_item float omega";
                                        }
                                        else
                                        {
                                            $picPos = "portfolio_item float alpha";
                                        }
                                    }
                                }
                                else
                                {
                                    echo "There is no recent work available.";
                                }
                                
                             ?>
			<div class="clear"></div>
			</div>
		</div>
			
		<div class="hr grid_12 clearfix">&nbsp;</div>
		
		<!-- Footer -->
		<?php include_once 'footer.php';?>

    <!--end wrapper-->
        </div>
</body>
</html>
