<?php
$qid = $_GET['id'];




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


$sql = "SELECT * FROM `question` WHERE `QuestionID` = '$qid'";
$result = mysql_query($sql);

$row = mysql_fetch_array($result);




$questiontitle = $row["Title"];
$questioncontent = $row["Content"];
$askerid = $row["AskerID"];
$best = $row["Bested"];



echo "$serverid";
echo "$askerid";
mysql_close();
if($best==1)
{

header('Location: questionsol.php?id=$qid?win=$best');
}
if($best!=1)
{



if($serveruser==$askerid)
{
header('Location: question.php?id=$qid?win=$best');

}


/*

$sum= serverid- askerid;

if(sum!=0)
{


header('Location: questionans.php?id=$qid?win=$best');
	
}*/



}


	?>