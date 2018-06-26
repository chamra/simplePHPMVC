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

    <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 " style="margin-top:50px">
        <div class="panel panel-primary  text-center">
          <div class="panel-heading">
            <h3 class="panel-title">System Name</h3>
          </div>
          <div class="panel-body">
            <h4 class="text-center">Wellcome to System Name</h4>
            <p>Click below to login to the system</p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo base_url?>/login">
              <button type="button" class="btn btn-primary">
                Login Page
              </button>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url?>assets/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url?>assets/js/bootstrap.min.js"></script>

  <!-- ajax response handling script -->
  <script src="<?php echo base_url?>assets/js/response-handler.js"></script>

  <!-- importing dyamic js files -->
  <?php foreach ($this->js as $value): ?>
    <script src="<?php echo base_url."/".$value?>"></script>
  <?php endforeach; ?>

  </body>
</html>
