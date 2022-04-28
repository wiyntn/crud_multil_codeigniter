<?php


class Product_model extends CI_Model{


    public function get_product(){
        if(!empty($this->input->get("search"))){
          $this->db->like('product_name', $this->input->get("search"));
           
        }
        $query = $this->db->get("product");
        return $query->result();
    }


    public function insert_product()
    {    
        $data = array(
            'product_name' => $this->input->post('product_name'),
            
        );
        return $this->db->insert('product', $data);
    }


    public function update_product($product_id) 
    {
        $data= $this->input->post('product_name');
            
        
        if($product_id==0){
            return $this->db->insert('product',$data);
        }else{
            $this->db->where('product_id',$product_id);
            return $this->db->update('product',$data);
        }        
    }


    public function find_product($product_id)
    {
        return $this->db->get_where('product', array('product_id' => $product_id))->row();
    }


    public function delete_product($product_id)
    {
        return $this->db->delete('product', array('product_id' => $product_id));
    }
}
?>