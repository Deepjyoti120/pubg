<?php
// include db connect class
        require_once __DIR__ . '/../db_connect.php';

	    // connecting to db
		$db = new DB_CONNECT();
		$con = $db->connect();

		 if(isset($_POST['suserid']) && isset($_POST['smatchid']) && isset($_POST['swonamount']) && isset($_POST['skills']) && isset($_POST['swon'])){
			$query = "update matchdetail set wonamount='" . $_POST['swonamount'] . "' , kills='" . $_POST['skills'] . "' , won='" . $_POST['swon'] . "' where userid='" . $_POST['suserid'] . "' and matchid='" . $_POST['smatchid'] . "' ;";
			$status = $con->query($query);
			
			date_default_timezone_set("Asia/Calcutta");
	        $cur = date("Y-m-d H:i:s");
			$queryupdatebal = "INSERT INTO usertransaction (trnid, userid, amount, type, paytmnumber, instaorderid, instatxnid, instapaymentid, instatoken, status, log_entdate) VALUES (NULL, '" . $_POST['suserid'] . "', '" . $_POST['swonamount'] . "', '1', NULL, NULL, NULL, NULL, NULL, 'MatchWinning#" . $_POST['smatchid'] . "', '$cur')";
			$statusupdatebal = $con->query($queryupdatebal);
			
			if($status) {
			echo '<tr id="'. $_POST['suserid'] .'">' .
			 '<td class="editable" id="suserid">'. $_POST['suserid'] . '</td>' .
			 '<td class="editable" id="sfirstname">'. $_POST['sfirstname'] . '</td>' .
			 '<td class="editable" id="slastname">'. $_POST['slastname'] . '</td>' . 
 			 '<td class="editable" id="susername">'. $_POST['susername'] . '</td>' .
			 '<td class="editable" id="spubgusername">'. $_POST['spubgusername'] . '</td>' .
			 '<td class="editable" id="smatchid">'. $_POST['smatchid'] . '</td>' .
			 '<td class="editable" id="swonamount">'. $_POST['swonamount'] . '</td>' .
			 '<td class="editable" id="skills">'. $_POST['skills'] . '</td>' .
			 '<td class="editable" id="swon">'. $_POST['swon'] . '</td>' .
			 '<td class="link"><a onclick="setEditable('. $_POST['suserid'] .')" class="editLink" alt="Edit" name="Edit"><img class="linkImage" src="edit.png" / >Edit</a></td>' .
			 '</tr>';
			}
		}
		else echo 'Nothing found';
?>