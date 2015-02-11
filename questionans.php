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


echo "$questiontitle";
echo "<br/>";
echo "$questioncontent";
echo "<br/>";
echo "Asked by ";



$sql2 = "SELECT * FROM `users` WHERE `UserID` = '$askerid'";

$result2 = mysql_query($sql2);

$row2 = mysql_fetch_array($result2);

$askername = $row2["Username"];

echo "$askername";



$sql3 = "SELECT * FROM `answers` WHERE `QuestionID` = '$qid'";

$result3 = mysql_query($sql3);

echo "<br/>";
echo "<br/>";
echo "Answers:";
echo "<br/>";



$x = 1;
while ($row3 = mysql_fetch_array($result3, MYSQL_ASSOC)) {
$sname = $row3["Title"];




echo "Response $x: ";
echo "$sname ";
echo "<br/>";
$name = $row3["Content"];
echo "$name";

$person = $row3["AnswerID"];

$sql4 = "SELECT * FROM `users` WHERE `UserID` = '$person'";

$result4 = mysql_query($sql4);

$row4 = mysql_fetch_array($result4);

$personname = $row4["Username"];
echo "<br/>";
echo "Answer given by $personname";
$x++;

echo "<br/>";

}
echo "<br/>";
echo "<br/>";
echo "______________________________________________________________________";
echo "______________________________________________________________________";
mysql_close();
?>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 
  <link rel="stylesheet" href="css/style.css">
 
</head>
<body>

<br>
  Submit Your Own Answer

<br>
   <form action="answer.php" method="post" >


   <textarea rows="1" cols="30" name="Title">
Type answer title here
</textarea> 

<br>
 <textarea rows="4" cols="30" name="Content">
Type answer here
</textarea> 


<br>
 
        <input type="submit" value="Submit">

    </div>
</form>
  </section>

  
</body>
</html>