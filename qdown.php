<?php
$qid = $_GET['id'];
$type = 2;


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




$sql3 = "SELECT * FROM `votes` WHERE `Uvote` = '$serverid' AND `QID` = '$qid'";
$result3 = mysql_query($sql3);
$result3 = mysql_fetch_assoc($result3);
if(empty($result3))
{




$sql8 = "SELECT * FROM `question` WHERE `QuestionID` = '$qid'";
$result8 = mysql_query($sql8);
$result8 = mysql_fetch_assoc($result8);

$check = $result8["AskerID"];

echo $check;
echo $serverid;

if ($check!=$serverid)
{
$sql2 = "INSERT INTO votes (Uvote,Vtype,QID,AID)
VALUES ('$serverid','$type', '$qid','0')";


$result2 = mysql_query($sql2);



$sql4 = "SELECT * FROM `question` WHERE `QuestionID` = '$qid'";
$result4 = mysql_query($sql4);
$result4 = mysql_fetch_assoc($result4);


$num = $result4["Qscore"];
$person =$result4["AskerID"];

$num--;

$sql5 = "SELECT * FROM `users` WHERE `UserID` = '$person'";
$result5 = mysql_query($sql5);
$result5 = mysql_fetch_assoc($result5);


$bigscore = $result5["UsScore"];

$bigscore--;




$sql = "UPDATE question SET `Qscore` = '$num' WHERE `QuestionID` = '$qid'";
$result = mysql_query($sql);




$sql10 = "UPDATE users SET `UsScore` = '$bigscore' WHERE `UserID` = '$person'";
$result10 = mysql_query($sql10);
header('Loaction: index.php');



header('Loaction: index.php');
}	
}
		

else
{

print( '<a href="index.php">You cannot vote on the same item multiple times</a>' );

}






mysql_close();

?>