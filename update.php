
<?php

$num = $_POST['num'];

$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");

session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];

 $qid=$_SESSION['$qid'];



$sql = "UPDATE answers SET Best = 1 WHERE QuestionID = '$qid' && OrderID = '$num'";
$sql = "UPDATE question SET Bested = 1 WHERE QuestionID = '$qid'";
$result = mysql_query($sql);



mysql_close();
//header('Loaction: questionsol.php?id=$qid');
header('Location: questionsol.php?id=$qid');
?>