<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

    include("../mySQL_connection.inc.php");

    $conn = dbConnect();

    $sql = "SELECT COUNT(*) AS AMOUNT FROM suburb";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $amount = $row['AMOUNT'];

    mysql_close();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Cornish Property Services - To provide an efficient service plumbing, electrical and building.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Favicon -->
        <link rel="icon" href="../images/favicon.ico" type="image/ico"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/reset.css" />
	<link rel="stylesheet" href="../css/styles.css" />

	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.roundabout-1.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript">
		$(document).ready(function() { //Start up our Featured Project Carosuel
			$('#featured ul').roundabout({
				easing: 'easeOutInCirc',
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
	<div id="wrapper" class="container_12 clearfix">

		<!-- Text Logo -->
		<h1 id="logo" class="grid_4" onclick="window.location='adminhome.php'"></h1>

		<!-- Navigation Menu -->
		<ul id="navigation" class="grid_8">
                        <li><a href="work.php" ><span class="meta">Add recent work</span><br />Recent Work</a></li>
                        <li><a href="suburb.php" class="current"><span class="meta">Add Suburb to CPS Effect</span><br />Suburb</a></li>
			<li><a href="adminhome.php" ><span class="meta">Add new blog</span><br />Blog</a></li>
                        
		</ul>

		<div class="hr grid_12">&nbsp;</div>
		<div class="clear"></div>


		<!-- Caption Line -->
                <h2 class="grid_12 caption clearfix">Welcome! This is Cornish Property Services Admin Website - You can add new suburbs here.</h2>
                

                <div class="hr grid_12 clearfix">&nbsp;</div>

                <h5>Current Total Number of Suburb: <?php echo $amount;?></h5>

                <!-- Add new Blog Form -->
                <form id="comment_form" action="add_suburb.php" method="post">
                        <h3>Add new Suburbs</h3>
                        <p>Suburb String should follow the format:<br/>
                                        Suburb|ZipCode|Population<br/>
                                        Suburb|ZipCode|Population<br/>
                                        Suburb|ZipCode|Population</p>
                        <div class="hr dotted clearfix">&nbsp;</div>
                        <ul>
                            <li class="clearfix">
                                    <label for="suburbstring">Suburb String</label>
                                    <textarea id="suburbstring" name="suburbstring" rows="4" cols="60"></textarea>
                            </li>
                            <li class="clearfix">
                                    <!-- Add Button -->
                                    <a class="button medium black right" onclick="document.getElementById('comment_form').submit()">Add Suburbs</a>
                            </li> 
                        </ul>
                </form>

                <br/><br/>
                <div style="position: relative; top: 180px; left: -500px;">
                <?php
                    if(isset($_GET['message']))
                    {
                        echo $_GET['message'];
                    }
                ?>
                </div>
                <br/>
		<div class="hr grid_12 clearfix">&nbsp;</div>
		<!-- Footer -->
		<p class="grid_12 footer clearfix">
			<span class="float"><b>&copy; Copyright</b> <a href="">Cornish Property Services</a> 2010. All Rights Reserved.</span>
			<a class="float right" href="#">top</a>
		</p>

</div><!--end wrapper-->
</body>
</html>
