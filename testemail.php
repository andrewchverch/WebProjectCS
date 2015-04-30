<?php


$qid = 1;

$email= 'achve001@odu.edu';

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-3acf807843cea615b3f0110ebcc96b10');
$domain = "sandboxad44c65ce54042419e75fc7b7f547ba9.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandboxad44c65ce54042419e75fc7b7f547ba9.mailgun.org>',
                        'to'      => $email,
                        'subject' => 'NEW',
                        'html'    => "<a href='http://wsdl-docker.cs.odu.edu:60325/validate.php?id=$qid'>DOWN VOTE</a>"));
    

?>