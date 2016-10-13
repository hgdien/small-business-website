<?php

    if(isset($_GET['blogID']))
    {
        include_once "mySQL_connection.inc.php";
        include_once 'objects/Blog.php';

        $blog = new Blog("","","");
        $blog->load($_GET['blogID']);

        
        $conn = dbConnect();
        $sql = "SELECT * FROM blog ORDER BY Date DESC LIMIT 5";
    //        echo $sql.'<br/><br/>';
        $result = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_array($result))
        {
             $blogList[] = $row;
        }
        mysql_close($conn);
    }
    else
    {
        header("Location: errorPage.php");
    }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/">
<head>
	<title>Cornish Property Services | <?php echo $blog->title;?></title>
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

        <!-- Facebook like button meta tags -->
        <meta property="og:title" content="Cornish Blog - <?php echo $blog->title;?>"/>
        <meta property="og:site_name" content="Cornish Property Services | 24/7 Plumbing - Electrical - Building" />
        <meta property="og:image" content="http://www.cornishservices.com.au/<?php if($blog->picture != "") {echo "uploadImages/".$blog->picture;} else {echo "images/cornisnlogo.jpg";} ?>" />
        
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
			
		<!-- Caption Line -->
		<h2 class="grid_12 caption clearfix">Our <span>blog</span>, keeping you up-to-date on our latest news.</h2>
		
		<div class="hr grid_12 clearfix">&nbsp;</div>
		
		<!-- Column 1 /Content -->
		<div class="grid_8">
			
			<!-- Blog Post -->
			<div class="post">
				<!-- Post Title -->
				<h3 class="title"><a href="single.php?blogID=<?php echo $blog->ID;?>"><?php echo $blog->title; ?></a></h3>
				<!-- Post Title -->
				<p class="sub">&bull; <?php echo date('jS M Y',strtotime($blog->date));?> &bull; <a href="single.php#comment?blogID=<?php echo $blog->ID;?>"><?php echo $blog->commentNo;?> Comment</a></p>
				<div class="hr dotted clearfix">&nbsp;</div>
				<!-- Post Title -->
                                <?php
                                if($blog->picture != "")
                                {
                                    echo "<img class='thumb' src='uploadImages/".$blog->picture."' alt='Blog Picture' />";
                                }
				?>
				<!-- Post Content -->
				<p>
                                    <?php echo str_replace("\n", "<br/>", $blog->content);?>
                                </p>

			</div>
                        <br/>
                        <fb:like href="http://www.cornishservices.com.au/single.php?blogID=<?php echo $_GET['blogID'];?>" width="350" action="like"></fb:like>
                        <br/><br/>
			<div class="hr clearfix">&nbsp;</div>
			
			<!-- Comment's List -->
			<h3>Comments</h3>
			<div class="hr dotted clearfix">&nbsp;</div>
			
			<ol class="commentlist">
				<li class="comment"> 

				<div class="comment_content">
                                    <?php
           
                                    if($blog->commentNo > 0)
                                    {
                                        $commentList = $blog->commentList;
//                                        var_dump($commentList);
                                        foreach($commentList as $comment)
                                        {
                                    ?>
                                        <div class="gravatar">
                                            <img alt="" src='images/gravatar.png' height='48' width='48' />
                                            <!--a class="comment-reply-link" href=''>Reply</a-->
                                        </div>
					<div class="clearfix">
						<cite class="author_name"><?php echo $comment->username;?></cite>
						<div class="comment-meta commentmetadata"><?php echo date('F j, Y',strtotime($comment->date))." at ".date('g:i A',strtotime($comment->date));?></div>
					</div>
					<div class="comment_text"> 
						<p><?php echo str_replace("\n", "<br/>", $comment->comment);?></p>
					</div>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "This post has no comment.";
                                    }
                                    ?>
				</div> 
				</li> 
			</ol> 

			<div class="hr clearfix">&nbsp;</div>
			
			<!-- Comment Form -->
			<form id="comment_form" action="add_comment.php" method="post">
                            <input type="hidden" name="submitComment" value="true"/>
                            <input type="hidden" name="blogID" value="<?php echo $_GET['blogID'];?>" />
				<h3>Add a comment</h3>
				<div class="hr dotted clearfix">&nbsp;</div>
				<ul>
					<li class="clearfix"> 
						<label for="name">Your Name</label>
						<input id="name" name="name" type="text" /> 
					</li> 
					<li class="clearfix"> 
						<label for="comment">Comment</label>
						<textarea id="comment" name="comment" rows="3" cols="40"></textarea>
					</li> 
					<li class="clearfix">
                                            
						<!-- Add Comment Button -->
						<a type="button" class="button medium black right" onclick="submitComment()">Add comment</a>
					</li> 
				</ul> 
			</form>
                        <label id="messageBox" class="formMsgBox"></label>
		</div>
	
		<!-- Column 2 / Sidebar -->
		<div class="grid_4">

                    <h4>Latest News</h4>
                    <ul class="sidebar">
                        <?php
                        foreach($blogList as $blog)
                        {

                            echo "<li><a href='single.php?blogID=".$blog['BlogID']."'>".$blog['Title']."</a></li>";

                        }

                        ?>
                    </ul>


		</div>
		
		<div class="hr grid_12 clearfix">&nbsp;</div>
		
		<!-- Footer -->
		<?php include_once 'footer.php';?>

	</div><!--end wrapper-->

</body>
</html>