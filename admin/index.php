<?php
    session_start();

    if(isset($_POST['password']))
    {
        if($_POST['password'] == "allanraad")
        {
            $_SESSION['admin_pw'] = 'true';
            header("Location: adminhome.php");
        }
    }


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <!-- Favicon -->
        <link rel="icon" href="../images/favicon.ico" type="image/ico"/>

        <link rel="stylesheet" type="text/css" href="css/cover_firefox.css" />
        <link rel="stylesheet" type="text/css" href="../css/styles.css" />
        <!--[if gte IE 6]>
        <link rel="stylesheet" type="text/css" href="css/cover_ie.css" />
        <![endif]-->


    </head>
    <body style="background-color: #f7f7f7; background:none;">

        <div id="loginBox">
            <form method="POST" id="passwordForm">
                <table>

                    <tr>
                            <td><div id="loginLabel"><b>Password: </b></div></td>
                            <td><div id="loginText"><input id="password"  name="password" type="password" class="loginText" size="20" maxlength="30" /></div></td>
                    </tr>
                    <tr>
                            <td></td>
                            <td><input type="submit" class="button" value="Log in" /></td>
                    </tr>
                </table>
            </form>
        </div>


    </body>
</html>
