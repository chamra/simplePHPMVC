<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Users</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <a type="button" class="btn btn-success btn-sm pull-right" href="<?php echo base_url.'grns/create' ?>">
          ADD NEW
        </a>
      </div>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Supplier</th>
              <th>Total</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->data['grns'] as $key => $value): ?>
              <tr>
                <td>
                  <?php echo $value['id'] ?>
                </td>
                <td>
                  <?php echo $value['supplier_name'] ?>
                </td>
                <td>
                  <?php echo $value['total'] ?>
                </td>
                <td>
                  <?php echo $value['date'] ?>
                </td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm" onclick="deleteGrn(<?php echo $value['id'] ?>)">
                    <i class="fa fa-trash"></i>
                  </button>
                  <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url."grns/edit/".$value['id'] ?>">
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
