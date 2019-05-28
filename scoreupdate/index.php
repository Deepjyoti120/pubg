<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    var matchid =  document.getElementById("matchid").value;
    $.post("score.php",
    {
      matchid: matchid
    },
    function(result){
      $("#report").html(result);
    });
  });
});
</script>
</head>
<body>
    
<!--<h5>Enter MatchId in below textbox:</h5>-->
<div class="form-group row m-3 r-3">
<label for="inputEmail3" class="col-sm-1 col-form-label">MatchId:</label>

<div class="col-sm-1">
<input id="matchid" type="text" class="form-control" placeholder="Match ID">
</div>

<button class="btn btn-info">Submit</button>
</div>
</br></br></br>

<div id="report"></div>

</body>
</html>