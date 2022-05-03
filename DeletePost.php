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
echo "Post ids of deleted post:\n";
$tbl="<table  style='display:true' border='1' ><tbody><tr><td><b>post ids</b></td></tr>";
if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
if(!empty($_POST['chkPostId'])) 
{
    foreach($_POST['chkPostId'] as $chkPostId) 
    {
        $query = "DELETE FROM Posts WHERE post_id=".$chkPostId;
        if ( $mysqli->query($query) === TRUE) 
        {
            //echo "Record deleted successfully";
            $tbl=$tbl."<tr><td>".$chkPostId."</td></tr>";
        } else 
        {
            echo "Error deleting record: " .  $mysqli->error;
        }
        //echo $chkPostId."\n"; //echoes the value set in the HTML form for each checked checkbox.
        
    }
}
$tbl=$tbl."</tbody></table>";
echo $tbl;
echo "<br>";
echo "<a href='./DeletePost.html'>View User Posts.</a><br>";
echo "<a href='./AdminHome.html'>Admin Home.</a><br>";
/* close connection */
$mysqli->close();
//echo "db works got connected"
?>  