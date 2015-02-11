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

$row = mysql_fetch_array($result)or mysql_error();;


$high = $row["HighestAnswerID"];

echo "$high";



$sql2 = "INSERT INTO answers (Title, Content, QuestionID,AnswerID,Best)
VALUES ('$inputtitle', '$inputcontent', '$qid', '$serverid','0')";

$result2 = mysql_query($sql2);



header('Location: home.php');
?>