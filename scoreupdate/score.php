<html>

<head>
<title>Player's Match Score Update</title>
<style>
/* bootstrap.css */
* {
   font-size: 15px;
   line-height: 1.5;
}
table
{
	border-collapse: collapse;
	border: 1px solid #0098D3;
}
th 
{
	padding:5px;
	background:#0098D3;
	color:#FFF;
}
td
{
	border: 1px solid #0098D3;
	color:gray;
}

.editLink,.updateLink
{
	text-decoration:underline;
	color:blue;
}
.editLink:hover , .updateLink:hover
{
	text-decoration:none;
	cursor:pointer;
}


.linkImage
{
	float:left;
}
</style>
<script src="jquery.js"></script>
<script language="javascript">
function setEditable(row_id){
	var tr = document.getElementById(row_id);
	var tr_elements = $("#" + row_id).find(".editable");
	
	for( var i = 0; i<tr_elements.length; i++){ // set the row td's Editible
	    if(i>5) {
		tr_elements[i].contentEditable = "true";
		tr_elements[i].style.color="blue";
	    }
	}	
	var updateLinkHTML = "<a onclick='editStudent(" + row_id + ")' class='updateLink' ><img class='linkImage' src='update.png' />Update</a>";
				
	$("#" + row_id).find(".editLink").fadeOut('slow' ,function(){$(this).replaceWith(updateLinkHTML).fadeIn()});
// 	alert('Row is now editibale edit it and click Update to Save');
}

function editStudent(row_id){
	var suserid = $("#" + row_id).find(".editable")[0].textContent;
	var sfirstname = $("#" + row_id).find(".editable")[1].textContent;
	var slastname = $("#" + row_id).find(".editable")[2].textContent;
	var susername = $("#" + row_id).find(".editable")[3].textContent;
	var spubgusername = $("#" + row_id).find(".editable")[4].textContent;
	var smatchid = $("#" + row_id).find(".editable")[5].textContent;
	var swonamount = $("#" + row_id).find(".editable")[6].textContent;
	var skills = $("#" + row_id).find(".editable")[7].textContent;
	var swon = $("#" + row_id).find(".editable")[8].textContent;
	
    $.post("editScore.php" , {suserid:suserid,sfirstname:sfirstname,slastname:slastname,susername:susername,spubgusername:spubgusername,smatchid:smatchid,swonamount:swonamount,skills:skills,swon:swon} , function(data){
    			$("#result").html(data);
    			$("#" + row_id).fadeOut('slow' , function(){$(this).replaceWith(data).fadeIn('slow');});
    		} );
}
</script>
</head>
<?php
    // include db connect class
    require_once __DIR__ . '/../db_connect.php';

    // connecting to db
	$db = new DB_CONNECT();
	$con = $db->connect();
    
    if(isset($_POST['matchid'])) {
    $matchid = $_POST['matchid'];
	$result = $con->query("SELECT ur.userid,ur.firstname,ur.lastname,ur.username,ur.pubgusername,dtl.matchid,dtl.wonamount,dtl.kills,dtl.won FROM matchdetail dtl 
        INNER JOIN user ur on ur.userid=dtl.userid
        WHERE dtl.matchid='$matchid'");
        
    $results = $con->query("SELECT mst.matchid, mst.roomid, mst.roompassword, mst.type, mst.version, mst.map, mst.maintopbannerimg, mst.iconimg, mst.matchtype, mst.totalplayer, mst.totalplayerjoined, mst.entryfee, mst.winprice, mst.perkill, mst.joinstatus, mst.matchstatus, mst.matchschedule FROM matchmst mst WHERE mst.matchid='$matchid'");
        
    echo '<h5>Match Details:</h5>';
    echo '<div class="table-responsive-sm">';
    echo '<table class="table table-sm table-bordered table-hover">
        <thead class="thead-dark">
		 <tr>
		 <th scope="col">Match ID</th>
		 <th scope="col">RoomID</th>
 		 <th scope="col">RoomPassword</th>
		 <th scope="col">Type</th>
		 <th scope="col">Map</th>
		 <th scope="col">MatchType</th>
		 <th scope="col">TotalPlayer</th>
		 <th scope="col">TotalPlayerJoined</th>
		 <th scope="col">Entryfee</th>
 		 <th scope="col">WinPrice</th>
		 <th scope="col">PerKill</th>
		 <th scope="col">Status</th>
		 <th scope="col">ScheduleTime</th>
		 </tr>
		 </thead>';
		 
    while($rows = $results->fetch_assoc()) {
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
		 <td>'. $rows['matchschedule'] .'</td>
		 </tr>';
    }
    echo '</tbody></table></div>';
		 
    echo '</br>';
    
    echo '<h5>Update Score Details:</h5>';
    echo '<div class="table-responsive-sm">';
	echo '<table class="table table-sm table-bordered table-hover">
	    <thead class="thead-dark">
		 <tr>
		 <th scope="col">User ID</th>
		 <th scope="col">FirstName</th>
 		 <th scope="col">LastName</th>
		 <th scope="col">UserName</th>
		 <th scope="col">PUBG_UserName</th>
		 <th scope="col">Match ID</th>
		 <th scope="col">Won Amount</th>
		 <th scope="col">No of Kills</th>
		 <th scope="col">Won(Y/N)</th>
		 </tr>
		 </thead>';
	  while($row = $result->fetch_assoc()) {
		echo '<tbody><tr id="'. $row['userid'] .'">' .
			 '<td class="editable" id="suserid">'. $row['userid'] . '</td>' .
			 '<td class="editable" id="sfirstname">'. $row['firstname'] . '</td>' .
			 '<td class="editable" id="slastname">'. $row['lastname'] . '</td>' . 
 			 '<td class="editable" id="susername">'. $row['username'] . '</td>' .
			 '<td class="editable" id="spubgusername">'. $row['pubgusername'] . '</td>' .
			 '<td class="editable" id="smatchid">'. $row['matchid'] . '</td>' .
			 '<td class="editable" id="swonamount">'. $row['wonamount'] . '</td>' .
			 '<td class="editable" id="skills">'. $row['kills'] . '</td>' .
			 '<td class="editable" id="swon">'. $row['won'] . '</td>' .
			 '<td class="link"><a onclick="setEditable('. $row['userid'] .')" class="editLink" alt="Edit" name="Edit"><img class="linkImage" src="edit.png" / >Edit</a></td>' .
			 '</tr>';
	  }
	  echo '</tbody></table></div>';
    }
?>