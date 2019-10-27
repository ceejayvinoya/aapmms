<!DOCTYPE html>
<html><body>
<?php

$servername = "ctgplw90pifdso61.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";

$dbname = "hu1al3cymer6fwfu";

$username = "yfxtv65r19dk2qm0";

$password = "rkiww4updt427u90";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, apm25, time FROM insensor ORDER BY id DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>Value 1 (ug/m3)</td> 
        <td>Time</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_apm25 = $row["apm25"];
        $row_time = $row["time"];
      
        echo '<tr> 
                <td>' . $row_apm25 . '</td> 
                <td>' . $row_time . '</td>
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>
