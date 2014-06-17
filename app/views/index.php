<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
  </head>
  <body>
    <?php
      if (Auth::check()):
    ?>
        Hello <?= Auth::user()->first_name ?> <br />
        <a href="<?=url('/user/logout')?>" /> <?= Lang::get('index.user_links.logout_link') ?> </a> </br >
    <?php
      else:
    ?>
        <a href="<?=url('/user/login')?>" /> <?= Lang::get('index.user_links.login_link') ?> </a> </br >
    <?php
      endif;
    ?>
    
    
  <!--========================================== End Of Header =========================================================== -->
  
  
  

<?php
if (isset($viewNotification)):
?>
    <?= $viewNotification ?>
<?php
endif;
if (isset($viewBody)):
?>
    <?= $viewBody ?>
<?php
endif;
?>


  <!--=========================================== Start of Footer ===================================================== -->                    

  </body>
</html>
