<?php

    include_once "mySQL_connection.inc.php";

    $blogID = $_GET['blogID'];
    $type = $_GET['type'];
    
    $conn = dbConnect();

    $sql = "SELECT * FROM blog";

    if($type == "previous")
    {
        $sql .= " WHERE BlogID < $blogID";
    }
    else
    {
        $sql .= " WHERE BlogID > $blogID";
    }


    $sql .= " ORDER BY Date DESC LIMIT 3";

    $test = $sql;
    //        echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    while($row = mysql_fetch_array($result))
    {
        $blogList[] = $row;
    }

    //check if the blog is the latest or oldest blog to
    //decide wherether to display the blog navigation buttons
    $hasPrevious = true;
    $hasNewer = true;

    $sql = " SELECT * FROM blog WHERE BlogID < ".$blogList[2]['BlogID'];
    //        echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    if(mysql_num_rows($result) == 0)
    {
        $hasPrevious = false;
    }
    
    $sql = " SELECT * FROM blog WHERE BlogID > ".$blogList[0]['BlogID'];
    //        echo $sql.'<br/><br/>';
    $result = mysql_query($sql) or die(mysql_error());

    if(mysql_num_rows($result) == 0)
    {
        $hasNewer = false;
    }



    mysql_close($conn);

    if(count($blogList) > 0 )
    {
        foreach($blogList as $blog)
        {
    ?>
            <div class="post">
                    <!-- Post Title -->
                    <h3 class="title" style="font-size: 16px;">
                        <a href="single.php?blogID=<?php echo $blog['BlogID'];?>"><?php echo $blog['Title'];?></a>
                    </h3>
                    <!-- Post Data -->
                    <p class="sub">&bull; <?php echo date('jS M Y',$blog['Date']);?> &bull; <a href="single.php#comment?blogID=<?php echo $blog['BlogID'];?>"><?php echo $blog['comment'];?> Comment</a></p>
                    <div class="hr dotted clearfix">&nbsp;</div>
                    <!-- Post Image -->
                    <!-- Post Content -->
                    <p>
                        <?php
                            $content = str_replace("\n", "<br/>", $blog['Desc']);
                            if(strlen($content) > 240)
                            {
                                echo substr($content, 0, 243)."...";
                            }
                            else
                            {
                                echo $content;
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