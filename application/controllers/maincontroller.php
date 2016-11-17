<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maincontroller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        session_start();
        // Load form helper library
        $this->load->helper('form');
        // Load session library
        $this->load->library('session');
        // Load database
        $this->load->model('maindatabasemodel');
    }
    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

	// public function index()
	// {
	//  	$this->load->model('maindatabasemodel');
	// //	$para['ProductCategoryDetails']=$this->maindatabasemodel->getProductCategory();
	// 	$this->load->view('HeaderGuestView');
	// }
	// Show login page
    public function index()
    {
        $para['ProductCategoryDetails']=$this->maindatabasemodel->getProductCategory();
        $para['SpecialSalesProd']=$this->maindatabasemodel->getSpecialSalesProd();
        $this->load->view('HeaderGuestView');
        $this->load->view('IndexGuestView',$para);
    }
    public function index_login()
    {
        if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
            echo "<script>alert('Inactivity for ".$_SESSION["customerTimeout"]."s!');</script>";
            session_unset();
            $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
            $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
            $this->load->view('HeaderGuestView');
            $this->load->view('IndexGuestView', $para);
        } elseif (!(isset($_SESSION["customerID"]))) {
            echo "<script>alert('No customerID');</script>";
            session_unset();
            $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
            $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
            $this->load->view('HeaderGuestView');
            $this->load->view('IndexGuestView', $para);
        } else {
            $_SESSION["customerLastActivitytime"] = time();

            $para['ProductCategoryDetails']=$this->maindatabasemodel->getProductCategory();
            $para['SpecialSalesProd']=$this->maindatabasemodel->getSpecialSalesProd();
            $para['customerUsername'] = $_SESSION["customerUsername"];
            $this->load->view('HeaderLoginView',$para);
            $this->load->view('IndexLoginView',$para);
        }
    }
    public function user_login_page(){
        $this->load->view('HeaderGuestView');
        $this->load->view('LoginFormView');
    }
    public function user_register_page(){
        $this->load->view('HeaderGuestView');

        $fnErr = "";
        $lnErr = "";
        $adErr = "";
        $ccErr = "";
        $scErr = "";
        $edErr = "";
        $badErr = "";
        $unErr = "";
        $pdErr = "";
        $pd2Err = "";
        $suc="";
        $para["fnErr"] = $fnErr;
        $para["lnErr"] = $lnErr;
        $para["adErr"] = $adErr;
        $para["ccErr"] = $ccErr;
        $para["scErr"] = $scErr;
        $para["edErr"] = $edErr;
        $para["badErr"] = $badErr;
        $para["unErr"] = $unErr;
        $para["pdErr"] = $pdErr;
        $para["pd2Err"] = $pd2Err;
        $para["suc"] = $suc;
        $this->load->view('RegisterFormView',$para);
    }
    public function user_register_process(){
        $flag=1;
        $fnErr = "";
        if (empty($this->input->post('fname'))) {
            $fnErr = "First name is required";
            $flag=0;
        } else {
            $data['fname']=$this->test_input($this->input->post('fname'));
        }
        $lnErr = "";
        if (empty($this->input->post('lname'))) {
            $lnErr = "Last name is required";
            $flag=0;
        } else {
            $data['lname']=$this->test_input($this->input->post('lname'));
        }
        $adErr = "";
        if (empty($this->input->post('address'))) {
            $adErr = "Shipping address is required";
            $flag=0;
        } else {
            $data['address']=$this->test_input($this->input->post('address'));
        }
        $ccErr = "";
        if (empty($this->input->post('creditCard'))) {
            $ccErr = "Credit card number is required";
            $flag=0;
        } else {
            $data['creditCard']=$this->test_input($this->input->post('creditCard'));
        }
        $scErr = "";
        if (empty($this->input->post('securityCode'))) {
            $scErr = "Security number is required";
            $flag=0;
        } else {
            $data['securityCode']=$this->test_input($this->input->post('securityCode'));
        }
        $edErr = "";
        if (empty($this->input->post('expirDate'))) {
            $edErr = "Expire Date is required";
            $flag=0;
        } else {
            $data['expirDate']=$this->test_input($this->input->post('expirDate'));
        }
        $badErr = "";
        if (empty($this->input->post('billAddress'))) {
            $badErr = "Billing address is required";
            $flag=0;
        } else {
            $data['billAddress']=$this->test_input($this->input->post('billAddress'));
        }
        $unErr = "";
        if (empty($this->input->post('userName'))) {
            $unErr = "username is required";
            $flag=0;
        } else {
            $data['userName']=$this->test_input($this->input->post('userName'));
        }
        $pdErr = "";
        if (empty($this->input->post('passWord'))) {
            $pdErr = "password is required";
            $flag=0;
        } else {
            $data['passWord']=$this->test_input($this->input->post('passWord'));
        }
        $pd2Err = "";
        if (empty($this->input->post('confirm_password'))) {
            $pd2Err = "password is required";
            $flag=0;
        } elseif($this->input->post('confirm_password')!=$this->input->post('passWord')){
            $pd2Err = "password is not the same";
            $flag=0;
        }
        $suc="";

        if($flag==1){
            $suc="Register successfully";
            $this->maindatabasemodel->register($data);
            $this->load->view('HeaderGuestView');
            $para["fnErr"] = $fnErr;
            $para["lnErr"] = $lnErr;
            $para["adErr"] = $adErr;
            $para["ccErr"] = $ccErr;
            $para["scErr"] = $scErr;
            $para["edErr"] = $edErr;
            $para["badErr"] = $badErr;
            $para["unErr"] = $unErr;
            $para["pdErr"] = $pdErr;
            $para["pd2Err"] = $pd2Err;
            $para["suc"] = $suc;
            $this->load->view('RegisterFormView',$para);
        } else{
            $this->load->view('HeaderGuestView');
            $para["fnErr"] = $fnErr;
            $para["lnErr"] = $lnErr;
            $para["adErr"] = $adErr;
            $para["ccErr"] = $ccErr;
            $para["scErr"] = $scErr;
            $para["edErr"] = $edErr;
            $para["badErr"] = $badErr;
            $para["unErr"] = $unErr;
            $para["pdErr"] = $pdErr;
            $para["pd2Err"] = $pd2Err;
            $para["suc"] = $suc;
            $this->load->view('RegisterFormView',$para);
        }

    }
    public function user_logout_process() {
        session_unset();
        $para['ProductCategoryDetails']=$this->maindatabasemodel->getProductCategory();
        $para['SpecialSalesProd']=$this->maindatabasemodel->getSpecialSalesProd();
        $this->load->view('HeaderGuestView');
        $this->load->view('IndexGuestView',$para);
    }
    public function user_login_process()
    {
        $loginErr = "";
        $nameErr = "";
        $pwdErr = "";
        if (empty($this->input->post('username'))) {
            $nameErr = "Name is required";
        } else {
            $data['username'] = $this->test_input($this->input->post('username'));
        }
        if (empty($this->input->post('password'))) {
            $pwdErr = "password is required";
        } else {
            $data['password'] = $this->test_input($this->input->post('password'));
        }

        if ($nameErr == "" && $pwdErr == "") {
            $result = $this->maindatabasemodel->login($data);
            echo 'login';
            if ($result == TRUE) {
                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $result = $this->maindatabasemodel->getCusID($data);
                foreach ($result as $r) {
                    $para['customerID'] = $r->customerID;
                }
                echo $para['customerID'];
                $_SESSION["customerID"] = $para['customerID'];
                $_SESSION["customerUsername"] = $data['username'];
                $_SESSION["customerLastActivitytime"] = time();
                $_SESSION["customerTimeout"] = 300;

                echo $_SESSION['customerID'];
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $para['customerLastActivitytime'] = $_SESSION["customerLastActivitytime"];
                $para['customerTimeout'] = $_SESSION["customerTimeout"];
                $this->load->view('HeaderLoginView', $para);
                $para["nameErr"] = $nameErr;
                $para["pwdErr"] = $pwdErr;
                $this->load->view('IndexLoginView', $para);
                if (isset($_SESSION["ssCart"]) && count($_SESSION["ssCart"]) != 0) {
                    foreach ($_SESSION["ssCart"] as $each_member) {
                        while (list($key, $value) = each($each_member)) {
                            if ($key == "ssCartProdID") {
                                $guestProdID = $value;
                            }
                            if ($key == "ssCartProdQty") {
                                $guestProdQty = $value;
                            }
                            if ($key == "ssCartProdPrice") {
                                $guestProdPrice = $value;
                            }
                            if ($key == "ssCartProdSalesPrice") {
                                $guestProdSalesPrice = $value;
                            }
                            if ($key == "ssCartProdSalesOrNot") {
                                $guestProdSalesOrNot = $value;
                            }
                        }
                        $data = array(
                            'customerID' => $_SESSION["customerID"],
                            'AddCartProdID' => $guestProdID,
                            'AddCartProdQty' => $guestProdQty,
                            'AddCartProdPrice' => $guestProdPrice,
                            'AddCartProdSalesPrice' => $guestProdSalesPrice,
                            'AddCartProdSalesOrNot' => $guestProdSalesOrNot
                        );
                        $this->maindatabasemodel->add2Cart($data);
                    }
                }
            } else {
                $loginErr="Invalid login";
                $this->load->view('HeaderGuestView');
                $para["nameErr"] = $nameErr;
                $para["pwdErr"] = $pwdErr;
                $para["loginErr"] = $loginErr;
                $this->load->view('LoginFormView', $para);
            }
        } else {
            $this->load->view('HeaderGuestView');
            $para["nameErr"] = $nameErr;
            $para["pwdErr"] = $pwdErr;
            $para["loginErr"] = $loginErr;
            $this->load->view('LoginFormView', $para);
        }
    }

    public function view_products_by_search(){
        $timeoutFlag = 0;
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $_SESSION["customerLastActivitytime"] = time();
            }
        }
        if ($timeoutFlag == 0) {
            if ((isset($_SESSION["customerID"]))) {
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);
            } else {
                $this->load->view('HeaderGuestView');
            }

            $data['searchProd'] = $this->test_input($this->input->post('searchProd'));
            $para['ProductSearch'] = $this->maindatabasemodel->getProductSearch($data);
            $para['SalesProductSearch'] = $this->maindatabasemodel->getSpecialSalesProd();
            $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
            $this->load->view('ProductsbySearchView', $para);
        }
    }

    public function view_products_by_category()
    {
        $timeoutFlag = 0;
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $_SESSION["customerLastActivitytime"] = time();
            }
        }
        if ($timeoutFlag == 0) {
            if ((isset($_SESSION["customerID"]))) {
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);
            } else {
                $this->load->view('HeaderGuestView');
            }

            $data['prodCatNm'] = $this->test_input($this->input->post('prodCatNm'));
            $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
            $para['SalesProductsbyCategory'] = $this->maindatabasemodel->getSalesProductsbyCategory($data);
            $para['OtherProductsbyCategory'] = $this->maindatabasemodel->getOtherProductsbyCategory($data);

            $this->load->view('ProductsbyCategoryView', $para);
        }
    }
    public function view_single_product() {
        $timeoutFlag = 0;
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $_SESSION["customerLastActivitytime"] = time();
            }
        }
        if ($timeoutFlag == 0) {
            if ((isset($_SESSION["customerID"]))) {
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);
            } else {
                $this->load->view('HeaderGuestView');
            }
            $data['prodID'] = $this->test_input($this->input->post('prodID'));
            $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
            $para['Product'] = $this->maindatabasemodel->getProduct($data);
            $para['ProductIsSale'] = $this->maindatabasemodel->ifProductSale($data);
            $para['SalesProduct'] = $this->maindatabasemodel->getSalesProduct($data);
            $para['OtherInterestedProductsbyCategory'] = $this->maindatabasemodel->getOtherInterestedProductsbyCategory($data);
            $this->load->view('ProductView', $para);
        }
    }
    public function add_to_cart(){
        $timeoutFlag = 0;
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $_SESSION["customerLastActivitytime"] = time();
            }
        }
        if ($timeoutFlag == 0) {
            if ((isset($_SESSION["customerID"]))) {
                $parah['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $parah);

                $data = array(
                    'customerID' => $this->session->userdata('customerID'),
                    'AddCartProdID' => $this->test_input($this->input->post('AddCartProdID')),
                    'AddCartProdQty' => $this->test_input($this->input->post('AddCartProdQty')),
                    'AddCartProdPrice' => $this->test_input($this->input->post('AddCartProdPrice')),
                    'AddCartProdSalesPrice' => $this->test_input($this->input->post('AddCartProdSalesPrice')),
                    'AddCartProdSalesOrNot' => $this->test_input($this->input->post('AddCartProdSalesOrNot'))
                );
                $result = $this->maindatabasemodel->add2Cart($data);
                if($result==false){
                    $para['exist'] = "Product exists";
                } else {
                    $para['exist'] = "";
                }

                $para['customerCart'] = $this->maindatabasemodel->getCusCart($data);
                $para['customerID'] = $this->session->userdata('customerID');
                $para['customerUsername'] = $this->session->userdata('customerUsername');
                $para['customerLastActivitytime'] = $this->session->userdata('customerLastActivitytime');
                $para['customerTimeout'] = $this->session->userdata('customerTimeout');
                $this->load->view('CartLoginView', $para);

            } else {
                $this->load->view('HeaderGuestView');
                $para['exist'] = "";
                if(isset($_SESSION["ssCart"])) {
                    $index = 0;
                    foreach ($_SESSION["ssCart"] as $each_member) {
                        $ssCartProdIDArray[] = $_SESSION["ssCart"][$index]["ssCartProdID"];
                        $index++;
                    }
                   // if (in_array($this->test_input($this->input->post('AddCartProdID')), $ssCartProdIDArray)) {
                     //   $para['exist'] = "Product exists";
                   // }
                }
                if($para['exist']=="")
                {
                    $_SESSION["ssCart"][] = array(
                        "ssCartProdID" => $this->test_input($this->input->post('AddCartProdID')),
                        "ssCartProdQty" => $this->test_input($this->input->post('AddCartProdQty')),
                        "ssCartProdPrice" => $this->test_input($this->input->post('AddCartProdPrice')),
                        "ssCartProdSalesPrice" => $this->test_input($this->input->post('AddCartProdSalesPrice')),
                        "ssCartProdSalesOrNot" => $this->test_input($this->input->post('AddCartProdSalesOrNot'))
                    );
                }

                $index = 0;
                foreach ($_SESSION["ssCart"] as $each_member) {
                    $ssCartProdIDArray[]=$_SESSION["ssCart"][$index]["ssCartProdID"];
                    $index++;
                }
                $para['sscustomerCart'] = $this->maindatabasemodel->getGuestCusCart($ssCartProdIDArray);
                $this->load->view('CartGuestView', $para, $_SESSION["ssCart"]);
            }
        }
    }
    public function view_cus_cart(){
        $timeoutFlag = 0;
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $_SESSION["customerLastActivitytime"] = time();
            }
        }
        if ($timeoutFlag == 0) {
            if ((isset($_SESSION["customerID"]))) {
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);

                $data = array(
                    'customerID' => $this->session->userdata('customerID')
                );
                $para['customerCart'] = $this->maindatabasemodel->getCusCart($data);

                $this->load->view('CartLoginView', $para);

            } else {
                $this->load->view('HeaderGuestView');
                if (!isset($_SESSION["ssCart"])) {
                    $this->load->view('CartEmptyView');
                }elseif(count($_SESSION["ssCart"])==0) {
                    $this->load->view('CartEmptyView');
                }else{
                    $index = 0;
                    foreach ($_SESSION["ssCart"] as $each_member) {
                        $ssCartProdIDArray[]=$_SESSION["ssCart"][$index]["ssCartProdID"];
                        $index++;
                    }
                    $para['sscustomerCart'] = $this->maindatabasemodel->getGuestCusCart($ssCartProdIDArray);
                    $this->load->view('CartGuestView', $para, $_SESSION["ssCart"]);
                }
            }
        }
    }
    public function update_cus_cart(){
        $timeoutFlag = 0;
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $_SESSION["customerLastActivitytime"] = time();
            }
        }
        if ($timeoutFlag == 0) {
            if ((isset($_SESSION["customerID"]))) {
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);
                $data = array(
                    'customerID' => $this->session->userdata('customerID'),
                    'ProdID' => $this->test_input($this->input->post('ProdID')),
                    'Qty' => $this->test_input($this->input->post('quantity')),
                    'Action' => $this->test_input($this->input->post('submit'))
                );
                $this->maindatabasemodel->upCusCart($data);

                $para['customerCart'] = $this->maindatabasemodel->getCusCart($data);
                $this->load->view('CartLoginView', $para);
            } else {
                $this->load->view('HeaderGuestView');
                $s= $this->test_input($this->input->post('submit'));
                if (!strcmp($s, "Change")) {
                    $index = 0;
                    foreach ($_SESSION["ssCart"] as $each_member) {
                        if ($_SESSION["ssCart"][$index]["ssCartProdID"] == $this->test_input($this->input->post("ProdID"))) {
                            $_SESSION["ssCart"][$index]["ssCartProdQty"] = $this->test_input($this->input->post("quantity"));
                        }

                        $index++;
                    }
                }elseif (!strcmp($s, "Delete")) {
                    $index = 0;
                    foreach ($_SESSION["ssCart"] as $each_member) {
                        if ($_SESSION["ssCart"][$index]["ssCartProdID"] == $this->test_input($this->input->post("ProdID"))) {
                            unset($_SESSION["ssCart"][$index]);
                        }
                        $index++;
                    }
                    $temp = array_values($_SESSION["ssCart"]);
                    $_SESSION["ssCart"] = $temp;
                }elseif (!strcmp($s, "Delete All")) {
                    $index = 0;
                    foreach ($_SESSION["ssCart"] as $each_member) {
                        unset($_SESSION["ssCart"][$index]);
                        $index++;
                    }
                }
                if (!isset($_SESSION["ssCart"])) {
                    $this->load->view('CartEmptyView');
                }elseif(count($_SESSION["ssCart"])==0) {
                    $this->load->view('CartEmptyView');
                }else{
                    $index = 0;
                    foreach ($_SESSION["ssCart"] as $each_member) {
                        $ssCartProdIDArray[]=$_SESSION["ssCart"][$index]["ssCartProdID"];
                        $index++;
                    }
                    $para['sscustomerCart'] = $this->maindatabasemodel->getGuestCusCart($ssCartProdIDArray);
                    $this->load->view('CartGuestView', $para, $_SESSION["ssCart"]);
                }

            }
        }
    }
    public function view_cus_account(){
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $_SESSION["customerLastActivitytime"] = time();

                $data = array(
                    'customerID' => $this->session->userdata('customerID'),
                );

                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView',$para);
                $para['customerAccount']=$this->maindatabasemodel->getCusAccount($data);
                $this->load->view('CusAccountView', $para);
            }
        }
    }
    public function change_cus_account(){
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $flag=1;
                $fnErr = "";
                if (empty($this->input->post('fname'))) {
                    $fnErr = "First name is required";
                    $flag=0;
                } else {
                    $data['fname']=$this->test_input($this->input->post('fname'));
                }
                $lnErr = "";
                if (empty($this->input->post('lname'))) {
                    $lnErr = "Last name is required";
                    $flag=0;
                } else {
                    $data['lname']=$this->test_input($this->input->post('lname'));
                }
                $adErr = "";
                if (empty($this->input->post('address'))) {
                    $adErr = "Shipping address is required";
                    $flag=0;
                } else {
                    $data['address']=$this->test_input($this->input->post('address'));
                }
                $ccErr = "";
                if (empty($this->input->post('creditCard'))) {
                    $ccErr = "Credit card number is required";
                    $flag=0;
                } else {
                    $data['creditCard']=$this->test_input($this->input->post('creditCard'));
                }
                $scErr = "";
                if (empty($this->input->post('securityCode'))) {
                    $scErr = "Security number is required";
                    $flag=0;
                } else {
                    $data['securityCode']=$this->test_input($this->input->post('securityCode'));
                }
                $edErr = "";
                if (empty($this->input->post('expirDate'))) {
                    $edErr = "Expire Date is required";
                    $flag=0;
                } else {
                    $data['expirDate']=$this->test_input($this->input->post('expirDate'));
                }
                $badErr = "";
                if (empty($this->input->post('billAddress'))) {
                    $badErr = "Billing address is required";
                    $flag=0;
                } else {
                    $data['billAddress']=$this->test_input($this->input->post('billAddress'));
                }
                $unErr = "";
                if (empty($this->input->post('userName'))) {
                    $unErr = "username is required";
                    $flag=0;
                } else {
                    $data['userName']=$this->test_input($this->input->post('userName'));
                }
                $pdErr = "";
                if (empty($this->input->post('passWord'))) {
                    $pdErr = "password is required";
                    $flag=0;
                } else {
                    $data['passWord']=$this->test_input($this->input->post('passWord'));
                }
                $pd2Err = "";
                if (empty($this->input->post('confirm_password'))) {
                    $pd2Err = "password is required";
                    $flag=0;
                } elseif($this->input->post('confirm_password')!=$this->input->post('passWord')){
                    $pd2Err = "password is not the same";
                    $flag=0;
                }
                $suc="";

                if($flag==1) {
                    $suc = "Change successfully";
                    $data['customerID'] = $this->session->userdata('customerID');
                    $this->maindatabasemodel->changeCusAccount($data);
                }

                $para["fnErr"] = $fnErr;
                $para["lnErr"] = $lnErr;
                $para["adErr"] = $adErr;
                $para["ccErr"] = $ccErr;
                $para["scErr"] = $scErr;
                $para["edErr"] = $edErr;
                $para["badErr"] = $badErr;
                $para["unErr"] = $unErr;
                $para["pdErr"] = $pdErr;
                $para["pd2Err"] = $pd2Err;
                $para["suc"] = $suc;

                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);
                $data['customerID'] = $this->session->userdata('customerID');
                $para['customerAccount']=$this->maindatabasemodel->getCusAccount($data);
                $this->load->view('CusAccountView', $para);
            }
        }
    }
    public function cus_checkout(){
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $data['customerID'] = $this->session->userdata('customerID');
                $para['cusConfirmOrder'] = $this->maindatabasemodel->confirmOrder($data);
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);
                $this->load->view('CusConfirmOrderView', $para);
            }
        }
    }
    public function cus_place_order(){
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $data['customerID'] = $this->session->userdata('customerID');
                $this->maindatabasemodel->placeOrder($data);

                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);

                $data['customerID'] = $this->session->userdata('customerID');
                $para['customerOrder'] = $this->maindatabasemodel->getCusOrder($data);
                $this->load->view('CusOrderView', $para);
            }
        }
    }
    public function view_cus_order(){
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);

                $data['customerID'] = $this->session->userdata('customerID');
                $para['customerOrder'] = $this->maindatabasemodel->getCusOrder($data);
                $this->load->view('CusOrderView', $para);
            }
        }
    }
    public function view_cus_order_details(){
        if ((isset($_SESSION["customerID"]))) {
            if ((time() - $_SESSION["customerLastActivitytime"]) > $_SESSION["customerTimeout"]) {
                $timeoutFlag = 1;
                echo "<script>alert('Inactivity for " . $_SESSION["customerTimeout"] . "s!');</script>";
                session_unset();

                $para['ProductCategoryDetails'] = $this->maindatabasemodel->getProductCategory();
                $para['SpecialSalesProd'] = $this->maindatabasemodel->getSpecialSalesProd();
                $this->load->view('HeaderGuestView');
                $this->load->view('IndexGuestView', $para);
            } else {
                $para['customerUsername'] = $_SESSION["customerUsername"];
                $this->load->view('HeaderLoginView', $para);

                $data['orderID'] = $this->test_input($this->input->post('orderID'));
                $para['customerOrderDetails'] = $this->maindatabasemodel->getCusOrderDetail($data);
                $this->load->view('CusOrderDetailsView', $para);
            }
        }
    }
}

/* End of file maincontroller.php */
/* Location: ./application/controllers/maincontroller.php */