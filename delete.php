<?php
    		$conn = mysqli_connect("ctgplw90pifdso61.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "yfxtv65r19dk2qm0", "rkiww4updt427u90", "hu1al3cymer6fwfu");
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
     
    	
    	$query = mysqli_query($conn, "DELETE FROM insensor") or die(mysqli_error());
    	$query = mysqli_query($conn, "DELETE FROM insensortwo") or die(mysqli_error());
        $query = mysqli_query($conn, "DELETE FROM outsensor") or die(mysqli_error());

        echo "success";

    mysqli_close($conn);
?>
