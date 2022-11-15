<?php 
  include 'libs/load.php';
?>


<!doctype html>
<html lang="en">
    <? load_template('_head');?> 
  <body>
    <header>
      <? load_template('_header');?> 
    </header>
    <main>
      <? load_template('_calltoaction'); ?>
      <? include('../phpapp/_templates/_calltoaction.php'); ?>
      <?load_template('_footer'); ?>
    </main>
    <script src="../phpapp/assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
