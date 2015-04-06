<?php
session_start();


print( '<a href="index.php">Main Menu</a>' );
echo "<br/>";

$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];

$inputuser = $_POST['user'];

$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");

$sql = "SELECT * FROM `users` WHERE `Username` = '$inputuser'";
$result = mysql_query($sql);

$row = mysql_fetch_array($result);

$name = $row["Username"];
$id = $row["UserID"];
$uscore = $row["UsScore"];
echo "Name:";
echo $name;
echo "<br/>";
echo "User Score:";
echo $uscore;
echo "<br/>";
echo "<br/>";


echo "Avatar:";
$sql23 = "SELECT * FROM `images` WHERE `iuser` = '$id'";

$result23 = mysql_query($sql23);
$result23 = mysql_fetch_assoc($result23);
if(empty($result23))
  {}

else
{
$result23 = $result23['image'];
echo '<img src="data:image/jpeg;base64,' . base64_encode( $result23 ) . '" />';
}






echo "<br/>";
echo "<br/>";
echo "Questions";
echo "<br/>";



$sql = "SELECT * FROM `question` WHERE `AskerID` = '$id'";
$result = mysql_query($sql);


while ($row2 = mysql_fetch_array($result, MYSQL_ASSOC)) {
 $best = $row2["Bested"];
	$link = $row2["QuestionID"];
$askerid = $row2["AskerID"];


$freeze =$row2["frozen"];


if($freeze==0)
{

if($inputuser==$askerid && $best==1)
{
  echo"<a href='questionsol.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row2["Title"];
    $score = $row2["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
    echo "<br/>";
}

else if($inputuser==$askerid && $best!=1)
{
  echo"<a href='question.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row2["Title"];
       $score = $row2["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
     echo "<br/>";
}
}

if($freeze==1)
{
  echo"<a href='questionfrozen.php?id=$link'>".$link."</a>.";
    $title = $row["Title"];
    $score = $row["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
       echo "<br/>";

}

    else
      {echo"<a href='questionans.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row2["Title"];
        $score = $row2["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
       echo "<br/>";
}
}
  
















mysql_close();

?> 
