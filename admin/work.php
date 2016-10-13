<?php


    include_once "../mySQL_connection.inc.php";

    $conn = dbConnect();

    $sql = "SELECT * FROM recent_work ORDER BY Date DESC LIMIT 7";
    //        echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    while($row = mysql_fetch_array($result))
    {
         $workList[] = $row;
    }
    mysql_close($conn);
    
    if(isset($_GET['workID']))
    {
        include_once '../objects/Work.php';

        $work = new Work("","","", "","");
        $work->load($_GET['workID']);

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

                        <li><a href="work.php" class="current"><span class="meta">Add recent work</span><br />Recent Work</a></li>
                        <li><a href="suburb.php" ><span class="meta">Add Suburb to CPS Effect</span><br />Suburb</a></li>
			<li><a href="adminhome.php" ><span class="meta">Add new blog</span><br />Blog</a></li>

		</ul>

		<div class="hr grid_12">&nbsp;</div>
		<div class="clear"></div>


		<!-- Caption Line -->
                <h2 class="grid_12 caption clearfix">Welcome! This is Cornish Property Services Admin Website - You can upload recent work projects here.</h2>

                <div class="hr grid_12 clearfix">&nbsp;</div>

                <div class="grid_12">
                <!-- Add new Work Form -->
                <form id="comment_form" enctype="multipart/form-data" action="add_work.php" method="post">
                    <input type="hidden" name="submitWork" value="true" />
                    <input type="hidden" name="workID" value="<?php if(isset($_GET['workID'])) {echo $_GET['workID'];}?>" />
                        <h3 style="float: left;"><?php if(isset($_GET['workID'])) {echo "Update an existing project";} else { echo "Add a new recent project";} ?></h3>
                        <h3 style="float: right;">Latest  Projects</h3>
                        <div class="hr dotted clearfix">&nbsp;</div>
                        <ul>
                            <li class="clearfix">
                                    <label for="title">Project Title</label>
                                    <input id="title" name="title" type="text" value="<?php if(isset($_GET['workID'])) {echo $work->title;}?>" />
                            </li>
                            <li class="clearfix">
                                    <label>Type</label>
                                    <select id="type" name="type" style="font-size: 16px; margin-top:4px; width: 250px; margin-left: 10px;">
                                        <option <?php if(isset($_GET['workID']) AND $work->type=="Plumbing") echo "selected='selected'"; ?> >Plumbing</option>
                                        <option <?php if(isset($_GET['workID']) AND $work->type=="Electrical") echo "selected='selected'"; ?> >Electrical</option>
                                        <option <?php if(isset($_GET['workID']) AND $work->type=="Building") echo "selected='selected'"; ?> >Building</option>
                                    </select>
                            </li>
                            <?php
                            if(isset($_GET['workID']))
                            {
                                ?>

                            <?php
                                $fieldNo = 1;
                                for($count = 0; $count < count($work->pictureList); $count ++)
                                {
                                    $link = $work->pictureList[$count];
                                    $desc = $work->picdescList[$count];
                                    ?>
                                    <li class="clearfix">
                                            <label for="picture<?php echo ($count + 1);?>">Picture <?php echo ($count + 1);?></label>
                                            <input type="text" name="oldLink<?php echo ($count + 1);?>" readonly value="<?php echo $link;?>" size="10" style="width: 140px;"/>
                                            <input id="picture<?php echo ($count + 1);?>" name="picture<?php echo ($count + 1);?>" type="file" size="5" style="font-size: 16px; margin-top:4px; width: 150px;" />
                                            <input id="picdesc<?php echo ($count + 1);?>" name ="picdesc<?php echo ($count + 1);?>" type="text" size="10" style="width: 100px; margin-left: 0px;" value="<?php echo $desc;?>"/>
                                    </li>

                                    <?
                                    $fieldNo ++;
                                }

                                //add in missing fields if the work don't have all 5 pics
                                while($fieldNo < 6)
                                {
                                    ?>
                                    <li class="clearfix">
                                            <label for="picture<?php echo $fieldNo;?>">Picture <?php echo $fieldNo;?></label>
                                            <input id="picture<?php echo $fieldNo?>" name="picture<?php echo $fieldNo;?>" type="file" size="18" style="font-size: 16px; margin-top:4px; width: 250px;" />
                                            <input id="picdesc<?php echo $fieldNo;?>" name ="picdesc<?php echo $fieldNo;?>" type="text" size="10" value="Picture Description" onclick="this.value=''" style="width: 200px; margin-left: 0px;"/>
                                    </li>

                                    <?php
                                    $fieldNo ++;
                                }
                            }
                            else
                            {
                                for($count = 1; $count < 6; $count++)
                                {
                                    ?>
                                    <li class="clearfix">
                                            <label for="picture<?php echo $count;?>">Picture <?php echo $count;?></label>
                                            <input id="picture<?php echo $count;?>" name="picture<?php echo $count;?>" type="file" size="18" style="font-size: 16px; margin-top:4px; width: 250px;" />
                                            <input id="picdesc<?php echo $count;?>" name ="picdesc<?php echo $count;?>" type="text" size="10" value="Picture Description" onclick="this.value=''" style="width: 200px; margin-left: 0px;"/>
                                    </li>
                                <?php
                                }
                            }?>
                            <li class="clearfix">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" rows="10" cols="60"><?php if(isset($_GET['workID'])) {echo $work->content;}?></textarea>
                            </li>
                            <li class="clearfix">
                                    <!-- Add Comment Button -->
                                    <a type="submit" class="button medium black right" onclick="document.getElementById('comment_form').submit()"><?php if(isset($_GET['workID'])) {echo "Update Work";} else {echo "Add Work";}?></a>
                            </li>
                        </ul>
                        <?php
                        if(isset($_GET['warning']))
                        {

                        ?>
                        <div style="width: 250px; height: 50px; position: relative; top: -20px; left: 20px;">
                            <?php echo $_GET['warning'];?>
                        </div>
                        <?php
                        }
                        ?>
                </form>

                <!--Latest work list -->
                <div id="blogList">
                    <ul style="list-style:none;">
                        <?php
                            if(count($workList) >0)
                            {
                                foreach($workList as $work)
                                {
                                    echo "<li style='border-bottom: 1px solid #c4c4c4; margin-left: 0px;'>";
                                    echo $work['Title']."<br/>";
                                    echo "posed on ".date('d-m-Y H:i:s', strtotime($work['Date']))."  <a href='../work_single.php?workID=".$work['WorkID']."'>View</a>"."  <a href='work.php?workID=".$work['WorkID']."'>Edit</a>"."  <a href='delete_work.php?workID=".$work['WorkID']."''>Delete</a>";
                                    echo "</li>";
                                }
                            }
                            else
                            {
                                echo "There are no recent work at the moment.";
                            }

                        ?>
                    </ul>

                </div>

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
