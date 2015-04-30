<?php
$message = $_GET['id'];






$type = 1;




print( '<a href="login.php">login</a>' );
echo "<br/>";





$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");









$sql = "UPDATE users SET `Validated` = '1' WHERE  `UserID` =   '$message'";
$result = mysql_query($sql);

header('Loaction: index.php');

}







		







mysql_close();

?>