<?php
  $HIDDEN_ERROR_CLASS = "hiddenError";
  $submit = $_REQUEST["submit"];
  //if user submits the form
  if (isset($submit)){

    //name
    $name = $_REQUEST["name"];
    if (!empty($name)){
      $nameValid = true;
    } else{
      $nameValid = false;
    }

    //email
    $email = $_REQUEST["email"];
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailValid = true;
    } else{
      $emailValid = false;
    }

    //phone number (optional)
    $phoneNumber = $_REQUEST["phone_number"];
    if (empty($phoneNumber) || (strlen($phoneNumber) == 10 && filter_var($phoneNumber, FILTER_VALIDATE_INT))){
      $phoneNumberValid = true; //true if empty or only 10 numbers
    } else{
      $phoneNumberValid = false;
    }

    //subject
    $subject = $_REQUEST["subject"];
    if (!empty($subject)){
      $subjectValid = true;
    } else{
      $subjectValid = false;
    }

    //message type / intent
    $intent = $_REQUEST["message_type"];
    if (!empty($intent)){
      $intentValid = true;
    } else {
      $intentValid = false;
    }

    //message
    $message = $_REQUEST["message"];
    if (!empty($message)){
      $messageValid = true;
    } else{
      $messageValid = false;
    }

    $formValid = $nameValid && $emailValid && $phoneNumberValid && $subjectValid
      && $intentValid && $messageValid;

    //if all of form is valid
    if ($formValid){
      session_start();
      $_SESSION["name"] = $name;
      $_SESSION["email"] = $email;
      $_SESSION["phone_number"] = $phoneNumber;
      $_SESSION["subject"] = $subject;
      $_SESSION["message_type"] = $intent;
      $_SESSION["message"] = $message;
      header("Location: form_submission.php");
      return;
    }
  } else { //if form is not submitted
    $nameValid = true;
    $emailValid = true;
    $phoneNumberValid = true;
    $subjectValid = true;
    $intentValid = true;
    $messageValid = true;
  }

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


  <script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="scripts/clientValidation.js" type="text/javascript"></script>
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
  <form id="mainForm" action="/contact.php" method="post" novalidate>

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo($name);?>" required>
        <span class="errorContainer <?php if ($nameValid) { echo($HIDDEN_ERROR_CLASS);} ?>"
    id="nameError">
            Name is required.
        </span>
    </div>

    <div>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo($email);?>" required>
        <span class="errorContainer <?php if ($emailValid) { echo($HIDDEN_ERROR_CLASS);} ?>"
    id="emailError">
            Please enter a valid email.
        </span>
    </div>

    <div>
        <label for="phone_number">Phone (optional):</label>
        <input type="text" id="phone_number" name="phone_number" value="<?php echo($phoneNumber);?>">
        <span class="errorContainer <?php if ($phoneNumberValid) { echo($HIDDEN_ERROR_CLASS);} ?>"
    id="phoneNumberError">
        Please enter a valid phone number (10 digits and without dashes).
        </span>
    </div>

    <div>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="<?php echo($subject);?>" required>
        <span class="errorContainer <?php if ($subjectValid) { echo($HIDDEN_ERROR_CLASS);} ?>"
    id="subjectError">
            Subject is required.
        </span>
    </div>

    <label>Intent of Contact:</label>
    <select name="message_type" id="message_type" required>
      <option <?php if($intent=="") echo 'selected="selected"'; ?>value="">--Select--</option>
      <option <?php if($intent=="question") echo 'selected="selected"'; ?> value="question">Question</option>
      <option <?php if($intent=="comment") echo 'selected="selected"'; ?>value="comment">Comment</option>
      <option <?php if($intent=="suggestion") echo 'selected="selected"'; ?>value="suggestion">Suggestion</option>
      <option <?php if($intent=="recruit") echo 'selected="selected"'; ?>value="recruit">Recruiting</option>
    </select>
    <span class="errorContainer <?php if ($intentValid) { echo($HIDDEN_ERROR_CLASS);} ?>"
          id="intentError">
        Please select an option.
    </span>

    <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required><?php echo($message);?></textarea>
        <span class="errorContainer <?php if ($messageValid) { echo($HIDDEN_ERROR_CLASS);} ?>"
    id="messageError">
            Message is required.
        </span>
    </div>

    <div class="button">
        <button type="submit" name="submit" class="submit">Send your message</button>
    </div>

  </form>

  <!-- icon credit -->
  <div class = "icons_credit">
    <a href='http://www.freepik.com/free-vector/black-social-media-logo-collection_1011932.htm'
    target = "_blank">
      Icons Designed by Freepik</a>
  </div>

</body>

</html>
