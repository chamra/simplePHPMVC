<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Create GRN</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="#" method="post" id="grnFrom">
          <input type="hidden" name="id" value="<?php echo $this->data['grn']['id'] ?>">
          <div class="alert alert-danager" style="display:none">
            <ul>

            </ul>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label for="">Supplier</label>
              <select class="form-control" name="supplier_id" id="supplier_id">
                <?php foreach ($this->data['suppliers'] as $key => $value): ?>
                  <option value="<?php echo $value['id'] ?>" <?php echo $this->data['grn']['supplier_id'] === $value['id'] ? "selected" : ""?>><?php echo $value['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Date</label>
              <input type="date" class="form-control" name="date" id="date" value="<?php echo $this->data['grn']['date'] ?>">
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
              <input type="number" class="form-control" disabled id="total" placeholder="" value="<?php echo $this->data['grn']['total'] ?>">
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
                  <?php foreach ($this->data['grn_item'] as $key => $value): ?>
                    <tr>
                      <td>
                        <?php echo $value['product_name'] ?>
                        <input type="hidden" name="grn_item[<?php echo $key ?>][product_id]" value="<?php echo $value['product_id'] ?>">
                      </td>
                      <td>
                        <?php echo $value['qty'] ?>
                        <input type="hidden" name="grn_item[<?php echo $key ?>][qty]" value="<?php echo $value['qty'] ?>">
                      </td>
                      <td>
                        <?php echo $value['price'] ?>
                        <input type="hidden" name="grn_item[<?php echo $key ?>][price]" value="<?php echo $value['price'] ?>">
                      </td>
                      <td>
                        <?php echo $value['price'] * $value['price'] ?>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow($(this))">
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 pull-right text-right" >
              <button type="button" class="btn btn-primary" onclick="update()">
                SUBMIT
              </button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
