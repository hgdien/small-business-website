<?php


    include_once "../mySQL_connection.inc.php";

    $conn = dbConnect();

    $sql = "SELECT * FROM blog ORDER BY Date DESC LIMIT 7";
    //        echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    while($row = mysql_fetch_array($result))
    {
         $blogList[] = $row;
    }
    mysql_close($conn);
    if(isset($_GET['blogID']))
    {
        include_once '../objects/Blog.php';

        $blog = new Blog("","","");
        $blog->load($_GET['blogID']);

    }



    
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                        <li><a href="suburb.php" ><span class="meta">Add Suburb to CPS Effect</span><br />Suburb</a></li>
			<li><a href="adminhome.php" class="current"><span class="meta">Add new blog</span><br />Blog</a></li>
                        
		</ul>

		<div class="hr grid_12">&nbsp;</div>
		<div class="clear"></div>


		<!-- Caption Line -->
                <h2 class="grid_12 caption clearfix">Welcome! This is Cornish Property Services Admin Website - You can manage new blogs here.</h2>

                <div class="hr grid_12 clearfix">&nbsp;</div>

                <!-- Add new Blog Form -->
                <form id="comment_form" enctype="multipart/form-data" action="add_blog.php" method="post">
                    <input type="hidden" name="submitBlog" value="true" />
                    <input type="hidden" name="blogID" value="<?php if(isset($_GET['blogID'])) {echo $_GET['blogID'];}?>" />
                        <h3 style="float: left;"><?php if(isset($_GET['blogID'])) {echo "Edit blog";} else {echo "Add a new blog";}?> </h3>
                        <h3 style="float: right;">Latest blogs</h3>
                        <div class="hr dotted clearfix">&nbsp;</div>
                        <ul>
                            <li class="clearfix"> 
                                    <label for="title">Blog Title</label>
                                    <input id="title" name="title" type="text" value="<?php if(isset($_GET['blogID'])) {echo $blog->title;}?>"/>
                            </li>
                            <li class="clearfix">
                                    <label for="picture">Blog Picture</label>
                                    <?php
                                    if(isset($_GET['blogID']))
                                    {
                                        ?>
                                        <input type="text" name="oldLink" readonly value="<?php echo $blog->picture;?>" size="10" style="width: 200px;"/>
                                        <input id="picture" name="picture" type="file" size="25" style="font-size: 16px; margin-top:4px; width: 50px;" />
                                        <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <input id="picture" name="picture" type="file" size="43" style="font-size: 16px; margin-top:4px;" />
                                    <?php
                                    }
                                    ?>
                            </li>
                            <li class="clearfix"> 
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" rows="10" cols="60"><?php if(isset($_GET['blogID'])) {echo $blog->content;}?></textarea>
                            </li> 
                            <li class="clearfix">
                                    <!-- Add Comment Button -->
                                    <a type="submit" class="button medium black right" onclick="document.getElementById('comment_form').submit()"><?php if(isset($_GET['blogID'])) {echo "Update blog";} else {echo "Add blog";}?></a>
                            </li> 
                        </ul>
                        <?php
                        if(isset($_GET['warning']))
                        {
                            
                        ?>
                        <div style="width: 250px; height: 50px; position: relative; top: 10px; left: 20px;">
                            <?php echo $_GET['warning'];?>
                        </div>
                        <?php
                        }
                        ?>
                </form>

                <!--Latest blog list -->
                <div id="blogList">
                    <ul style="list-style:none;">
                        <?php
                            if(count($blogList) >0)
                            {
                                foreach($blogList as $blog)
                                {
                                    echo "<li style='border-bottom: 1px solid #c4c4c4; margin-left: 0px;'>";
                                    echo $blog['Title']."<br/>";
                                    echo "posed on ".date('d-m-Y H:i:s', strtotime($blog['Date']))."  <a href='../single.php?blogID=".$blog['BlogID']."'>View</a>"."  <a href='adminhome.php?blogID=".$blog['BlogID']."'>Edit</a>"."  <a href='delete_blog.php?blogID=".$blog['BlogID']."''>Delete</a>";
                                    echo "</li>";
                                }
                            }
                            else
                            {
                                echo "There are no blog at the moment.";
                            }

                        ?>
                    </ul>

                </div>


		<div class="hr grid_12 clearfix">&nbsp;</div>
		<!-- Footer -->
		<p class="grid_12 footer clearfix">
			<span class="float"><b>&copy; Copyright</b> <a href="">Cornish Property Services</a> 2010. All Rights Reserved.</span>
			<a class="float right" href="#">top</a>
		</p>

</div><!--end wrapper-->
</body>
</html>
