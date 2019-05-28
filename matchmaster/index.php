<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script>
$(function() {
  var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});

    //   $(document).ready(function(){
    //     // Set trigger and container variables
    //     var trigger = $('#nav ul li a'),
    //         container = $('#content');
        
    //     // Fire on click
    //     trigger.on('click', function(){
    //       // Set $this for re-use. Set target from data attribute
    //       var $this = $(this),
    //         target = $this.data('target');       
          
    //       // Load target page into container
    //       container.load(target + '.php');
          
    //       // Stop normal link behavior
    //       return false;
    //     });
    //   });
</script>

<link rel="stylesheet" href="styles.css">
</head>
<body>
<br/><br/>
<div class="tabs">
    <h4>Match Master</h4>

  <div class="tab-button-outer">
    <ul id="tab-button">
      <li><a href="#tab01">Add</a></li>
      <li><a href="#tab02">Edit</a></li>
      <li><a href="#tab03">Delete</a></li>
      <li><a href="#tab04">View</a></li>
    </ul>
  </div>
  <div class="tab-select-outer">
    <select id="tab-select">
      <option value="#tab01">Add</option>
      <option value="#tab02">Edit</option>
      <option value="#tab03">Delete</option>
      <option value="#tab04">View</option>
    </select>
  </div>

  <div id="tab01" class="tab-contents">
    <!--<h2>Add</h2>-->
    <?php include 'matchadd.php';?>
  </div>
  <div id="tab02" class="tab-contents">
    <!--<h2>Edit</h2>-->
    <?php include 'matchedit.php';?>
  </div>
  <div id="tab03" class="tab-contents">
    <!--<h2>Delete</h2>-->
    <!--<p>delete</p>-->
    <?php include 'matchdelete.php';?>
  </div>
  <div id="tab04" class="tab-contents">
    <!--<h2>View</h2>-->
    <!--<p>view</p>-->
    <?php include 'matchview.php';?>
  </div>
</div>

</body>
</html>