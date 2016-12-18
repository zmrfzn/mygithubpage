<?php
include_once('class.phpmailer.php');
include_once('class.smtp.php');
require 'PHPMailerAutoload.php';

// getValues();
// validate($name,$email,$contact_message);

// function getValues(){
// 	$name = trim(stripslashes($_POST['contactName']));
//    $email = trim(stripslashes($_POST['contactEmail']));
//    $subject = trim(stripslashes($_POST['contactSubject']));
//    $contact_message = trim(stripslashes($_POST['contactMessage']));

// }

// function validate($name,$email,$contact_message){
// 	// Check Name
// 	if (strlen($name) < 2) {
// 		$error['name'] = "Please enter your name.";
// 	}
// 	// Check Email
// 	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
// 		$error['email'] = "Please enter a valid email address.";
// 	}
// 	// Check Message
// 	if (strlen($contact_message) < 15) {
// 		$error['message'] = "Please enter your message. It should have at least 15 characters.";
// 	}

// 	return $error;
// }
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

/* from template*/

$name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$error['message'] = "Please enter your message. It should have at least 15 characters.";
	}
   // Subject
	if ($subject == '') { $subject = $name; }


   // Set Message
   $message .= "Email from: " . $name . "<br />";
	$message .= "Email address: " . $email . "<br />";
   $message .= "Message: <br />";
   $message .= $contact_message;
   $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";


//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.live.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "zmrfzn@hotmail.com";

//Password to use for SMTP authentication
$mail->Password = "imfunzam5082";

//Set who the message is to be sent from
$mail->setFrom('zmrfzn@hotmail.com','Portfolio Feedback');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('zmrfzn@gmail.com', 'Zameer Fouzan');

//Set the subject line
$mail->Subject = 'Portfolio Feedback -'.$subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->msgHTML($message);
//$mail->Body = $message;

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
//
if (!$error) {

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "OK";
}
} else{
	$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
	$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
	$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;
}
