
<?php
session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];


$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");




$sql = "SELECT * FROM question";
$result = mysql_query($sql);

//"Question: %s", $row["Title"]
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
     $best = $row["Bested"];
	$link = $row["QuestionID"];
    echo"<a href='questionans.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row["Title"];
    echo"$title";
    echo "<br/>";
}

mysql_free_result($result);
mysql_close();
?> 



