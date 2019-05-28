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
	
	for( var i = 0; i<tr_elements.length; i++){ 
	    // set the row td's Editible
	    if(i==8) {
		tr_elements[i].contentEditable = "true";
		tr_elements[i].style.color="blue";
	    }
	}	
	var updateLinkHTML = "<a onclick='editStudent(" + row_id + ")' class='updateLink' ><img class='linkImage' src='update.png' />Update</a>";
				
	$("#" + row_id).find(".editLink").fadeOut('slow' ,function(){$(this).replaceWith(updateLinkHTML).fadeIn()});
	alert('Update Remark status pending/successfully done');
}

function editStudent(row_id){
	var strnid = $("#" + row_id).find(".editable")[0].textContent;
	var suserid = $("#" + row_id).find(".editable")[1].textContent;
	var sfirstname = $("#" + row_id).find(".editable")[2].textContent;
	var slastname = $("#" + row_id).find(".editable")[3].textContent;
	var susername = $("#" + row_id).find(".editable")[4].textContent;
	var samount = $("#" + row_id).find(".editable")[5].textContent;
	var stype = $("#" + row_id).find(".editable")[6].textContent;
	var spaytmnumber = $("#" + row_id).find(".editable")[7].textContent;
	var sstatus = $("#" + row_id).find(".editable")[8].textContent;
	var slog_entdate = $("#" + row_id).find(".editable")[9].textContent;
	
    $.post("withdrawalquery.php" , {strnid:strnid,suserid:suserid,sfirstname:sfirstname,slastname:slastname,susername:susername,samount:samount,stype:stype,spaytmnumber:spaytmnumber,sstatus:sstatus,slog_entdate:slog_entdate} , function(data){
    			$("#result").html(data);
    			$("#" + row_id).fadeOut('slow' , function(){$(this).replaceWith(data).fadeIn('slow');});
    		} );
}
</script>
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
        
    $results = $con->query("SELECT trn.trnid, trn.userid, usr.firstname, usr.lastname, usr.username, trn.amount, trn.type, trn.paytmnumber, trn.instaorderid, trn.instatxnid, trn.instapaymentid, trn.instatoken, trn.status, DATE_FORMAT(trn.log_entdate, '%Y-%m-%d %h:%i:%s %p') as log_entdate FROM usertransaction trn
        inner join user usr on usr.userid=trn.userid
        WHERE trn.status like '%Withdrawal%' order by trn.log_entdate desc");
        
    echo '<h5>All Withdrawal Transactions:</h5>';
    echo '<div class="table-responsive-sm" style="font-size: 11px; line-height: 0.8;">';
    echo '<table class="table table-sm table-bordered table-hover">
        <thead class="thead-dark">
    	 <tr>
    	 <th scope="col">TrnID</th>
    	 <th scope="col">UserID</th>
     	 <th scope="col">FirstName</th>
    	 <th scope="col">LastName</th>
    	 <th scope="col">UserName</th>
    	 <th scope="col">Amount</th>
    	 <th scope="col">Type</th>
    	 <th scope="col">PaytmNumber</th>
    	 <th scope="col">Remark</th>
    	 <th scope="col">DateTime</th>
    	 </tr>
    	 </thead>';
    	 
    while($rows = $results->fetch_assoc()) {

    $ttype;
    if($rows['type'] ==0) {
        $ttype= "Debit";
    } else {
        $ttype= "Credit";
    }
    echo '<tbody><tr id="'. $rows['trnid'] .'">
    	 <td class="editable">'. $rows['trnid'] .'</td>
    	 <td class="editable">'. $rows['userid'] .'</td>
    	 <td class="editable">'. $rows['firstname'] .'</td>
     	 <td class="editable">'. $rows['lastname'] .'</td>
    	 <td class="editable">'. $rows['username'] .'</td>
    	 <td class="editable">'. $rows['amount'] .'</td>
    	 <td class="editable">'. $ttype .'</td>
    	 <td class="editable">'. $rows['paytmnumber'] .'</td>
    	 <td class="editable">'. $rows['status'] .'</td>
    	 <td class="editable">'. $rows['log_entdate'] .'</td>
 		 <td class="link"><a onclick="setEditable('. $rows['trnid'] .')" class="editLink" alt="Edit" name="Edit"><img class="linkImage" src="edit.png" / >Edit</a></td>
    	 </tr>';
    }
    echo '</tbody></table></div>';
    	 
    echo '</br>';

?>

</body>
</html>