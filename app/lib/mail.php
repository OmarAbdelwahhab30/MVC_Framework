<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require '../../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

//Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'PlayGround8545@gmail.com';                     //SMTP username
$mail->Password   = 'OmarAhmedMohamed123';                               //SMTP password
$mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
$mail->Port       = 465;

//Content
$mail->isHTML(true);
$mail->CharSet = "UTF-8";

