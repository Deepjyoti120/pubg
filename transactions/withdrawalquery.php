<?php
// include db connect class
	    require_once __DIR__ . '/../db_connect.php';

	    // connecting to db
		$db = new DB_CONNECT();
		$con = $db->connect();
	
		 if(isset($_POST['strnid']) && isset($_POST['suserid']) && isset($_POST['sfirstname']) && isset($_POST['slastname']) && isset($_POST['susername'])){
			$query = "update usertransaction set status='" . $_POST['sstatus'] . "' where trnid='" . $_POST['strnid'] . "' ;";
			$status = $con->query($query);
			
			if($status) {
			echo '<tr id="'. $_POST['strnid'] .'">
            	 <td class="editable">'. $_POST['strnid'] .'</td>
            	 <td class="editable">'. $_POST['suserid'] .'</td>
            	 <td class="editable">'. $_POST['sfirstname'] .'</td>
             	 <td class="editable">'. $_POST['slastname'] .'</td>
            	 <td class="editable">'. $_POST['susername'] .'</td>
            	 <td class="editable">'. $_POST['samount'] .'</td>
            	 <td class="editable">'. $_POST['stype'] .'</td>
            	 <td class="editable">'. $_POST['spaytmnumber'] .'</td>
            	 <td class="editable">'. $_POST['sstatus'] .'</td>
            	 <td class="editable">'. $_POST['slog_entdate'] .'</td>
         		 <td class="link"><a onclick="setEditable('. $_POST['strnid'] .')" class="editLink" alt="Edit" name="Edit"><img class="linkImage" src="edit.png" / >Edit</a></td>
            	 </tr>';
			}
		}
		else echo 'Nothing found';
?>