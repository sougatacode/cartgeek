<?php
   class Cartgeek_model extends CI_model
   {
       
   
   function create($FormArray)   // insert into product table 
   {
    $this->db->insert("product", $FormArray); // insert into product
       
       
   }
   
   
   
   
   function display($limit,$offset)
       {
           // This model  will Display table ()
           $this->db->limit($limit,$offset);
   
           return $result = $this->db->get("product")->result_array(); // select * from table name
       }
   
   
      
       function delete($product_id)
       {
   
            $this->db->where("product_id", $product_id);
            $this->db->delete('product');
   
    
           return true;
       }
   
       function get($product_id)
       {
           // This  model is for select * from footer   where footer_id =?
   
           $this->db->where("product_id", $product_id);
           $result = $this->db->get("product")->row_array(); // row_array shall fetch single row
           return $result;
       }
   
       function update($product_id, $formArray)
       {
           // update circular set column=?, column2=? where footer_id
           $this->db->where("product_id", $product_id);
   
           $this->db->update("product", $formArray);
       }
   
   
   
   function row_count()
   {
     $result=$this->db->get('product');
     return $result->num_rows();
   }
   
   
   
   
   
   
   
   }
   
   ?>