<?php
$qid = $_GET['id'];


print( '<a href="index.php">Top 5 Questions</a>' );
echo "<br/>";

session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];
$serverval = $_SESSION['serverval'];
$_SESSION['qid']= $qid;



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
echo "TAGS: ";


$sql20 = "SELECT * FROM `tags` WHERE `QuestionNum` = '$qid'";
$result20 = mysql_query($sql20);


while ($row20 = mysql_fetch_array($result20, MYSQL_ASSOC)) {
$tag = $row20["Tag"];

 echo"<a href='tagsearch.php?id=$tag'>".$tag."</a>.";


}

echo "<br/>";
echo "Asked by ";



$sql2 = "SELECT * FROM `users` WHERE `UserID` = '$askerid'";

$result2 = mysql_query($sql2);

$row2 = mysql_fetch_array($result2);


$thing = $row["QuestionID"];
$askername = $row2["Username"];
$uscore = $row2["UsScore"];
echo "$askername";
echo "<br/>";
echo "User Score: ";
echo "$uscore";
echo "<br/>";

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

if($serverval==1)
{
echo "<br/>";
print( "<a href='qup.php?id=$thing'>UP VOTE</a>" );
echo "<->";
print( "<a href='qdown.php?id=$thing'>DOWN VOTE</a>" );
echo "<br/>";
}



echo "<br/>";
echo "===========================================";
echo "<br/>";
echo "BEST ANSWER:";


$sql3 = "SELECT * FROM `answers` WHERE `QuestionID` = '$qid' ORDER BY `Ascore` ASC";

$result3 = mysql_query($sql3);

echo "<br/>";
echo "<br/>";

echo "<br/>";




while ($row3 = mysql_fetch_array($result3, MYSQL_ASSOC)) {
$best = $row3["Best"];
if($best==1)
{
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
$xscore = $row4["UsScore"];
echo "<br/>";
echo "Answer given by $personname";
echo "<br/>";
echo "Asker Score: $xscore";

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

if($serverval==1)
{
echo "<br/>";
print( "<a href='aup.php?id=$x'>UP VOTE</a>" );
echo "<->";
print( "<a href='adown.php?id=$x'>DOWN VOTE</a>" );
echo "<br/>";
}

echo "<br/>";

}
}




echo "===========================================";

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
$best = $row3["Best"];
if($best==1)
{


echo " is the BEST answer";

}

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

if($serverval==1)
{
echo "<br/>";
print( "<a href='aup.php?id=$x'>UP VOTE</a>" );
echo "<->";
print( "<a href='adown.php?id=$x'>DOWN VOTE</a>" );
echo "<br/>";
}


echo "<br/>";

}
echo "<br/>";

if($serveruser=='ADMINISTRATOR')
{

print( "<a href='freeze.php?id=$qid'>FREEZE</a>" );
echo "<br/>";




}

mysql_close();
?>



