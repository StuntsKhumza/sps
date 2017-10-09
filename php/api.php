<?php

require "PHPMailer-master/PHPMailerAutoload.php";

function composeMemo($data){

    $response = array('status'=>200, 'message'=>'success');

    $body = file_get_contents('templates/contact_memo.html');

    $mappers = $data['contact']; 

    $body = doStrReplacement($body, $mappers);

    $newMemo = "templates/generated/contact_memo.html";

    file_put_contents($newMemo , $body); //new memo

    $mail = new PHPMailer;
    $mail->IsSMTP();

    $mail->Host = "mail.web-demos.co.za";
    $mail->Port = 25;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "Nkosinathi.Khumalo@web-demos.co.za";
    $mail->Password = "Bhung@ne002";
    $mail->setFrom('Nkosinathi.Khumalo@web-demos.co.za', 'Software Progrexion Solutions');
    $mail->addReplyTo('Nkosinathi.Khumalo@web-demos.co.za', 'Software Progrexion Solutions ');
    $mail->Subject = $data['contact']['subject'];

//Set who the message is to be sent to
    $response['email']  = $data['contact'];
    $mail->addAddress($data['contact']['email'], $data['contact']['name']);
//Set the subject line
    
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->IsHTML(true);
    $mail->MsgHTML($body, $newMemo);
    //$mail->msgHTML(file_get_contents('contents2.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
    //$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
    //  $mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
    if (!$mail->send()) {
       $response['status'] = 500; 
       $response['message'] = "Mailer Error: " . dirname(__FILE__) . " " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }

    return json_encode($response);

}

function doStrReplacement($body, $mappers) {
    
            foreach ($mappers as $element) {
    
                $key = (string) key($mappers);
    
                $body = str_replace($key, $mappers[$key], $body);
    
                next($mappers);
            }
    
            return $body;
        }