<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
//connect
$link = mysqli_connect("192.168.2.9", "root", "dbserver", "db");
//mysql_selectdb('db');

// check connection
if (mysqli_connect_error()) {
    printf("Connect failed: %s\n", mysql_error());
    exit();
}

//perform simple query
if ($result = mysqli_query($link, "SELECT * FROM users"))
{
	if(mysqli_num_rows($result)) echo "SUCCESS";
    mysqli_free_result($result);
}

//close
mysqli_close($link);
?>

