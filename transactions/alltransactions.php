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
        
    $results = $con->query("SELECT trn.trnid, trn.userid, usr.firstname, usr.lastname, usr.username, trn.amount, trn.type, trn.paytmnumber, trn.instaorderid, trn.instatxnid, trn.instapaymentid, trn.instatoken, trn.status, DATE_FORMAT(trn.log_entdate, '%Y-%m-%d %h:%i:%s %p') as log_entdate FROM usertransaction trn
        inner join user usr on usr.userid=trn.userid
        WHERE 1=1 order by trn.log_entdate desc");
        
    echo '<h5>Transactions:</h5>';
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

?>

</body>
</html>