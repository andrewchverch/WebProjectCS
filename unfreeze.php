<?php
$qid = $_GET['id'];

$type = 1;


print( '<a href="index.php">Top 5 Questions</a>' );
echo "<br/>";

session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];
$_SESSION['$qid']= $qid;

$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");





echo $qid;
$sql = "UPDATE question SET frozen = 0 WHERE QuestionID = '$qid'";
$result = mysql_query($sql);

header('Loaction: index.php');





mysql_close();

?>