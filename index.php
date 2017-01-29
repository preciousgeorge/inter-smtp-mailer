<?php

// Include the PEAR classes
include('Mail.php');
include('Mail/mime.php');

// Constructing the email
$sender = "precious.george.o@gmail.com";
$recipient = "riomachi@gmail.com";
$subject = "Application For the Position of CTO";
// smtp mail server - get from your hosts
$host = 'smtp.hostname.com';
$username = "smtpuser";
// Sender email address password
$password = "smtp_password";
$crlf = "\";
$headers = array(
	'From'          => $sender,
	'Return-Path'   => $sender,
	'Subject'       => $subject,
    'cc'            => 'doctorfox29@yahoo.co.uk'
	);

// Creating the Mime message
$mime = new Mail_mime($crlf);
$message = "<h1>Good Morning</h1>
            <br />
            <br />
                 <p>As subject refers i would like to apply for the position of Chief Technical Adviser
                 <br />
                 at PrepClass. My passion for eduction and programming make PrepClass the place where<br />
                 I believe my skills can be properly harnessed. I hope you would give me the opportunity
                 <br />
                 to be part of your team. Your Kind consideration would be gladly appreciated.
                 </p>

                 <br />
                 <br />
                 <br />
                 Regards
                 <br />
                 Precious O. George
                 ";

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
