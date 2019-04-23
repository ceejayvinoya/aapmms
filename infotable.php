    <?php
    		$conn = mysqli_connect("ctgplw90pifdso61.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "yfxtv65r19dk2qm0", "rkiww4updt427u90", "hu1al3cymer6fwfu");


	if(!$conn){
		die("Error: Failed to connect to database!");
	}
     
    	$time = $_POST["time"];
    	$date = $_POST["date"];
   
        $num = strlen((string)$time);

        if($num == 1){
          $time = "0".$time;
        }

    	$query = mysqli_query($conn, "SELECT * FROM insensor WHERE time LIKE '$time:%' AND date LIKE '$date'") or die(mysqli_error());
    	$row = mysqli_num_rows($query);
        echo "<table style='width: 320px; position: relative; top: 10px' class='w3-table-all'><tr class='w3-green'><th>PM10</th><th>PM2.5</th><th>Time</th><th>Date</th></tr>";
        if($query->num_rows>0){    	
            while($row=$query->fetch_assoc()) {
            echo "<tr class='w3-teal'><td>" . $row["apm10"]. "</td><td>" . $row["apm25"]. "</td><td>" . $row["time"]. "</td><td>" . $row["date"]. "</td></tr>";
        }
        echo "</table>";
        //if($row > 0){
    		//echo "success";
    	}else{
    		echo "<div class='w3-teal'><p>No data available for that time/date</p><div>";
    	}
    ?>
