<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maincontroller extends CI_Controller {

  public function index()
  {
  	$para['ProductCategoryDetails']=$this->Maindatabasemodel->getProductCategory();
    $this->load->view('HeaderGuestView');
  }
}

?>