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
        
    $results = $con->query("SELECT mst.matchid, mst.roomid, mst.roompassword, mst.type, mst.version, mst.map, mst.maintopbannerimg, mst.iconimg, mst.matchtype, mst.totalplayer, mst.totalplayerjoined, mst.entryfee, mst.winprice, mst.perkill, mst.joinstatus, mst.matchstatus, mst.matchschedule FROM matchmst mst WHERE 1=1 order by mst.matchschedule desc");
        
    echo '<h5>Match Details:</h5>';
    echo '<div class="table-responsive-sm" style="font-size: 15px; line-height: 1.5;">';
    echo '<table class="table table-sm table-bordered table-hover">
        <thead class="thead-dark">
    	 <tr>
    	 <th scope="col">Match ID</th>
    	 <th scope="col">RoomID</th>
     	 <th scope="col">RoomPass</th>
    	 <th scope="col">Type</th>
    	 <th scope="col">Map</th>
    	 <th scope="col">MatchType</th>
    	 <th scope="col">T.Player</th>
    	 <th scope="col">T.PlayerJoined</th>
    	 <th scope="col">Entryfee</th>
     	 <th scope="col">WinPrice</th>
    	 <th scope="col">PerKill</th>
    	 <th scope="col">Status</th>
    	 <th scope="col">MatchTime</th>
    	 </tr>
    	 </thead>';
    	 
    while($rows = $results->fetch_assoc()) {
        // // '2019-03-18 13:00:00'
        // // 12-hour time to 24-hour time 
        // $rtime = $_POST['element_7_1'].':'.$_POST['element_7_2'].':'.$_POST['element_7_3'].' '.$_POST['element_7_4'];
        // $time_in_24_hour_format  = date("H:i:s", strtotime($rtime));
        // 24-hour time to 12-hour time 

        // $matchschedule = $_POST['element_6_3'].'-'.$_POST['element_6_2'].'-'.$_POST['element_6_1'].' '.$time_in_24_hour_format; 
        $matchschedule = $rows['matchschedule'];
        $rdate = substr($matchschedule, 8, 10 - 8).'/'.substr($matchschedule, 5, 7 - 5).'/'.substr($matchschedule, 0, 4 - 0).' ';
        $time_in_12_hour_format  = date("h:i a", strtotime(substr($matchschedule, 11, 13 - 11).':'.substr($matchschedule, 14, 16 - 14)));

    echo '<tbody><tr>
    	 <td>'. $rows['matchid'] .'</td>
    	 <td>'. $rows['roomid'] .'</td>
     	 <td>'. $rows['roompassword'] .'</td>
    	 <td>'. $rows['type'] .'</td>
    	 <td>'. $rows['map'] .'</td>
    	 <td>'. $rows['matchtype'] .'</td>
    	 <td>'. $rows['totalplayer'] .'</td>
    	 <td>'. $rows['totalplayerjoined'] .'</td>
    	 <td>'. $rows['entryfee'] .'</td>
     	 <td>'. $rows['winprice'] .'</td>
    	 <td>'. $rows['perkill'] .'</td>
    	 <td>'. $rows['matchstatus'] .'</td>
    	 
    	 <td>'.$rdate.$time_in_12_hour_format.'</td>
    	 </tr>';
    }
    echo '</tbody></table></div>';
    	 
    echo '</br>';

?>

</body>
</html>