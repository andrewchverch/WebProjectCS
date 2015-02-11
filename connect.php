<?php


$inputuser = $_POST['user'];
$inputpass = $_POST['pass'];
$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");


$query = "SELECT * FROM `users` WHERE `Username` = '$inputuser'";
$querypass = "SELECT * FROM `users` WHERE `Password` = '$inputpass'";



$result = mysql_query($query)or die($query."<br/><br/>".mysql_error());

$resultpass = mysql_query($querypass);


$row = mysql_fetch_array($result);

$rowpass = mysql_query($resultpass);

$serveruser = $row["Username"];
$serverpass = $row["Password"];
$serverid = $row["UserID"];


if($serveruser&&$serverpass){

if(!$result){

	die("Username or password is invalid");
}

echo "<br><center>Database output </b></center><br><br>";
mysql_close();

if($inputpass == $serverpass){

session_start();
$_SESSION['serveruser'] = $serveruser;
$_SESSION['serverpass'] = $serverpass;
$_SESSION['serverid'] = $serverid;
	header('Location: index.php');
}else{
	header('Loaction: fail.php');
}
}

	header('Loaction: fail.php');


/*if ($inputuser == "Hirsh" && $inputpass == "123"){
echo "Welcome";
//header("Location: Home.html");




}
else{

echo "not welcome";
//header("Location: fail.html");

}*/








?>