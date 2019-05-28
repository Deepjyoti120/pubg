<html>

<head>
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
</head>
<?php
    // include db connect class
    require_once __DIR__ . '/../db_connect.php';

    // connecting to db
	$db = new DB_CONNECT();
	$con = $db->connect();
    
    if(isset($_POST['userid'])) {
    $userid = $_POST['userid'];
        
    $result = $con->query("SELECT balance FROM userbalance WHERE userid='$userid' ");
        
    while($row = $result->fetch_assoc()) {
        
    echo '<h7>Player\'s current balance is: ₹'.$row['balance'].'</h7>';
    
    }
    echo '</br></br>';

    $results = $con->query("SELECT trn.trnid, trn.userid, usr.firstname, usr.lastname, usr.username, trn.amount, trn.type, trn.paytmnumber, trn.instaorderid, trn.instatxnid, trn.instapaymentid, trn.instatoken, trn.status, DATE_FORMAT(trn.log_entdate, '%Y-%m-%d %h:%i:%s %p') as log_entdate FROM usertransaction trn
        inner join user usr on usr.userid=trn.userid
        WHERE usr.userid='$userid' order by trn.log_entdate desc");
        
    echo "<h5>Player's Transactions:</h5>";
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
    echo '<tbody><tr>
    	 <td>'. $rows['trnid'] .'</td>
    	 <td>'. $rows['userid'] .'</td>
    	 <td>'. $rows['firstname'] .'</td>
     	 <td>'. $rows['lastname'] .'</td>
    	 <td>'. $rows['username'] .'</td>
    	 <td>'. $rows['amount'] .'</td>
    	 <td>'. $ttype .'</td>
    	 <td>'. $rows['paytmnumber'] .'</td>
    	 <td>'. $rows['status'] .'</td>
    	 <td>'. $rows['log_entdate'] .'</td>
    	 </tr>';
    }
    echo '</tbody></table></div>';
    	 
    echo '</br>';
    
    }
?>