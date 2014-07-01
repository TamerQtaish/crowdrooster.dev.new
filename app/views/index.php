<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/medium-editor/dist/css/medium-editor.css"> <!-- Core -->
    <link rel="stylesheet" href="/assets/medium-editor/dist/css/themes/default.css"> <!-- or any other theme -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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

    <!-- Medium Inline Text Editor Scripts -->
    <script src="/assets/medium-editor/dist/js/medium-editor.js"></script>
    <script>var editor = new MediumEditor('.editable');</script>
    <!-- End of Text Editor Scripts -->
  </body>
</html>
