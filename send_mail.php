<?php

    $mailto = "amel.jbeli@yahoo.fr";
    $mailSub = $_REQUEST['Subject'];
    $mailMsg = $_REQUEST['Comment'];
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0; // or 1 to see error
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "ameljbeli90@gmail.com";
   $mail ->Password = "2241995behappy";
   $mail ->SetFrom("ameljbeli90@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
?>




   

