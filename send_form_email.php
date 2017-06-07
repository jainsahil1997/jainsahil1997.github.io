<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jainsahil1997@hotmail.com";
    $email_subject = "Website Enquiry";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['contactName']) ||
        !isset($_POST['contactEmail']) ||
        !isset($_POST['contactSubject']) ||
        !isset($_POST['contactMessage']){
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $contactName = $_POST['contactName']; // required
    $contactEmail = $_POST['contactEmail']; // required
    $contactSubject= $_POST['contactSubject']; // required
    $contactMessage = $_POST['contactMessage']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';


    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($contactName)."\n";
    $email_message .= "Email: ".clean_string($contactEmail)."\n";
    $email_message .= "Subject: ".clean_string($contactSubject)."\n";
    $email_message .= "Message: ".clean_string($contactMessage)."\n";

// create email headers
$headers = 'From: '.$contactEmail."\r\n".
'Reply-To: '.$contactEmail."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.

<?php

}
?>
