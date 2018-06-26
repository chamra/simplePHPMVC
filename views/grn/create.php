<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Create GRN</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="#" method="post" id="grnFrom">
          <div class="alert alert-danager" style="display:none">
            <ul>

            </ul>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Supplier</label>
              <select class="form-control" name="supplier_id" id="supplier_id">
                <?php foreach ($this->data['suppliers'] as $key => $value): ?>
                  <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Date</label>
              <input type="date" class="form-control" name="date" id="date" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3">
              <label for="">Product</label>
              <select class="form-control" id="product">
                <?php foreach ($this->data['products'] as $key => $value): ?>
                  <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="">Qty</label>
              <input type="number" class="form-control" id="qty" placeholder="" value="0" onkeyup="calAmount()">
            </div>
            <div class="col-md-3">
              <label for="">Price</label>
              <input type="number" class="form-control" id="price" placeholder="" value="0" onkeyup="calAmount()">
            </div>
            <div class="col-md-2">
              <label for="">Amount</label>
              <input type="number" class="form-control" disabled id="amount" placeholder="" value="0">
            </div>
            <div class="col-md-1">
              <label for="">Action</label><br>
              <button type="button" class="btn btn-primary btn-sm" onclick="addGrnItem()">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <label for="">Total</label>
              <input type="number" class="form-control" disabled id="total" placeholder="" value="0">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <table class="table" id="grnItemTbl">
                <thead>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Amount</th>
                  <th>Action</th>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 pull-right text-right" >
              <button type="button" class="btn btn-primary" onclick="create()">
                SUBMIT
              </button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
