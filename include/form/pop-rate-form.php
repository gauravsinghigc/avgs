<div class="pop-container">
 <div class="pop-box">
  <h1>Today is</h1>
  <h2><?php echo date("d M, Y"); ?></h2>
  <p>Please setup <b class='text-primary'>GOC Rate </b> for the current month - <br>(<?php echo date("M Y"); ?>)</p>

  <a href="<?php echo DOMAIN; ?>/admin/configurations/rates/add.php" class="btn btn-lg btn-primary">Setup GOC Rate <i class="fa fa-angle-double-right"></i></a>
  <br>
  <a href="index.php?skip=true" class="btn btn-md btn-default">Skip GOC Rate Setup & Continue Using Application <i class="fa fa-angle-right"></i></a>
  <p class="display-7">If you skip then at next login you will get reminder again.</p>
 </div>
</div>