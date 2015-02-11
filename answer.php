<?php


$inputtitle = $_POST['Title'];
$inputcontent = $_POST['Content'];


echo "$inputtitle";
echo "$inputcontent";

session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];

$qid = $_SESSION['$qid'];


$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");

$sql = "SELECT MAX(AnswerID) AS HighestAnswerID FROM answers";
$result = mysql_query($sql);

$row = mysql_fetch_array($result)or mysql_error();


$high = $row["HighestAnswerID"];


$sql3 = "SELECT MAX(AnswerID) AS HighestOrderID FROM answers WHERE QuestionID = '$qid'";

$result3 = mysql_query($sql3);

$row2 = mysql_fetch_array($result3)or mysql_error();



$highest = $row2["HighestOrderID"];

$highest++;


$sql2 = "INSERT INTO answers (Title, Content, QuestionID,AnswerID,Best,OrderID)
VALUES ('$inputtitle', '$inputcontent', '$qid', '$serverid','0','$highest')";

$result2 = mysql_query($sql2);



header('Location: home.php');
?>