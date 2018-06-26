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
        <div class="col-md-4 col-md-offset-4 " style="margin-top:50px">
          <div class="panel panel-primary">
            <div class="panel-heading text-center">
              <h3 class="panel-title">System Name</h3>
            </div>
            <div class="panel-body">
              <p class="text-center">Please login to continue</p>
              <div class="alert alert-danger" style="display:none">
                <ul>

                </ul>
              </div>
              <form class="form-horizontal" action="<?php echo base_url?>login/log_user" method="post" id="loginForm">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" required>
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" required>
                <br>
                <button type="button" onclick="login()" class="btn btn-primary">login</button>
              </form>
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
