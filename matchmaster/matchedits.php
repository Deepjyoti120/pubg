<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (isset($_POST['submit']) && isset($_POST['matchid'])){
            
            //Post Params 
            $matchid = $_POST['matchid']; 
            $roomid = $_POST['roomid'];  
            $roompassword = $_POST['roompassword'];  
            $type = $_POST['type'];  
            $version = $_POST['version'];  
            $map = $_POST['map'];  
            $maintopbannerimg = $_POST['maintopbannerimg'];  
            $iconimg = $_POST['iconimg'];  
            $matchtype = $_POST['matchtype'];  
            $totalplayer = $_POST['totalplayer'];  
            $totalplayerjoined = $_POST['totalplayerjoined'];  
            $entryfee = $_POST['entryfee'];  
            $winprice = $_POST['winprice'];  
            $perkill = $_POST['perkill'];  
            $joinstatus = $_POST['joinstatus'];  
            $matchstatus = $_POST['matchstatus'];  
            
            // '2019-03-18 13:00:00'
            // 12-hour time to 24-hour time 
            $rtime = $_POST['element_7_1'].':'.$_POST['element_7_2'].':'.$_POST['element_7_3'].' '.$_POST['element_7_4'];
            $time_in_24_hour_format  = date("H:i:s", strtotime($rtime));

            $matchschedule = $_POST['element_6_3'].'-'.$_POST['element_6_2'].'-'.$_POST['element_6_1'].' '.$time_in_24_hour_format; 
            // echo 'rajan'.$matchschedule;
            // $log_entdate = $_POST['log_entdate'];

            // include db connect class
            require_once __DIR__ . '/../db_connect.php';
        
            // connecting to db
        	$db = new DB_CONNECT();
        	$conn = $db->connect();
	
	        // mysql inserting a new row
        	$result = mysqli_query($conn,"update matchmst set roomid='$roomid', roompassword='$roompassword', type='$type', version='$version', map='$map', maintopbannerimg='$maintopbannerimg', iconimg='$iconimg', matchtype='$matchtype', totalplayer='$totalplayer', totalplayerjoined='$totalplayerjoined', entryfee='$entryfee', winprice='$winprice', perkill='$perkill', joinstatus='$joinstatus', matchstatus='$matchstatus', matchschedule='$matchschedule' where matchid='$matchid' ");
    	
        	// check if row inserted or not
        	if ($result) {
            	// successfully inserted into database
            // 	$msg = "Match successfully updated"."update matchmst set roomid='$roomid', roompassword='$roompassword', type='$type', version='$version', map='$map', maintopbannerimg='$maintopbannerimg', iconimg='$iconimg', matchtype='$matchtype', totalplayer='$totalplayer', totalplayerjoined='$totalplayerjoined', entryfee='$entryfee', winprice='$winprice', perkill='$perkill', joinstatus='$joinstatus', matchstatus='$matchstatus', matchschedule='$matchschedule' where matchid='$matchid' ";
            // 	echo '<script type="text/javascript">alert("'.$msg.'")</script>';
            	echo '<script type="text/javascript">alert("Match successfully updated")</script>';
            	echo '<script type="text/javascript">location.href = "index.php";</script> ';
        	} else {
            	// failed to insert row
            	alert ("Oops! An error occurred");
        	}

        }
        
    }
?>