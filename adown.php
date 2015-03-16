<?php
$message = $_GET['id'];






$type = 2;




print( '<a href="index.php">Top 5 Questions</a>' );
echo "<br/>";

session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];

$qid = $_SESSION['qid'];



$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");






$sql3 = "SELECT * FROM `votes` WHERE `Uvote` = '$serverid' AND `QID` = '$qid' AND `AID` = '$message'";
$result3 = mysql_query($sql3);
$result3 = mysql_fetch_assoc($result3);
if(empty($result3))
{






$sql2 = "INSERT INTO votes (Uvote,Vtype,QID,AID)
VALUES ('$serverid','$type', '$qid','$message')";


$result2 = mysql_query($sql2);



$sql4 = "SELECT * FROM `answers` WHERE `QuestionID` = '$qid' AND `OrderID` = '$message'";
$result4 = mysql_query($sql4);
$result4 = mysql_fetch_assoc($result4);


$num = $result4["Ascore"];

$num--;

$sql = "UPDATE answers SET `Ascore` = '$num' WHERE QuestionID = '$qid' AND `OrderID` =   '$message'";
$result = mysql_query($sql);


header('Loaction: index.php');
}

		

else
{

print( '<a href="index.php">You cannot vote on the same item multiple times</a>' );

}






mysql_close();

?>