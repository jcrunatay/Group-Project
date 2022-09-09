<?php

$to = "";
$subject = "";
$message =  "";

// More headers
$headers .= 'From: <herzingprogram@gmail.com>' . "\r\n";

if(mail($to,$subject,$message,$headers))
    echo "Email sent !!!";
else
  echo "Email sending failed again";
?>