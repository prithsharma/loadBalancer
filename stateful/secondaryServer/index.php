<?php

mysql_connect('192.168.2.9', 'root','dbserver')or die("Could not connect: " . mysql_error());

mysql_select_db("db");

if(isset($_GET['submit']))
{
    $name = $_GET['name'];
    $roll = $_GET['roll'];
    if(mysql_query("INSERT INTO users (name, roll) VALUES ('$name', '$roll')"))
    echo '<center>Registration successful</center>';
    else
    echo '<center>Couldn\'t register</center>';
    //header("location:home.php?action");
}
        
?>

<html>

    <head>
        <title> Simple Registration </title>

    </head>

    <body>

        <center><form id="register" method="GET" action="http://192.168.2.3/stateful">

            <h1>Registration Portal</h1><h7>(Secondary Server)</h7>
        <br/> <br/>

            <input type="text" placeholder="your name" name="name" autofocus />
            <input type="text" placeholder="your roll no." name="roll" autofocus />
            <button type="submit" name="submit">Register</button>

            <span></span>

        </form>
    <br/><p><a href='http://192.168.2.3/stateful?listAll.php'>List all students</a></p>    
    </center>

        
    </body>
</html>


