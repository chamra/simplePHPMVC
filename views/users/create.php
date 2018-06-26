<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Create user</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="#" method="post" id="userForm">
          <div class="alert alert-danager" style="display:none">
            <ul>

            </ul>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="">
            </div>
            <div class="col-md-6">
              <label for="">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="">
            </div>
            <div class="col-md-6">
              <label for="">Re-enter Password</label>
              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 pull-right text-right" onclick="create()">
              <button type="button" class="btn btn-primary">
                SUBMIT
              </button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
