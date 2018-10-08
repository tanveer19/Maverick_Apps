<?php

class Application {
    //put your code here
    private $db_connect;
    public function __construct() {
        $host_name='localhost';
        $user_name='root';
        $password='';
        $db_name='maverick_apps';
        $this->db_connect=mysqli_connect($host_name, $user_name, $password, $db_name);
        if(!$this->db_connect) {
            die('Connection Fail'.  mysqli_error($this->db_connect) );
        }
    }
    public function select_all_recent_category_info() {
        $sql='SELECT * FROM tbl_category WHERE publication_status=1';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }

    public function select_all_recent_product_info() {
        $sql='SELECT * FROM tbl_product WHERE publication_status=1';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
   
//    public function select_published_product_by_category_id($category_id) {
//        $sql="SELECT * FROM tbl_product WHERE category_id='$category_id' AND publication_status=1";
//        if(mysqli_query($this->db_connect, $sql)) {
//           $query_result=mysqli_query($this->db_connect, $sql);
//           return $query_result;
//        }else {
//            die('Query problem'.  mysqli_error($this->db_connect) );   
//        }
//    }
//    public function select_product_info_by_id($product_id) {
//        $sql="SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id='$product_id' ";
//        if(mysqli_query($this->db_connect, $sql)) {
//           $query_result=mysqli_query($this->db_connect, $sql);
//           return $query_result;
//        }else {
//            die('Query problem'.  mysqli_error($this->db_connect) );   
//        }
//    }
    
//    features
     public function select_all_recent_feature_info() {
        $sql='SELECT * FROM tbl_feature WHERE publication_status=1';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    
     public function select_all_recent_pages_info() {
        $sql='SELECT * FROM tbl_pages WHERE publication_status=1';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    
    
    
}
