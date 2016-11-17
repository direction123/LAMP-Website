<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class maindatabasemodel extends CI_Model {
	public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
            $this->load->database(); 
    }

	// Read data using username and password
    public function login($data) {
        $sql = "select * from Customer where customerUsername = ? and customerPassword = password(?)";
        $query = $this->db->query($sql,array($data['username'], $data['password']));

        if (count($query->result()) != 0) {
            return true;
        } else {
            return false;
        }
    }
    public function register($data) {
        $sql = "INSERT INTO Customer (customerFirstname,customerLastname,customerAddress,customerCreditcard,customerSecuritycode,customerexpirationDate,
    customerBillingAddress, customerUsername,customerPassword) VALUES (?,?,?,?,?,?,?,?,password(?))";
        $query = $this->db->query($sql,array($data['fname'],$data['lname'],$data['address'],$data['creditCard'],
            $data['securityCode'],$data['expirDate'],$data['billAddress'],$data['userName'],$data['passWord']));
    }

    public function getCusID($data){
        $sql = "select customerID from Customer where customerUsername = ?";
        $query = $this->db->query($sql, $data['username']);
        return $query->result();
    }
    public function getProductCategory(){
        $query = $this->db->get('ProductCategory');
        return $query->result();
    }
    public function getProductSearch($data){
        $sql = "select * from Product as p, ProductCategory as pc, ProductCategoryProduct as pcp
where p.productID = pcp.productID  and pc.productCategoryID= pcp.productCategoryID and p.productName like ? group by p.productID";
        $query = $this->db->query($sql, '%'.$data['searchProd'].'%');
        return $query->result();
    }
    public function getSpecialSalesProd(){
        $sql = 'select * from SpecialSales as ss, Product as p where ss.productID = p.productID';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getSalesProductsbyCategory($data){
        $sql = "select * from Product as p, ProductCategory as pc, ProductCategoryProduct as pcp, SpecialSales as ss where p.productID = pcp.productID
        and pc.productCategoryID= pcp.productCategoryID and ss.productID=p.productID and pc.productCategoryName=?";
        $query = $this->db->query($sql, $data['prodCatNm']);
        return $query->result();
    }
    public function getOtherProductsbyCategory($data){
        $sql = "select * from Product as p, ProductCategory as pc, ProductCategoryProduct as pcp where p.productID = pcp.productID
        and pc.productCategoryID= pcp.productCategoryID and pc.productCategoryName=? and
        (p.productID not in (select ProductID from SpecialSales))";
        $query = $this->db->query($sql, $data['prodCatNm']);
        return $query->result();
    }
    public function getOtherInterestedProductsbyCategory($data){
       // $sql = "select * from Product as p, ProductCategory as pc, ProductCategoryProduct as pcp where p.productID = pcp.productID
       // and pc.productCategoryID= pcp.productCategoryID and (pcp.productCategoryID in
       // (select productCategoryID from ProductCategoryProduct where productID=?)) and pcp.productID=?";
        $sql = "select * from Product as p, ProductCategory as pc, ProductCategoryProduct as pcp where p.productID = pcp.productID
        and pc.productCategoryID= pcp.productCategoryID and (p.productID != ?) and (pcp.productCategoryID in
        (select productCategoryID from ProductCategoryProduct where productID=?))";
        $query = $this->db->query($sql, array($data['prodID'], $data['prodID']));
        return $query->result();
    }
    public function getProduct($data){
        $sql = "select * from Product as p, ProductCategory as pc, ProductCategoryProduct as pcp where p.productID = pcp.productID
        and pc.productCategoryID= pcp.productCategoryID and p.productID=? group by p.productID";
        $query = $this->db->query($sql, $data['prodID']);
        return $query->result();
    }
    public function ifProductSale($data) {
        $sql = "select * from SpecialSales where productID=?";
        $query = $this->db->query($sql, $data['prodID']);

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function getSalesProduct($data){
        $sql = "select * from Product as p, ProductCategory as pc, ProductCategoryProduct as pcp, SpecialSales as ss where p.productID = pcp.productID
        and pc.productCategoryID= pcp.productCategoryID and ss.productID=p.productID and p.productID=?";
        $query = $this->db->query($sql,$data['prodID']);
        return $query->result();
    }
    public function add2Cart($data){
        $sqlD= "select * from ShoppingCart where productID = ? and customerID = ?";
        $queryD = $this->db->query($sqlD,array($data['AddCartProdID'],$data["customerID"]));
        if (count($queryD->result()) != 0) {
            return false;
        } else {
            $sql = "INSERT INTO ShoppingCart (productID,quantity,productPrice,productSalesPrice, productSalesOrNot, customerID) VALUES
       (?, ?, ?, ?, ?, ?)";
            $query = $this->db->query($sql,array($data['AddCartProdID'],$data['AddCartProdQty'], $data['AddCartProdPrice'],$data['AddCartProdSalesPrice'],
                $data['AddCartProdSalesOrNot'],$data["customerID"]));
            return true;
        }
    }
    public function getCusCart($data){
        $sql = "select * from ShoppingCart as sc, Product as p where sc.productID=p.productID and customerID =?";
        $query = $this->db->query($sql, $data["customerID"]);
        return $query->result();
    }
    public function getGuestCusCart($ssCartProdIDArray){
        for($i=0;$i<count($ssCartProdIDArray);$i++){
            $test[]=$ssCartProdIDArray[$i];
        }
        $sql = "SELECT * FROM Product WHERE productID in (?)";
        $query = $this->db->query($sql, $test);
        return $query->result();
    }
    public function upCusCart($data){
        if($data["Action"]=="Change"){
            $sql = "update ShoppingCart set quantity=? where productID=? and customerID=?";
            $query = $this->db->query($sql, array($data["Qty"], $data["ProdID"], $data["customerID"]));
        }elseif($data["Action"]=="Delete"){
            $sql = "delete from ShoppingCart where productID=? and customerID=?";
            $query = $this->db->query($sql, array($data["ProdID"], $data["customerID"]));
        } elseif($data["Action"]=="Delete All"){
            $sql = "delete from ShoppingCart where customerID=?";
            $query = $this->db->query($sql, $data["customerID"]);
        }

    }
    public function getCusAccount($data){
        $sql = "select * from Customer where customerID =?";
        $query = $this->db->query($sql, $data["customerID"]);
        return $query->result();
    }
    public function changeCusAccount($data){
        $sql = "update Customer set customerFirstname=?, customerLastname=?,customerAddress=?,
             customerCreditcard=?,customerSecuritycode=?,customerexpirationDate=?,
             customerBillingAddress=?, customerUsername=?,customerPassword=password(?) where customerID=?";
        $query = $this->db->query($sql,array($data['fname'],$data['lname'],$data['address'],$data['creditCard'],
            $data['securityCode'],$data['expirDate'],$data['billAddress'],$data['userName'],$data['passWord'],$data['customerID']));
    }
    public function confirmOrder($data){
        $sql = "select * from Customer as c, ShoppingCart as sc, Product as p where c.customerID = sc.customerID and p.productID=sc.productID
        and c.customerID = ?";
        $query = $this->db->query($sql, $data["customerID"]);
        return $query->result();
    }
    public function placeOrder($data){
        $sql = "select * from Customer where customerID =?";
        $query = $this->db->query($sql, $data["customerID"]);

        $sql2 = "INSERT INTO Orders (orderDate, customerID, customerFirstname, customerLastname, customerAddress, customerCreditcard, customerSecuritycode,
customerexpirationDate,customerBillingAddress) VALUES ( CURDATE(),'".$data["customerID"]."',?,?,?,?,?,?,?)";
        $query2 = $this->db->query($sql2, array($query->result()[0]->customerFirstname, $query->result()[0]->customerLastname,
            $query->result()[0]->customerAddress,$query->result()[0]->customerCreditcard,$query->result()[0]->customerSecuritycode,
            $query->result()[0]->customerexpirationDate,$query->result()[0]->customerBillingAddress));

        $sql3 = "select MAX(orderID) as max from Orders where customerID = ?";
        $query3 = $this->db->query($sql3, $data["customerID"]);

        $sql4= "select * from ShoppingCart where customerID = ?";
        $query4 = $this->db->query($sql4, $data["customerID"]);

        foreach ($query4->result() as $pSC) {
            $sql5 = "INSERT INTO OrderItems (orderID, productID, quantity, productPrice,productSalesPrice,productSalesOrNot) VALUES
             (?,?,?,?,?,?)";
            $query5 = $this->db->query($sql5, array($query3->result()[0]->max, $pSC->productID, $pSC->quantity, $pSC->productPrice,
                $pSC->productSalesPrice,$pSC->productSalesOrNot));
        }
        $sql6 = "delete from ShoppingCart where customerID =?";
        $query6 = $this->db->query($sql6, $data["customerID"]);
    }
    public function getCusOrder($data){
        $sql = "select * from Orders where customerID = ?";
        $query = $this->db->query($sql, $data["customerID"]);
        return $query->result();
    }
    public function getCusOrderDetail($data){
        $sql = "select * from Orders as o, OrderItems as oi, Product as p where o.orderID=oi.orderID and oi.productID=p.productID and o.orderID=?";
        $query = $this->db->query($sql, $data["orderID"]);
        return $query->result();
    }

}

/* End of file maindatabasemodel.php */
/* Location: ./application/models/maindatabasemodel.php */