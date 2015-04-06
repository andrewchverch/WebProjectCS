<?php

$qid = $_GET['id'];


session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];


$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");



$sql = "DELETE FROM question WHERE QuestionID = '$qid'";
$result = mysql_query($sql);


mysql_close();
?>

