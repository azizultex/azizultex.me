<?php

if($_POST){
	
	//var_dump($_POST);
	
    $to_email = "azizultex@gmail.com"; //Recipient email, Replace with own email here
    $subject = "New response from landing page";
    //check if its an ajax request, exit if not
     if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') { 
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    }

    //Sanitize input data using PHP filter_var().
    $name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email     = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $message   = filter_var($_POST["message"], FILTER_SANITIZE_NUMBER_INT);
    
    //additional php validation
    if(strlen($name)< 4){ // If length is less than 4 it will output JSON error.
        $output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!'));
        die($output);
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
        die($output);
    }
    if(strlen($message)< 15 )){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Message is too short or empty!'));
        die($output);
    }

    //email body
	$message_body = "Howdy, you are requested to contact below person from SPI contact form. \r\n\r\n";
    $message_body .= "Name: ".$name."\r\nEmail: ".$email."\r\nMessage: ".$message ;
    
    //proceed with PHP email.
    $headers = 'From: '.$name.'' . "\r\n" .
    'Reply-To: '.$email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $send_mail = mail($to_email, $subject, $message_body, $headers);
    
    if(!$send_mail)
    {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    }else{
        $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$name .' I have received your message. I will contact you very soon :)'));
        die($output);
    }
}