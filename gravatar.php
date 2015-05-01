

<?php

session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];
$serverval = $_SESSION['serverval'];
$email = $_SESSION['email'];

$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");




$hash = md5(strtolower(trim($email)));


$newfile = "http://www.gravatar.com/avatar/" . $hash . ".jpeg";

$image = addslashes(file_get_contents($newfile));



$delete ="DELETE FROM `images` WHERE `iuser` = '$serverid'";


$result44 = mysql_query($delete);

$image_name = 'gravatar.jpeg';


$insert = "INSERT INTO images (iuser,iname,image)
VALUES ( '$serverid','$image_name','$image')";

$result = mysql_query($insert);
echo "did it";
header('Loaction: profile.php');



echo "<br/>";


print( '<a href="profile.php">check out your new picture</a>' );








?>