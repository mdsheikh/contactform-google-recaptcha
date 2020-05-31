<?php
if(isset($_POST['submit'])
{
    $user_name = $_POST['name'];
    $phone_num = $_POST['phone'];
    $user_email = $_POST['email'];
    $user_message = $_POST['message'];


    $email_from = 'donotreply@example.com'; // your website email address 
    $email_subject = "Form Submission";
    $email_body = "Name: $user_name. \n" . 
                  "Phone:  $phone_num. \n" .
                  "Email : $user_email.\n" .
                  "Message: $user_message. \n";

    $to_email = "abc@example.com";  // your email address goes here
    $headers = "From: $email_from \r\n";
    $headers .= "Reply: $user_email \r\n";             


    $secret_key = "your secret key from google recaptcha, cpoy and paste here";
    $response_key = $_POST['g-recaptcha-response'];
    $user_ip = $_SERVER['REMOTE_ADDR'];  // users ip address
    $url = "https://www.google.com/recaptcha/api/siteverify?
    secret=$secret_key&response=$response_key&remoteip=$user_ip";

    $response = file_get_contents($url);
    $response = json_decode($response);

    if($response->success)
    {
        mail($to_email, $email_subject,$email_body,$headers);
        echo "Messaage Sent Successfully";

    }
    else{
        echo "Invalid rechaptcha, try again">;
    }


}



?>