




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
       Questions
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




$sql = "SELECT * FROM question";
$result = mysql_query($sql);

//"Question: %s", $row["Title"]
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
     $best = $row["Bested"];
	$link = $row["QuestionID"];
$askerid = $row["AskerID"];



if($serverid==$askerid && $best==1)
{
  echo"<a href='questionsol.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row["Title"];
    echo"$title";
    echo "<br/>";
}

else if($serverid==$askerid && $best!=1)
{
  echo"<a href='question.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row["Title"];
    echo"$title";
    echo "<br/>";
}


    else
      {echo"<a href='questionans.php?id=$link?win=$best'>".$link."</a>.";
    $title = $row["Title"];
    echo"$title";
    echo "<br/>";
  }
}

mysql_free_result($result);
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
 
        <input type="submit" value="Submit">

    </div>
</form>
  </section>

  
</body>
</html>