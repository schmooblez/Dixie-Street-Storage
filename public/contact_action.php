<?php

if (empty($_POST)) {
    header('Location: /contact.php') ;
}

$fields = ['fname', 'lname', 'email', 'message'];

foreach ($fields as $field) {
    if (empty($_POST['field'])) {
        header('Location: /contact.php');
    }
}





require "./../vendor/autoload.php";

$config = require "./../env.php";

$mg = new Mailgun($config['api_key']);

$domain = $config['domain'];

# Now, compose and send your message.
$mg->sendMessage($domain, array('from'    => 'bob@example.com',
                                'to'      => $config['to'],
                                'subject' => 'The PHP SDK is awesome!',
                                'text'    => 'It is so simple to send a message.'));

