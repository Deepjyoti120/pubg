<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // if (isset($_POST['submit'])){
            
            //Post Params 
            // $matchid = $_POST['matchid'];  
            // $roomid = $_POST['roomid'];  
            // $roompassword = $_POST['roompassword'];  
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
        	$result = mysqli_query($conn,"INSERT INTO `matchmst` (`matchid`, `roomid`, `roompassword`, `type`, `version`, `map`, `maintopbannerimg`, `iconimg`, `matchtype`, `totalplayer`, `totalplayerjoined`, `entryfee`, `winprice`, `perkill`, `joinstatus`, `matchstatus`, `matchschedule`, `log_entdate`) VALUES
                (NULL, NULL, NULL, '$type', '$version', '$map', '$maintopbannerimg', '$iconimg', '$matchtype', '$totalplayer', '$totalplayerjoined', '$entryfee', '$winprice', '$perkill', '$joinstatus', '$matchstatus', '$matchschedule', NULL)");
    	
        	// check if row inserted or not
        	if ($result) {
            	// successfully inserted into database
            	$msg = "Match successfully created and its ID is". mysqli_insert_id($conn);
            	echo '<script type="text/javascript">alert("'.$msg.'")</script>';
        	} else {
            	// failed to insert row
            	alert ("Oops! An error occurred");
        	}

        // }
        
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>New Match Entry Form</title>
      <link rel="stylesheet" type="text/css" href="view.css" media="all">
      <script type="text/javascript" src="view.js"></script>
      <script type="text/javascript" src="calendar.js"></script>
   </head>
   <body id="main_body" >
      <!--<img id="top" src="top.png" alt="">-->
      <div id="form_container">
         <!--<h1><a>New Match Entry Form</a></h1>-->
         <form id="form_55554" class="appnitro"  method="post" action="">
            <div class="form_description">
               <h2>New Match Creation Form</h2>
               <p>Using this you can schedule a new match</p>
            </div>
            <ul >
               <li id="li_8" >
                  <label class="description" for="element_8">Type </label>
                  <div>
                     <select class="element select medium" id="type" name="type">
                        <option value="SOLO" selected="selected">SOLO</option>
                        <option value="DUO" >DUO</option>
                        <option value="SQUAD" >SQUAD</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_8"><small>type - select how many team players in single team.</small></p>
               </li>
               <li id="li_9" >
                  <label class="description" for="element_9">Version </label>
                  <div>
                     <select class="element select medium" id="version" name="version">
                        <option value="1.0" selected="selected" >1.0</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_9"><small>version - 1.0 select for default</small></p>
               </li>
               <li id="li_10" >
                  <label class="description" for="element_10">Map </label>
                  <div>
                     <select class="element select medium" id="map" name="map">
                        <option value="Erangel" selected="selected">Erangel</option>
                        <option value="Miramar" >Miramar</option>
                        <option value="Vikendi" >Vikendi</option>
                        <option value="Sanhok" >Sanhok</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_10"><small>map</small></p>
               </li>
               <li id="li_11" >
                  <label class="description" for="element_11">Main top banner img </label>
                  <div>
                     <select class="element select medium" id="maintopbannerimg" name="maintopbannerimg">
                        <option value="4kwallpapers.jpg" selected="selected">4kwallpapers.jpg</option>
                        <option value="wp.jpg" >wp.jpg</option>
                        <option value="battlegrounds.jpg" >battlegrounds.jpg</option>
                        <option value="background.jpg" >background.jpg</option>
                        <option value="hdwallpapers.png" >hdwallpapers.png</option>
                        <option value="mobilewallpapers.jpg" >mobilewallpapers.jpg</option>
                        <option value="videosmall.jpg" >videosmall.jpg</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_11"><small>maintopbannerimg - Top banner image</small></p>
               </li>
               <li id="li_12" >
                  <label class="description" for="element_12">Icon img </label>
                  <div>
                     <select class="element select medium" id="iconimg" name="iconimg">
                        <option value="circlesmall.png" selected="selected">circlesmall.png</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_12"><small>iconimg - select default its app icon</small></p>
               </li>
               <li id="li_13" >
                  <label class="description" for="element_13">Match type </label>
                  <div>
                     <select class="element select medium" id="matchtype" name="matchtype">
                        <option value="Paid" selected="selected">Paid</option>
                        <option value="Free" >Free</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_13"><small>matchtype</small></p>
               </li>
               <li id="li_1" >
                  <label class="description" for="element_1">Totalplayer </label>
                  <div>
                     <input id="totalplayer" name="totalplayer" class="element text medium" type="text" maxlength="255" value=""/> 
                  </div>
                  <p class="guidelines" id="guide_1"><small>totalplayer - 100 default</small></p>
               </li>
               <li id="li_2" >
                  <label class="description" for="element_2">Totalplayerjoined </label>
                  <div>
                     <input id="totalplayerjoined" name="totalplayerjoined" class="element text medium" type="text" maxlength="255" value=""/> 
                  </div>
                  <p class="guidelines" id="guide_2"><small>totalplayerjoined - 0 for default</small></p>
               </li>
               <li id="li_3" >
                  <label class="description" for="element_3">Entryfee </label>
                  <div>
                     <input id="entryfee" name="entryfee" class="element text medium" type="text" maxlength="255" value=""/> 
                  </div>
                  <p class="guidelines" id="guide_3"><small>entryfee - room joining fee</small></p>
               </li>
               <li id="li_4" >
                  <label class="description" for="element_4">Winprice </label>
                  <div>
                     <input id="winprice" name="winprice" class="element text medium" type="text" maxlength="255" value=""/> 
                  </div>
                  <p class="guidelines" id="guide_4"><small>winprice - winning price</small></p>
               </li>
               <li id="li_5" >
                  <label class="description" for="element_5">Perkill </label>
                  <div>
                     <input id="perkill" name="perkill" class="element text medium" type="text" maxlength="255" value=""/> 
                  </div>
                  <p class="guidelines" id="guide_5"><small>perkill - per kill winning price</small></p>
               </li>
               <li id="li_14" style="display:none;">
                  <label class="description" for="element_14">Joinstatus </label>
                  <div>
                     <select class="element select medium" id="joinstatus" name="joinstatus">
                        <option value="0" selected="selected">0</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_14"><small>joinstatus - 0 as a default</small></p>
               </li>
               <li id="li_15" >
                  <label class="description" for="element_15">Matchstatus </label>
                  <div>
                     <select class="element select medium" id="matchstatus" name="matchstatus">
                        <option value="upcoming" selected="selected">upcoming</option>
                        <option value="ongoing" >ongoing</option>
                        <option value="done" >done</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_15"><small>matchstatus - select default upcomming</small></p>
               </li>
               <li id="li_6" >
                  <label class="description" for="element_6">Matchschedule </label>
                  <span>
                  <input id="element_6_1" name="element_6_1" class="element text" size="2" maxlength="2" value="" type="text"> /
                  <label for="element_6_1">DD</label>
                  </span>
                  <span>
                  <input id="element_6_2" name="element_6_2" class="element text" size="2" maxlength="2" value="" type="text"> /
                  <label for="element_6_2">MM</label>
                  </span>
                  <span>
                  <input id="element_6_3" name="element_6_3" class="element text" size="4" maxlength="4" value="" type="text">
                  <label for="element_6_3">YYYY</label>
                  </span>
                  <span id="calendar_6">
                  <img id="cal_img_6" class="datepicker" src="calendar.gif" alt="Pick a date.">	
                  </span>
                  <script type="text/javascript">
                     Calendar.setup({
                     inputField	 : "element_6_3",
                     baseField    : "element_6",
                     displayArea  : "calendar_6",
                     button		 : "cal_img_6",
                     ifFormat	 : "%B %e, %Y",
                     onSelect	 : selectEuropeDate
                     });
                  </script>
                  <p class="guidelines" id="guide_6"><small>matchschedule - match time</small></p>
               </li>
               <li id="li_7" >
                  <label class="description" for="element_7">Matchschedule Time </label>
                  <span>
                  <input id="element_7_1" name="element_7_1" class="element text " size="2" type="text" maxlength="2" value=""/> : 
                  <label>HH</label>
                  </span>
                  <span>
                  <input id="element_7_2" name="element_7_2" class="element text " size="2" type="text" maxlength="2" value=""/> : 
                  <label>MM</label>
                  </span>
                  <span>
                  <input id="element_7_3" name="element_7_3" class="element text " size="2" type="text" maxlength="2" value=""/>
                  <label>SS</label>
                  </span>
                  <span>
                     <select class="element select" style="width:4em" id="element_7_4" name="element_7_4">
                        <option value="AM" >AM</option>
                        <option value="PM" >PM</option>
                     </select>
                     <label>AM/PM</label>
                  </span>
                  <p class="guidelines" id="guide_7"><small>matchschedule - time</small></p>
               </li>
               <li class="buttons">
                  <input type="hidden" name="form_id" value="55554" />
                  <input id="saveForm" class="button_text btn btn-info" type="submit" name="submit" value="Submit" />
               </li>
            </ul>
         </form>
      </div>
      <!--<img id="bottom" src="bottom.png" alt="">-->
   </body>
</html>

