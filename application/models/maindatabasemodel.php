<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class maindatabasemodel extends Model {
	function maindatabasemodel()
     {
        parent::Model();
        $this->load->database();
     }
	public function getProductCategory(){
        $query = $this->db->get('ProductCategory');
        return $query->result();
    }

}

/* End of file maindatabasemodel.php */
/* Location: ./application/models/maindatabasemodel.php */