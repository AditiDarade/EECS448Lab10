<?php
$user='a622d311';
$pass='Aiboox4z';
$db='a622d311';
$DbServerURL='mysql.eecs.ku.edu'; //129.237.87.5
//Your DBs are not backed up beyond the scope of this course
//You are capped at 10MB
//You cannot store sensitive information on this server
//You all start with an empty database named the same as your user name

$mysqli = new mysqli($DbServerURL,$user,$pass,$db);
//$db=new mysqli($DbServerURL,$user,$pass,$db) or die("Unable to connect");
/* check connection */
if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$userID=$_POST['userID'];
//first make sure user does not exist buy using select query
$query = "SELECT user_id FROM Users WHERE user_id='".$userID."'";
//echo "query =".$query."\n";
$result = $mysqli->query($query);
if ($result->num_rows > 0) 
{
    printf ("'%s' user Id exist in the database, please enter another one.\n", $userID);
}
else
{
    $query = "INSERT INTO Users(user_id) VALUES ('".$userID."')";
    if ($result = $mysqli->query($query)) 
    {
        printf ("'%s' new user Id created and successfully stored in the database.\n", $userID);
    }
}
//INSERT INTO Users(user_id) VALUES ('')
/* close connection */
$mysqli->close();
//echo "db works got connected"
echo "<br>";
echo "<a href='./CreateUser.html'>Create User.</a><br>";
?>  