<?php
    		$conn = mysqli_connect("ctgplw90pifdso61.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "yfxtv65r19dk2qm0", "rkiww4updt427u90", "hu1al3cymer6fwfu");
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
     
    	
    	$query = mysqli_query($conn, "SELECT * FROM outsensor ORDER BY entry_id DESC LIMIT 30") or die(mysqli_error());
    	$row = mysqli_num_rows($query);
        echo "<table style='width: 320px; position: relative; top: 10px' class='w3-table-all'><tr class='w3-green'><th>PM10</th><th>PM2.5</th><th>Time</th><th>Date</th></tr>";
        if($query->num_rows>0){    	
            while($row=$query->fetch_assoc()) {
            echo "<tr class='w3-teal'><td>" . $row["bpm10"]. "</td><td>" . $row["bpm25"]. "</td><td>" . $row["time"]. "</td><td>" . $row["date"]. "</td></tr>";
        }
        echo "</table>";
        //if($row > 0){
    		//echo "success";
    	}else{
    		echo "<div class='w3-teal'><p>No data available for that time/date</p></div>";
    	}
    ?>
