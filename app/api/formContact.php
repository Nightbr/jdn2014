<?php
// php api for ajax form by Titouan BENOIT

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

//retrieve data
$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
if (empty($request->name))
    $errors['name'] = 'name is required.';
if (empty($request->email))
    $errors['email'] = 'email is required.';
if (empty($request->subject))
    $errors['subject'] = 'subject is required.';
if (empty($request->message))
    $errors['message'] = 'message is required.';

// return a response ===========================================================

    // response if there are errors
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        

        //send mail
        $receiver = "jdn2014@ig2i.fr";

        $subject = '[JDN-Website] '.$request->subject;

        $message  = 'Nom : '.htmlentities($request->name).'<br />';
        $message .= 'Email : '.htmlentities($request->email).'<br />';
        $message .= 'Sujet : '.htmlentities($request->subject).'<br />';
        $message .= 'Message : <br />'.htmlentities($request->message);
        $message = nl2br($message);

        $message = wordwrap($message, 70, "\r\n");

        $header  = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=utf-8" . "\r\n";
        $header .= "From: ".htmlentities($request->usermail)." \r\n";

        try {
            mail($receiver, $subject, $message, $header);
            $data['success'] = true;
            $data['message'] = 'Merci, le message a bien été envoyé, nous vous répondrons le plus rapidement possible.';

        } catch (Exception $e) {
            $data['success'] = false;
            $data['errors']  = 'Le mail n\'a pas pu être envoyé correctement...';
        }

    }

    // return all our data to an AJAX call
    echo json_encode($data);


?>