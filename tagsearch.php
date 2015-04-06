



<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Homepage</title>
  <link rel="stylesheet" href="css/style.css">
 
</head>
<body>
  
      <h1>Tag search</h1>

        <br>
    
      <br>
       Questions
       <br>
    </div>
</form>
  </section>

  
</body>
</html>








<?php


$tag = $_GET['id'];

session_start();
$serveruser = $_SESSION['serveruser'];

$serverpass = $_SESSION['serverpass'];

$serverid = $_SESSION['serverid'];


$user = 'user';
$user1 = 'admin';
$password = '5pR1nG2OlS';
$connect =mysql_connect("localhost",$user1,$password);
@mysql_select_db($user) or die ("Database not found");



$sql2 = "SELECT * FROM `tags` WHERE `Tag` = '$tag'";
$result2 = mysql_query($sql2);

while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
{

     $question = $row2["QuestionNum"];
$sql = "SELECT * FROM `question` WHERE `QuestionID` = '$question'";
$result = mysql_query($sql);



$row = mysql_fetch_array($result, MYSQL_ASSOC);
     $best = $row["Bested"];
  $link = $row["QuestionID"];
$askerid = $row["AskerID"];


$freeze =$row["frozen"];


if($freeze==0)
{

if($serverid==$askerid && $best==1)
{
  echo"<a href='questionsol.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row["Title"];
    $score = $row["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
    echo "<br/>";
}

else if($serverid==$askerid && $best!=1)
{
  echo"<a href='question.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row["Title"];
       $score = $row["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
    echo "<br/>";
}


    else
      {echo"<a href='questionans.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row["Title"];
        $score = $row["Qscore"];
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

}

//mysql_free_result($result);
mysql_close();


print( '<a href="index.php">Top 5 Questions</a>' );
echo "<br/>";
print( '<a href="profile.php">PROFILE</a>' );
echo "<br/>";



?> 



<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 
  <link rel="stylesheet" href="css/style.css">
 
</head>
<body>


<br>
  Make your own question

<br>
   <form action="Ask.php" method="post" >


   <textarea rows="1" cols="30" name="Title">
Type title here
</textarea> 

<br>
 <textarea rows="4" cols="30" name="Content">
Type question here
</textarea> 
<br>
   <textarea rows="1" cols="30" name="Tags">
Type tags leaving spaces in between
</textarea> 

<br>
 
        <input type="submit" value="Submit">

    </div>
</form>
  </section>

  
</body>
</html>