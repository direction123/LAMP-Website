<?php 

class maindatabasemodel extends CI_Model {
	public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

	public function getProductCategory(){
        $query = $this->db->get('ProductCategory');
        return $query->result();
    }

}

/* End of file maindatabasemodel.php */
/* Location: ./application/models/maindatabasemodel.php */
?>