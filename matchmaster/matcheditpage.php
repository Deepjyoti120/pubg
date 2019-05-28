<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // if (isset($_POST['submit'])){
            
            //Post Params 
            $matchid = $_POST['matchid'];  

            // include db connect class
            require_once __DIR__ . '/../db_connect.php';
        
            // connecting to db
        	$db = new DB_CONNECT();
        	$conn = $db->connect();
	
	        // POST all iid from users table
        	$results = mysqli_query($conn,"SELECT * FROM matchmst WHERE matchid='$matchid' ") or die(mysql_error());
        
        	// check for empty result
        	if (mysqli_num_rows($results) == 1) {
        	    
                while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
                        // temp user array
                        //     $rajan = array();        
                        //     $rajan["no"] = $row["no"];
                        
                        $roomid = $row['roomid'];  
                        $roompassword = $row['roompassword'];  
                        $type = $row['type'];  
                        $version = $row['version'];  
                        $map = $row['map'];  
                        $maintopbannerimg = $row['maintopbannerimg'];  
                        $iconimg = $row['iconimg'];  
                        $matchtype = $row['matchtype'];  
                        $totalplayer = $row['totalplayer'];  
                        $totalplayerjoined = $row['totalplayerjoined'];  
                        $entryfee = $row['entryfee'];  
                        $winprice = $row['winprice'];  
                        $perkill = $row['perkill'];  
                        $joinstatus = $row['joinstatus'];  
                        $matchstatus = $row['matchstatus'];  
                        
                        // // '2019-03-18 13:00:00'
                        // // 12-hour time to 24-hour time 
                        // $rtime = $_POST['element_7_1'].':'.$_POST['element_7_2'].':'.$_POST['element_7_3'].' '.$_POST['element_7_4'];
                        // $time_in_24_hour_format  = date("H:i:s", strtotime($rtime));
                        // 24-hour time to 12-hour time 
            
                        // $matchschedule = $_POST['element_6_3'].'-'.$_POST['element_6_2'].'-'.$_POST['element_6_1'].' '.$time_in_24_hour_format; 
                        $matchschedule = $row['matchschedule'];
                        $time_in_12_hour_format  = date("h:i a", strtotime(substr($matchschedule, 11, 13 - 11).':'.substr($matchschedule, 14, 16 - 14)));
                        $log_entdate = $row['log_entdate'];
                    }
            }
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
      <link rel="stylesheet" type="text/css" href="view.css" media="all">
      <script type="text/javascript" src="view.js"></script>
      <script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
      <img id="top" src="top.png" alt="">
      <div id="form_container">
         <!--<h1><a>New Match Entry Form</a></h1>-->
         <form id="form_55554" class="appnitro"  method="post" action="matchedits.php">
            <!--<div class="form_description">-->
            <!--   <h2>Match updation Form</h2>-->
            <!--   <p>Using this you can update a match, and currently selected value is existing value of match.</p>-->
            <!--</div>-->
            <ul >
                <li id="li_1" >
                  <label class="description" for="element_1">Room id </label>
                  <div>
                     <input id="roomid" name="roomid" class="element text medium" type="text" maxlength="255" value="<?php echo $roomid; ?>"/> 
                  </div>
                  <p class="guidelines" id="guide_1"><small>roomid</small></p>
               </li>
               <li id="li_2" >
                  <label class="description" for="element_2">Room password </label>
                  <div>
                     <input id="roompassword" name="roompassword" class="element text medium" type="text" maxlength="255" value="<?php echo $roompassword; ?>"/> 
                  </div>
                  <p class="guidelines" id="guide_2"><small>roompassword</small></p>
               </li>
               <li id="li_8" >
                  <label class="description" for="element_8">Type </label>
                  <div>
                     <select class="element select medium" id="type" name="type">
                        <option value="SOLO" <?php if($type == 'SOLO'){ echo 'selected="selected"'; } ?>>SOLO</option>
                        <option value="DUO" <?php if($type == 'DUO'){ echo 'selected="selected"'; } ?>>DUO</option>
                        <option value="SQUAD" <?php if($type == 'SQUAD'){ echo 'selected="selected"'; } ?>>SQUAD</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_8"><small>type - select how many team players in single team.</small></p>
               </li>
               <li id="li_9" >
                  <label class="description" for="element_9">Version </label>
                  <div>
                     <select class="element select medium" id="version" name="version">
                        <option value="1.0" <?php if($version == '1.0'){ echo 'selected="selected"'; } ?> >1.0</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_9"><small>version - 1.0 select for default</small></p>
               </li>
               <li id="li_10" >
                  <label class="description" for="element_10">Map </label>
                  <div>
                     <select class="element select medium" id="map" name="map">
                        <option value="Erangel" <?php if($map == 'Erangel'){ echo 'selected="selected"'; } ?>>Erangel</option>
                        <option value="Miramar" <?php if($map == 'Miramar'){ echo 'selected="selected"'; } ?>>Miramar</option>
                        <option value="Vikendi" <?php if($map == 'Vikendi'){ echo 'selected="selected"'; } ?>>Vikendi</option>
                        <option value="Sanhok" <?php if($map == 'Sanhok'){ echo 'selected="selected"'; } ?>>Sanhok</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_10"><small>map</small></p>
               </li>
               <li id="li_11" >
                  <label class="description" for="element_11">Main top banner img </label>
                  <div>
                     <select class="element select medium" id="maintopbannerimg" name="maintopbannerimg">
                        <option value="4kwallpapers.jpg" <?php if($maintopbannerimg == '4kwallpapers.jpg'){ echo 'selected="selected"'; } ?>>4kwallpapers.jpg</option>
                        <option value="wp.jpg" <?php if($maintopbannerimg == 'wp.jpg'){ echo 'selected="selected"'; } ?>>wp.jpg</option>
                        <option value="battlegrounds.jpg" <?php if($maintopbannerimg == 'battlegrounds.jpg'){ echo 'selected="selected"'; } ?>>battlegrounds.jpg</option>
                        <option value="background.jpg" <?php if($maintopbannerimg == 'background.jpg'){ echo 'selected="selected"'; } ?>>background.jpg</option>
                        <option value="hdwallpapers.png" <?php if($maintopbannerimg == 'hdwallpapers.png'){ echo 'selected="selected"'; } ?>>hdwallpapers.png</option>
                        <option value="mobilewallpapers.jpg" <?php if($maintopbannerimg == 'mobilewallpapers.jpg'){ echo 'selected="selected"'; } ?>>mobilewallpapers.jpg</option>
                        <option value="videosmall.jpg" <?php if($maintopbannerimg == 'videosmall.jpg'){ echo 'selected="selected"'; } ?>>videosmall.jpg</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_11"><small>maintopbannerimg - Top banner image</small></p>
               </li>
               <li id="li_12" >
                  <label class="description" for="element_12">Icon img </label>
                  <div>
                     <select class="element select medium" id="iconimg" name="iconimg">
                        <option value="circlesmall.png" <?php if($iconimg == 'circlesmall.png'){ echo 'selected="selected"'; } ?>>circlesmall.png</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_12"><small>iconimg - select default its app icon</small></p>
               </li>
               <li id="li_13" >
                  <label class="description" for="element_13">Match type </label>
                  <div>
                     <select class="element select medium" id="matchtype" name="matchtype">
                        <option value="Paid" <?php if($matchtype == 'Paid'){ echo 'selected="selected"'; } ?>>Paid</option>
                        <option value="Free" <?php if($matchtype == 'Free'){ echo 'selected="selected"'; } ?>>Free</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_13"><small>matchtype</small></p>
               </li>
               <li id="li_1" >
                  <label class="description" for="element_1">Totalplayer </label>
                  <div>
                     <input id="totalplayer" name="totalplayer" class="element text medium" type="text" maxlength="255" value="<?php echo $totalplayer; ?>"/> 
                  </div>
                  <p class="guidelines" id="guide_1"><small>totalplayer - 100 default</small></p>
               </li>
               <li id="li_2" >
                  <label class="description" for="element_2">Totalplayerjoined </label>
                  <div>
                     <input id="totalplayerjoined" name="totalplayerjoined" class="element text medium" type="text" maxlength="255" value="<?php echo $totalplayerjoined; ?>"/> 
                  </div>
                  <p class="guidelines" id="guide_2"><small>totalplayerjoined - 0 for default</small></p>
               </li>
               <li id="li_3" >
                  <label class="description" for="element_3">Entryfee </label>
                  <div>
                     <input id="entryfee" name="entryfee" class="element text medium" type="text" maxlength="255" value="<?php echo $entryfee; ?>"/> 
                  </div>
                  <p class="guidelines" id="guide_3"><small>entryfee - room joining fee</small></p>
               </li>
               <li id="li_4" >
                  <label class="description" for="element_4">Winprice </label>
                  <div>
                     <input id="winprice" name="winprice" class="element text medium" type="text" maxlength="255" value="<?php echo $winprice; ?>"/> 
                  </div>
                  <p class="guidelines" id="guide_4"><small>winprice - winning price</small></p>
               </li>
               <li id="li_5" >
                  <label class="description" for="element_5">Perkill </label>
                  <div>
                     <input id="perkill" name="perkill" class="element text medium" type="text" maxlength="255" value="<?php echo $perkill; ?>"/> 
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
                        <option value="upcoming" <?php if($matchstatus == 'upcoming'){ echo 'selected="selected"'; } ?>>upcoming</option>
                        <option value="ongoing" <?php if($matchstatus == 'ongoing'){ echo 'selected="selected"'; } ?>>ongoing</option>
                        <option value="done" <?php if($matchstatus == 'done'){ echo 'selected="selected"'; } ?>>done</option>
                     </select>
                  </div>
                  <p class="guidelines" id="guide_15"><small>matchstatus - select default upcomming</small></p>
               </li>
               <li id="li_6" >
                  <label class="description" for="element_6">Matchschedule </label>
                  <span>
                  <input id="element_6_1" name="element_6_1" class="element text" size="2" maxlength="2" value="<?php echo substr($matchschedule, 8, 10 - 8); ?>" type="text"> /
                  <label for="element_6_1">DD</label>
                  </span>
                  <span>
                  <input id="element_6_2" name="element_6_2" class="element text" size="2" maxlength="2" value="<?php echo substr($matchschedule, 5, 7 - 5); ?>" type="text"> /
                  <label for="element_6_2">MM</label>
                  </span>
                  <span>
                  <input id="element_6_3" name="element_6_3" class="element text" size="4" maxlength="4" value="<?php echo substr($matchschedule, 0, 4 - 0); ?>" type="text">
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
                  <input id="element_7_1" name="element_7_1" class="element text " size="2" type="text" maxlength="2" value="<?php echo substr($time_in_12_hour_format, 0, 2 - 0); ?>"/> : 
                  <label>HH</label>
                  </span>
                  <span>
                  <input id="element_7_2" name="element_7_2" class="element text " size="2" type="text" maxlength="2" value="<?php echo substr($time_in_12_hour_format, 3, 5 - 3); ?>"/> : 
                  <label>MM</label>
                  </span>
                  <span>
                  <input id="element_7_3" name="element_7_3" class="element text " size="2" type="text" maxlength="2" value="00"/>
                  <label>SS</label>
                  </span>
                  <span>
                     <select class="element select" style="width:4em" id="element_7_4" name="element_7_4">
                        <option value="AM" <?php if(substr($time_in_12_hour_format, 6, 8 - 6) == 'am'){ echo 'selected="selected"'; } ?>>AM</option>
                        <option value="PM" <?php if(substr($time_in_12_hour_format, 6, 8 - 6) == 'pm'){ echo 'selected="selected"'; } ?>>PM</option>
                     </select>
                     <label>AM/PM</label>
                  </span>
                  <p class="guidelines" id="guide_7"><small>matchschedule - time</small></p>
               </li>
               <li class="buttons">
                  <input type="hidden" name="matchid" value="<?php echo $matchid; ?>" />
                  <input id="saveForm" class="button_text btn btn-info" type="submit" name="submit" value="Submit" />
               </li>
            </ul>
         </form>
      </div>
      <!--<img id="bottom" src="bottom.png" alt="">-->
   </body>
</html>

