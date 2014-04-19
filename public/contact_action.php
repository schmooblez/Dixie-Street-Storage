<?php

if (empty($_POST)) {
    header('Location: /contact.php') ;
}

$fields = ['name', 'phone', 'email', 'message'];

foreach ($fields as $field) {
    if (empty($_POST[$field])) {
        $errors[] = $field;
        $messages[] = "The <strong>$field</strong> field cannot be empty";

    }
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'email';
    $messages[] = "The given <strong>email</strong> is formatted incorrectly.";
}

if (!empty($errors) || !empty($messages)) {
    require "contact.php";
    exit;
}

require "./../vendor/autoload.php";

$config = require "./../env.php";

$mg = new Mailgun\Mailgun($config['api_key']);

$domain = $config['domain'];

$_POST['messages'] = strip_tags($_POST['messages']);

$mg->sendMessage($domain, array('from'    => $_POST['email'],
                                'to'      => $config['to'],
                                'subject' => "Contact Form from $domain",
                                'text'    => $_POST['message']));

header('Location: /thanks.php');
