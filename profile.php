<?php
session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];
$serverval = $_SESSION['serverval'];
$email = $_SESSION['email'];

print( '<a href="index.php">Top 5 Questions</a>' );
echo "<br/>";


$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");

$sql = "SELECT * FROM `users` WHERE `UserID` = '$serverid'";
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
$sql23 = "SELECT * FROM `images` WHERE `iuser` = '$serverid'";

$result23 = mysql_query($sql23);
$result23 = mysql_fetch_assoc($result23);
if(empty($result23))
	print( '<a href="newimage.php">insert avatar</a>' );

else
{
$result23 = $result23['image'];
echo '<img src="data:image/jpeg;base64,' . base64_encode( $result23 ) . '" />';
echo "<br/>";
print( '<a href="uimage.php">insert avatar</a>' );
}
echo "<br/>";
  print( '<a href="gravatar.php">insert gravatar avatar</a>' );

echo "<br/>";
echo "<br/>";
echo "Questions";
echo "<br/>";



$sql = "SELECT * FROM `question` WHERE `AskerID` = '$serverid'";
$result = mysql_query($sql);


while ($row2 = mysql_fetch_array($result, MYSQL_ASSOC)) {
 $best = $row2["Bested"];
	$link = $row2["QuestionID"];
$askerid = $row2["AskerID"];



if($serverid==$askerid && $best==1)
{
  echo"<a href='questionsol.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row2["Title"];
    $score = $row2["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
    echo "<br/>";
}

else if($serverid==$askerid && $best!=1)
{
  echo"<a href='question.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row2["Title"];
       $score = $row2["Qscore"];
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
