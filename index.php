<?php

// Include the PEAR classes
include('Mail.php');
include('Mail/mime.php');

// Constructing the email
$sender = "precious.george.o@gmail.com";
$recipient = "precious.george.o@gmail.com";
$subject = "Application For the Position of CTO";
// smtp mail server - get from your hosts
$host = 'smtp.mcomm.ca';
$username = "pgeorge@mcomm.ca";
// Sender email address password
$password = "trojian@44SSL";
$crlf = "\
";
$headers = array(
	'From'          => $sender,
	'Return-Path'   => $sender,
	'Subject'       => $subject
	);

// Creating the Mime message
$mime = new Mail_mime($crlf);
$message = "<h1>Hello all</h1>";

// Setting the body of the email
//$mime->setTXTBody($text);
$mime->setHTMLBody($message);
$body =  $mime->get();
$headers = $mime->headers($headers);

// Setup the SMTP part
$smtp = Mail::factory('smtp',
   array ('host' => $host,
    //'port' => '465',
    'auth' => true,
    'username' => $username,
    'password' => $password));

// Send the email via STMP	


$mail = $smtp->send($recipient, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}

// linode2679142 -- linode name i created


//root password for ubuntu instance - trojian@44