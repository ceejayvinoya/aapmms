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
        <td>ID</td> 
        <td>Value 1</td> 
        <td>Time</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_apm25 = $row["apm25"];
        $row_time = $row["time"]; 
        
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
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
