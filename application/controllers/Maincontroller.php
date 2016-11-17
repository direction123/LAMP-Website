<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maincontroller extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
// Load database
        $this->load->model('maindatabasemodel');
    }

    public function index()
    {
  	    $para['ProductCategoryDetails']=$this->Maindatabasemodel->getProductCategory();
        $this->load->view('HeaderGuestView');
    }
}

?>