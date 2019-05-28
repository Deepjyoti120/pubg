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
</script>

<link rel="stylesheet" href="styles.css">
</head>
<body>
<br/><br/>
<div class="tabs">
    <h4>Transactions Master</h4>

  <div class="tab-button-outer">
    <ul id="tab-button">
      <li><a href="#tab01">All Transactions</a></li>
      <li><a href="#tab02">All Withdrawal</a></li>
      <li><a href="#tab03">Search Player's transactions</a></li>
      <!--<li><a href="#tab04">View</a></li>-->
    </ul>
  </div>
  <div class="tab-select-outer">
    <select id="tab-select">
      <option value="#tab01">All Transactions</option>
      <option value="#tab02">All Withdrawal</option>
      <option value="#tab03">Search Player's transactions</option>
      <!--<option value="#tab04">View</option>-->
    </select>
  </div>

  <div id="tab01" class="tab-contents">
    <!--<h2>Add</h2>-->
    <?php include 'alltransactions.php';?>
  </div>
  <div id="tab02" class="tab-contents">
    <!--<h2>Edit</h2>-->
    <?php include 'allwithdrawal.php';?>
  </div>
  <div id="tab03" class="tab-contents">
    <!--<h2>Delete</h2>-->
    <!--<p>delete</p>--
    <?php include 'playertransactions.php';?>
  </div>
  <div id="tab04" class="tab-contents">
    <!--<h2>View</h2>-->
    <!--<p>view</p>-->
  </div>
</div>

</body>
</html>