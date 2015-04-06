<?php


//get the q parameter from URL
$q=$_GET["q"];

    $array = array();
session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];


$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");






    $query=mysql_query("select * from users where `Username` LIKE '%{$q}%'");
    while($row=mysql_fetch_assoc($query))
    {
     echo  $row['Username'];
     echo "<br/>";
    }
   


?> 