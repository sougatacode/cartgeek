<div class="container" style="padding-top:10px;">
  <h4> Updation </h4>
  <hr>
 <?php  $attribute=array('role'=>'form');  echo form_open_multipart('cartgeek/edit/'.$result['product_id'], $attribute);?> <div class="row">
    <div class="col-md-6">
      <br>
      <div class="form-group">
        <label>Product Name :- </label>
        <input type="text" name="product_name" class="form-control" value="
							<?php   $product_name=$result['product_name']; $product_name=trim($product_name) ;          echo set_value('product_name',$product_name) ; ?>" required>
        <h4 style='color:red'> <?php echo form_error('product_name'); ?> </h4>
      </div>
      <br>
      <div class="form-group">
        <label>Product Price:- </label>
        <input type="number" name="product_price" class="form-control" min="0" value="<?php echo set_value('product_price',$result['product_price']) ; ?>" required>
        
        </div>
        <h4 style='color:red'> <?php echo form_error('product_price'); ?> </h4>
      
      <br>
      <div class="form-group">
        <label>Product Description :- </label>
        <input type="text" name="product_description" class="form-control" min="0" required value="
											<?php   $product_description=$result['product_description'];     $product_description=trim($product_description)  ;              echo set_value('product_description',$product_description) ; ?>">
        <h4 style='color:red'> <?php echo form_error('product_description'); ?> </h4>
      </div>
      <br>
      <div class="form-group">
        <label>product Image:- </label>
        <input type="file" name="product_image" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg" required> <?php if($result['product_image']){?> <img src="
														<?php echo base_url('assets/product/').$result['product_image'];?>" style="width:80px;height:80px"> <?php } ?> <h4 style='color:red'> <?php echo form_error('product_image'); ?> </h4>
      </div>
     
      <div class="form-group">
        <!--a class="btn btn-info" type="button"> Addition </!--a-->
        <button class="btn btn-success" style="float: center;">Edit </button>
        <a href="<?php  echo base_url(); ?>cartgeek/list" class="btn btn-dark" type="button"> Cancel </a>
      </div>
    </div>
  </div>
  </form>
</div>