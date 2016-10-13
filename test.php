<?php

require 'facebook.php';

// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => '254752073152',
  'secret' => '904270b68a2cc3d54485323652da4d14',
  'cookie' => true,
));

// We may or may not have this data based on a $_GET or $_COOKIE based session.
//
// If we get a session here, it means we found a correctly signed session using
// the Application Secret only Facebook and the Application know. We dont know
// if it is still valid until we make an API call using the session. A session
// can become invalid if it has already expired (should not be getting the
// session back in this case) or if the user logged out of Facebook.
//$session = $facebook->getSession();

//$me = null;
// Session based API call.
//if ($session) {
//  try {
//    $uid = $facebook->getUser();
//    $me = $facebook->api('/me');
//
//  } catch (FacebookApiException $e) {
//    error_log($e);
//  }
//}

//// login or logout url will be needed depending on current user state.
//if ($me) {
//  $logoutUrl = $facebook->getLogoutUrl();
//} else {
//  $loginUrl = $facebook->getLoginUrl();
//}

$group = $facebook->api('/134238089923912/members');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>php-sdk</title>
<style>
body {
font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
}
h1 a {
text-decoration: none;
color: #3b5998;
}
h1 a:hover {
text-decoration: underline;
}
</style>
</head>
<body>
<!--
We use the JS SDK to provide a richer user experience. For more info,
look here: http://github.com/facebook/connect-js
-->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
FB.init({
appId : '<?php echo $facebook->getAppId(); ?>',
session : <?php echo json_encode($session); ?>, // don't refetch the session when PHP already has it
status : true, // check login status
cookie : true, // enable cookies to allow the server to access the session
xfbml : true // parse XFBML
});

// whenever the user logs in, we refresh the page
FB.Event.subscribe('auth.login', function() {
window.location.reload();
});
};

(function() {
var e = document.createElement('script');
e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
e.async = true;
document.getElementById('fb-root').appendChild(e);
}());
</script>

<h3>Number of people in the draw</h3>
<?php echo count($group)?>
<br/><br/>
<h3>Name & Facebook ID</h3>
<?php
    foreach($group as $member)
    {
        echo $member[0]['name']."&nbsp;&nbsp;&nbsp;&nbsp;".$member[0]['id']."<br/>";

    }
?>

</body>
</html>

