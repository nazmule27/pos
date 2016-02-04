<?php
//get the first name
$name = Input::get('name');
$email = Input::get ('email');
$subject = Input::get ('subject');
$message = Input::get ('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?>

<h2>We been contacted by</h2>
<p>
    Name : <?php echo ($name); ?> <br>
    Email address: <?php echo ($email);?> <br>
    Subject: <?php echo ($subject); ?><br>
    Message: <?php echo ($message);?><br>
    Date: <?php echo($date_time);?><br>
    User IP address: <?php echo($userIpAddress);?><br>

</p>