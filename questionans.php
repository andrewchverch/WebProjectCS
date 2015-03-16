<?php
$qid = $_GET['id'];


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




$sql = "SELECT * FROM `question` WHERE `QuestionID` = '$qid'";
$result = mysql_query($sql);

$row = mysql_fetch_array($result);


$qscore = $row["Qscore"];

$questiontitle = $row["Title"];
$questioncontent = $row["Content"];
$askerid = $row["AskerID"];
$best = $row["Bested"];


echo "$questiontitle ";
echo "Score:";
echo "$qscore";
echo "<br/>";
echo "$questioncontent";
echo "<br/>";
echo "Asked by ";


$sql2 = "SELECT * FROM `users` WHERE `UserID` = '$askerid'";

$result2 = mysql_query($sql2);

$row2 = mysql_fetch_array($result2);

$askername = $row2["Username"];

echo "$askername";

$sql22 = "SELECT * FROM `images` WHERE `iuser` = '$askerid'";

$result22 = mysql_query($sql22);
$result22 = mysql_fetch_assoc($result22);
if(empty($result22))
	echo "(no avatar)";

else
{
$result22 = $result22['image'];
echo '<img src="data:image/jpeg;base64,' . base64_encode( $result22 ) . '" />';
}



echo "<br/>";
print( "<a href='qup.php?id=$qid'>UP VOTE</a>" );
echo "<->";
print( "<a href='qdown.php?id=$qid'>DOWN VOTE</a>" );
echo "<br/>";



$sql3 = "SELECT * FROM `answers` WHERE `QuestionID` = '$qid' ORDER BY `Ascore` DESC";

$result3 = mysql_query($sql3);

echo "<br/>";
echo "<br/>";
echo "Answers:";
echo "<br/>";




while ($row3 = mysql_fetch_array($result3, MYSQL_ASSOC)) {
$sname = $row3["Title"];



$x = $row3["OrderID"];
echo "Response $x: ";
echo "$sname                       ";

$score = $row3["Ascore"];
echo "Score: ";
echo "$score";
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

$sql23 = "SELECT * FROM `images` WHERE `iuser` = '$person'";

$result23 = mysql_query($sql23);
$result23 = mysql_fetch_assoc($result23);
if(empty($result23))
	echo "(no avatar)";

else
{
$result23 = $result23['image'];
echo '<img src="data:image/jpeg;base64,' . base64_encode( $result23 ) . '" />';
}

echo "<br/>";
print( "<a href='aup.php?id=$x'>UP VOTE</a>" );
echo "<->";
print( "<a href='adown.php?id=$x'>DOWN VOTE</a>" );
echo "<br/>";

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