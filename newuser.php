<?php


$inputuser = $_POST['user'];
$inputpass = $_POST['pass'];
$iemail = $_POST['email'];
$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");


$sql22 = "SELECT * FROM `users` WHERE `Username` = '$inputuser'";

$result22 = mysql_query($sql22);
$result22 = mysql_fetch_assoc($result22);
if(empty($result22))
	{
	





$sql = "SELECT MAX(UserID) AS HighestUserID FROM users";

$result3 = mysql_query($sql);

$row2 = mysql_fetch_array($result3)or mysql_error();



$highest = $row2["HighestUserID"];

$highest++;


$sql2 = "INSERT INTO users (UserID,Username,Password,UsScore,Validated,email)
VALUES ('$highest','$inputuser', '$inputpass','0','$iemail')";


$result2 = mysql_query($sql2);



print( '<a href="login.php">User Created, clear for Login</a>' );


}
else
{
print( '<a href="newuser.html">choose a different username</a>' );
}



# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-3acf807843cea615b3f0110ebcc96b10');
$domain = "sandboxad44c65ce54042419e75fc7b7f547ba9.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandboxad44c65ce54042419e75fc7b7f547ba9.mailgun.org>',
                        'to'      => $iemail,
                        'subject' => 'NEW',
                        'html'    => "<a href='http://wsdl-docker.cs.odu.edu:60325/validate.php?id=$highest'>VALIDATE</a>"));
    








mysql_close();






?>