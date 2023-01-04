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
      <? load_template('_photogram'); ?>
      <?load_template('_footer'); ?>
    </main>
    <script src="<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
