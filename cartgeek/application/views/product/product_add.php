<div class="container" style="padding-top:10px;">
  <h4> Addition </h4>
  <hr>
  <!--form method="POST" name="create_product"    action="<?php  //echo base_url().'index.php/product/create'; ?>"--> <?php  $attribute=array('role'=>'form'); echo form_open_multipart('Cartgeek/create', $attribute);?> <div class="row">
    <div class="col-md-6">
      <br>
      <div class="form-group">
        <label>Product Name :- </label>
        <input type="text" name="product_name" class="form-control" value="
							<?php echo set_value('product_name');   ?>" required autocomplete="off">
        <h4 style='color:red'> <?php echo form_error('product_name'); ?> </h4>
      </div>
      <br>
      <div class="form-group">
        <label>Product Price:- </label>
        <input type="number" name="product_price" class="form-control" min="0" autocomplete="off" required>
        <h6 style='color:red'> <?php echo form_error('product_price'); ?> </h6>
      </div>
      <br>
      <div class="form-group">
        <label>Product Description:- </label>
        <input type="text" name="product_description" class="form-control" autocomplete="off" required>
        <h6 style='color:red'> <?php echo form_error('product_description'); ?> </h6>
      </div>
      <br>
      <div class="form-group">
        <label>Product Image:- </label>
        <input type="file"  name="product_image" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg" required>
        <h6 style='color:red'> <?php echo form_error('product_image'); ?> </h6>
      </div>
      <br>
      <br>
      <div class="form-group">
        <!--a class="btn btn-info" type="button"> Addition </!--a-->
        <button class="btn btn-success" style="float: center;">Addition </button>
        <a href="<?php  echo base_url(); ?>cartgeek/list" class="btn btn-dark" type="button"> Cancel </a>
      </div>
    </div>
  </div>
  </form>
</div>