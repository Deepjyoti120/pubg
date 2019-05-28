<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // if (isset($_POST['submit'])){
            
            //Post Params 
            $matchid = $_POST['matchid'];  

            // include db connect class
            require_once __DIR__ . '/../db_connect.php';
        
            // connecting to db
        	$db = new DB_CONNECT();
        	$conn = $db->connect();
	
	        // POST all iid from users table
        	$results = mysqli_query($conn,"delete FROM matchmst WHERE matchid='$matchid' ") or die(mysql_error());

        	// check if row inserted or not
        	if ($results) {
            	// successfully inserted into database
            	$msg = "Match#".$matchid." deleted successfully";
            	echo '<script type="text/javascript">alert("'.$msg.'")</script>';
        	} else {
            	// failed to insert row
            	alert ("Oops! An error occurred");
        	}
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    
</body>
</html>

