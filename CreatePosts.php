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

/* check connection */
if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$userID=$_POST['userID'];
$userPost=$_POST['userPost'];
//first make sure user exist buy using select query
$query = "SELECT user_id FROM Users WHERE user_id='".$userID."'";
//echo "query =".$query."\n";
$result = $mysqli->query($query);
if ($result->num_rows > 0) 
{
    $query = "INSERT INTO Posts(content, author_id) VALUES ('".$userPost."','".$userID."')";
    if ($result = $mysqli->query($query)) 
    {
        printf (" The post for the user '%s' stored in the database successfully.\n", $userID);
    }
}
else
{
    printf ("'%s' user Id does not exist in the data base.\n", $userID);
    printf ("first create new user and then try to save poost.\n");
}
/* close connection */
$mysqli->close();
echo "<br>";
echo "<a href='./CreatePosts.html'>Create Posts.</a><br>";
?>  