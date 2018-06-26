    <!-- closing col-md-12 -->
    </div>
    <!-- closing row -->
  </div>
  <!-- closing container-fulid -->
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
