<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Users</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <a type="button" class="btn btn-success btn-sm pull-right" href="<?php echo base_url.'users/create' ?>">
          ADD NEW
        </a>
      </div>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Username</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->data['users'] as $key => $value): ?>
              <tr>
                <td>
                  <?php echo $value['name'] ?>
                </td>
                <td>
                  <?php echo $value['email'] ?>
                </td>
                <td>
                  <?php echo $value['username'] ?>
                </td>
                <td>
                <?php if ($value['active']): ?>
                  <a class="label label-success" href="<?php echo base_url.'users/status/'.$value['id']?>">ACTIVE</a>
                <?php else: ?>
                  <a class="label label-danger" href="<?php echo base_url.'users/status/'.$value['id']?>">IN-ACTIVE</a>
                <?php endif; ?>
                </td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm" onclick="deleteUser(<?php echo $value['id'] ?>)">
                    <i class="fa fa-trash"></i>
                  </button>
                  <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url."users/edit/".$value['id'] ?>">
                    <i class="fa fa-pencil"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
