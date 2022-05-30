<div class="container" style="padding-top:19px;">
  <h4>
    <center>List </center>
  </h4>
  <hr>
<?php
if($this->session->flashdata('message'))
{
  echo $this->session->flashdata('message');
}


?>




  <button type="button" class="btn btn-success"> Search </button>
  <input id="myInput" type="text" placeholder="Search..">
  <br><br>
  <table class="table">
    <thead>
      <tr class="table-success">
        <th scope="col"> ID </th>
        <th scope="col"> Name</th>
        <th scope="col">Description </th>
        <th scope="col">Image </th>
        <th scope="col"> Price </th>
      
        <th scope="col">Edit </th>
        <th scope="col">Delete </th>
      </tr>
    </thead>
    <tbody id="myTable"> 
      <?php    
    if(!empty($result)) {
   foreach($result as $results) {?> <tr>
        <td> <?php echo $results['product_id'];    ?> </td>
        <td> <?php echo $results['product_name'];    ?> </td>
        <td> <?php echo $results['product_description'];    ?> </td>
        <td> <?php if($results['product_image']){?> <img src="
								<?php echo base_url('assets/product/').$results['product_image'];?>" style="width:40px;height:40px"> <?php } ?> </td>
        <td> <?php echo $results['product_price'];    ?> </td>
        
        <td>
          <a href="
									<?php  echo base_url().'cartgeek/edit/'.$results['product_id'] ?>">
            <img src="https://img.icons8.com/color/26/000000/edit--v1.png" />
          </a>
        </td>
        <td>
          <a onclick="return confirm('Are You Sure ?????')" href="
									<?php  echo base_url().'cartgeek/delete/'.$results['product_id'] ?>">
            <img src="https://img.icons8.com/color/26/000000/filled-trash.png" />
          </a>
        </td>
      </tr>
      
    
      <?php  } 



}else {

   ?> <tr>
        <td colspan="10">Records Not Found </td>
      </tr> <?php } ; ?> 
<tr><td></td></tr>
      <tr>
        <td colspan="10"> <?php echo $this->pagination->create_links();    ?> </td>
      </tr>
    </tbody>
  </table>
</div>