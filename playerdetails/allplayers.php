<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>

</style>
</head>
<body>
    
<?php
// include db connect class
require_once __DIR__ . '/../db_connect.php';

// connecting to db
$db = new DB_CONNECT();
$con = $db->connect();
        
    $results = $con->query("SELECT usr.userid, usr.firstname, usr.lastname, usr.username, usr.pubgusername, usr.gender, usr.email, usr.mobile, usr.password, usr.other, usr.promocode, usr.log_entdate FROM user usr WHERE 1=1 order by usr.log_entdate desc");
        
    // echo '<h5>Match Details:</h5>';
    echo '<div class="table-responsive-sm" style="font-size: 15px; line-height: 1.5;">';
    echo '<table class="table table-sm table-bordered table-hover">
        <thead class="thead-dark">
    	 <tr>
    	 <th scope="col">UserID</th>
    	 <th scope="col">FirstName</th>
     	 <th scope="col">LastName</th>
    	 <th scope="col">Username</th>
    	 <th scope="col">PUBGUsernm</th>
    	 <th scope="col">Gendar</th>
    	 <th scope="col">Email</th>
    	 <th scope="col">Mobile</th>
    	 <th scope="col">Password</th>
     	 <th scope="col">Other</th>
    	 <th scope="col">Promocode</th>
    	 <th scope="col">Reg.Date</th>
    	 </tr>
    	 </thead>';
    	 
    while($rows = $results->fetch_assoc()) {
        // // '2019-03-18 13:00:00'
        // // 12-hour time to 24-hour time 
        // $rtime = $_POST['element_7_1'].':'.$_POST['element_7_2'].':'.$_POST['element_7_3'].' '.$_POST['element_7_4'];
        // $time_in_24_hour_format  = date("H:i:s", strtotime($rtime));
        // 24-hour time to 12-hour time 

        // $matchschedule = $_POST['element_6_3'].'-'.$_POST['element_6_2'].'-'.$_POST['element_6_1'].' '.$time_in_24_hour_format; 
        $log_entdate = $rows['log_entdate'];
        $rdate = substr($log_entdate, 8, 10 - 8).'/'.substr($log_entdate, 5, 7 - 5).'/'.substr($log_entdate, 0, 4 - 0).' ';
        $time_in_12_hour_format  = date("h:i a", strtotime(substr($log_entdate, 11, 13 - 11).':'.substr($log_entdate, 14, 16 - 14)));

    echo '<tbody><tr>
    	 <td>'. $rows['userid'] .'</td>
    	 <td>'. $rows['firstname'] .'</td>
     	 <td>'. $rows['lastname'] .'</td>
    	 <td>'. $rows['username'] .'</td>
    	 <td>'. $rows['pubgusername'] .'</td>
    	 <td>'. $rows['gender'] .'</td>
    	 <td>'. $rows['email'] .'</td>
    	 <td>'. $rows['mobile'] .'</td>
    	 <td>'. $rows['password'] .'</td>
     	 <td>'. $rows['other'] .'</td>
    	 <td>'. $rows['promocode'] .'</td>
    	 <td>'.$rdate.$time_in_12_hour_format.'</td>
    	 </tr>';
    }
    echo '</tbody></table></div>';
    	 
    echo '</br>';

?>

</body>
</html>