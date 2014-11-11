<?php

mysql_connect('192.168.2.9', 'root','dbserver')or die("Could not connect: " . mysql_error());

mysql_select_db("db");

$result = mysql_query("SELECT * FROM users");

echo '<html><body><center><h7>(Secondary Server)</h7><br/><br/><table border="1" style="width:50%">
<tr><th>Name</th><th>Roll No.</th></tr>';
while($row = mysql_fetch_array($result))
{
    echo '<tr>
        <td><center>'.$row['name'].'</center></td>
        <td><center>'.strval($row['roll']).'</center></td>
    </tr>';
}
echo '</table></center></body></html>';
?>


