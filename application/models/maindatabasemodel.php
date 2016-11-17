<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maindatabasemodel extends CI_Model {
	public function getProductCategory(){
        $query = $this->db->get('ProductCategory');
        return $query->result();
    }

}

/* End of file maindatabasemodel.php */
/* Location: ./application/models/maindatabasemodel.php */