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

//get the list of all existing users buy using select query
//SELECT `post_id`, `content`, `author_id` FROM `posts` WHERE 1
$query = "SELECT post_id,content FROM Posts WHERE author_id='".$_POST['userID']."'";
//echo "query =".$query."\n";
$result = $mysqli->query($query);
//$tbl="<table  style='display:true' border='1' ><tbody><tr><td><b>Post (Id)</b></td><td><b>Post</b></td></tr>";
$tbl="<table  style='display:true' border='1' ><tbody><tr><td><b>Post</b></td></tr>";


if ($result->num_rows > 0) 
{
    printf (" The number of the post for the user '%s' in the database: %d.\n\n",$_POST['userID'], $result->num_rows);
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        //$tbl=$tbl."<tr><td>".$row['post_id']."</td><td>".$row['content']."</td></tr>";
        $tbl=$tbl."<tr><td>".$row['content']."</td></tr>";
    }
}
else
{
    printf ("no post for the user in the database.\n");
}
$tbl=$tbl."</tbody></table>";
echo $tbl;
echo "<br>";
echo "<a href='./ViewUserPosts.html'>View User Posts.</a><br>";
echo "<a href='./AdminHome.html'>Admin Home.</a><br>";
/* close connection */
$mysqli->close();

?>  