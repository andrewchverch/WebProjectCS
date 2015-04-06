





<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Homepage</title>
  <link rel="stylesheet" href="css/style.css">
 
</head>
<body>
  
      <h1>Welcome to the Site where the Toughest Questions are Answered</h1>

        <br>
    
      <br>
       Top 5 Questions
       <br>
    </div>
</form>
  </section>

  
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




$sql = "SELECT * FROM `question` ORDER BY `Qscore` DESC LIMIT 5";
$result = mysql_query($sql);

//"Question: %s", $row["Title"]
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
     $best = $row["Bested"];
  $link = $row["QuestionID"];
$askerid = $row["AskerID"];
$freeze =$row["frozen"];


if($freeze==0)
{

if($best==1)
{
  echo"<a href='questionsol.php?id=$link'>".$link."</a>.";
    $title = $row["Title"];
    $score = $row["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
    echo "<br/>";
}

else if($serverid==$askerid && $best!=1)
{
  echo"<a href='question.php?id=$link'>".$link."</a>.";
    $title = $row["Title"];
       $score = $row["Qscore"];
    echo"$title ";
    echo "Score:";
     echo "$score";
    echo "<br/>";
}


    else
      {echo"<a href='questionans.php?id=$link'>".$link."</a>.";
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

mysql_free_result($result);
mysql_close();


print( '<a href="Archive.php">Other Questions</a>' );
echo "<br/>";
print( '<a href="profile.php">PROFILE</a>' );
echo "<br/>";
print( '<a href="login.php">LOGIN</a>' );
echo "<br/>";
if($serveruser=='ADMINISTRATOR')
{

print( '<a href="adminspage.php">administrator look up</a>' );
echo "<br/>";




}
else
{



print( '<a href="lookup.php">User look up</a>' );
echo "<br/>";


}


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
