<?php


$inputtitle = $_POST['Title'];
$inputcontent = $_POST['Content'];

$inputtags = $_POST['Tags'];



$array = explode(" ",$inputtags);


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

$sql = "SELECT MAX(QuestionID) AS HighestQuestionID FROM question";
$result = mysql_query($sql);

$row = mysql_fetch_array($result)or mysql_error();;


$high = $row["HighestQuestionID"];

echo "$high";

$high++;


$sql2 = "INSERT INTO question (QuestionID,Title, Content,AskerID,Bested)
VALUES ('$high','$inputtitle', '$inputcontent' , '$serverid','0')";


$result2 = mysql_query($sql2);





foreach ($array as &$value) {

$sql3= "INSERT INTO tags (Tag, QuestionNum) VALUES ('$value', '$high' )";
$result3= mysql_query($sql3);


  
}








header('Location: index.php');
?>