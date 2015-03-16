<?php


$inputuser = $_POST['user'];
$inputpass = $_POST['pass'];
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


$sql2 = "INSERT INTO users (UserID,Username,Password)
VALUES ('$highest','$inputuser', '$inputpass')";


$result2 = mysql_query($sql2);



print( '<a href="login.php">User Created, clear for Login</a>' );


}
else
{
print( '<a href="newuser.html">choose a different username</a>' );
}








mysql_close();






?>