<?php
session_start();
$submit = $_REQUEST["submit"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$phoneNumber = $_SESSION["phone_number"];
$subject = $_SESSION["subject"];
$intent = $_SESSION["message_type"];
$message = $_SESSION["message"];

if (empty($phoneNumber)){
	$phoneNumber = "No number provided.";
}

unset($_SESSION["name"]);
unset($_SESSION["email"]);
unset($_SESSION["phone_number"]);
unset($_SESSION["subject"]);
unset($_SESSION["message_type"]);
unset($_SESSION["message"]);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact Info</title>

  <link rel = "stylesheet"
        type = "text/css"
        href = "styles/all.css"
        media = "all" />
	<link href="http://fonts.googleapis.com/css?family=Alice|Playfair+Display:900" rel="stylesheet" type="text/css" />

</head>

<body class="contact">
  <h1>Contact Info</h1>

  <?php include("includes/navigation.php"); ?>

  <p>Mena Wang</p>
  <p>email: wang.mena@gmail.com</p>

  <div class = "icons">
    <!-- all icon sources: freepik.com; credited cited on bottom of page as required by website
  to use free license -->
    <a href="https://www.linkedin.com/in/mena-w-33b60a94/" target="_blank">
      <img alt="LinkedIn" src = "icons/linkedin_transparent.png"/></a>
    <a href="https://www.instagram.com/manapotionn/" target="_blank">
      <img alt="Instagram" src = "icons/instagram_transparent.png"/></a>
    <a href="http://manapotionn.tumblr.com/tagged/mine" target="_blank">
      <img alt="Tumblr" src = "icons/tumblr_transparent.png"/></a>

  </div>

  <!-- contact form -->
  <div class="echo_submission">
    <p>Thank you for the message, <?php echo(htmlspecialchars($name)); ?>! <br/>
    I will get in contact with you as soon as possible at <?php echo(htmlspecialchars($email));?>.</p>
    <p> Here is the information you have provided: <br/>
    Phone Number (Optional): <?php echo(htmlspecialchars($phoneNumber)); ?> <br/>
    Subject: <?php echo(htmlspecialchars($subject)); ?> <br/>
    Intent of Contact: <?php echo(htmlspecialchars($intent)); ?> <br/>
    Message: <?php echo(htmlspecialchars($message)); ?></p>
  </div>

  <div class = "icons_credit">
    <a href='http://www.freepik.com/free-vector/black-social-media-logo-collection_1011932.htm'
    target = "_blank">
      Icons Designed by Freepik</a>

  </div>

</body>

</html>
