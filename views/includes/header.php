<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Name</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url?>assets/css/bootstrap.min.css">
    <!-- Font Awsome -->
    <link rel="stylesheet" href="<?php echo base_url?>assets/plugins/font-awesome/css/font-awesome.min.css">

    <!-- importing dyamic css files -->
    <?php foreach ($this->css as $value): ?>
      <script src="<?php echo base_url."/".$value?>"></script>
    <?php endforeach; ?>

    <!-- making a js varible to access base url -->
    <script type="text/javascript">
      var base_url = "<?php echo base_url?>"
    </script>

  </head>
  <body>
    <?php if (Session::get('user')):?>
      <?php include ('main-menu.php'); ?>
    <?php endif;?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <?php if (Session::get('user')):?>
            <?php include ('sidebar.php'); ?>
          <?php endif;?>
        </div>

        <div class="col-md-9">

        
