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
      $("#buttondelete").click(function(){
        var matchid =  document.getElementById("matchiddelete").value;
        $.post("matchdeletequery.php",
        {
          matchid: matchid
        },
        function(result){
          $("#report").html(result);
        });
      });
    });
    </script>

    <title>Match Delete</title>
    <link rel="stylesheet" type="text/css" href="view.css" media="all">
    <script type="text/javascript" src="view.js"></script>

</head>

<body id="main_body">

    <!--<img id="top" src="top.png" alt="">-->
    <div id="form_container" class="mt-3 p-3 ml-11">

        <!--<h1><a>Match Edit</a></h1>-->
        <!--<form id="form_55554" class="appnitro" method="post" action="matcheditpage.php">-->
            <div class="form_description">
                <h2>Match Delete</h2>
                <p>Delete any scheduled match.</p>
            </div>
            <ul>

                <li id="li_1">
                    <label class="description" for="element_1">Match ID </label>
                    <div>
                        <input id="matchiddelete" name="matchiddelete" class="element text medium" type="text" maxlength="255" value="" />
                    </div>
                    <p class="guidelines" id="guide_1"><small>Enter matchid which you want to delete</small></p>
                </li>

                <li class="buttons">
                    <input type="hidden" name="form_id" value="55554" />

                    <button id="buttondelete" class="btn btn-info">Submit</button>
                </li>
            </ul>
        <!--</form>-->
    </div>
    <div id="report"></div>
    </br></br></br>
    <!--<img id="bottom" src="bottom.png" alt="">-->
</body>

</html>