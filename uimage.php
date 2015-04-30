<html>
<head>
		<title>Upload an image</title>
</head>
<body>

<form action="uimage.php" method="POST" enctype="multipart/form-data">
	File:
	<input type="file" name="image"> <input type="submit" value="Upload">
</body>
</html>

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




$file = $_FILES['image']['tmp_name'];



if(!isset($file))
echo "Please select an image.";


else
{

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);
$image_size = getimagesize($_FILES['image']['tmp_name']);


if($image_size==FALSE)
	echo "that's not an image.";

else
{
$delete ="DELETE FROM `images` WHERE `iuser` = '$serverid'";


$result44 = mysql_query($delete);


$insert = "INSERT INTO images (iuser,iname, image)
VALUES ( '$serverid','$image_name','$image')";

$result = mysql_query($insert);
echo "did it";
header('Loaction: profile.php');
}


}







?>