<?php

class Super_admin {

    private $db_connect;

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'maverick_apps';
        $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->db_connect) {
            die('Connection Fail' . mysqli_error($this->db_connect));
        }
    }

    
    
    
    
   
    
    public function logout() {

        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);

        header('Location: index.php');
    }

    //features
     public function save_feature_info($data) {
        $sql = "INSERT INTO tbl_feature (feature_name, feature_description, publication_status) VALUES ('$data[feature_name]', '$data[feature_description]', '$data[publication_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "feature info save successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    
    public function select_all_feature_info() {
        $sql = "SELECT * FROM tbl_feature";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
     public function unpublished_feature_by_id($feature_id) {
        $sql = "UPDATE tbl_feature SET publication_status= 0 WHERE feature_id='$feature_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "feature info unpublished successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function published_feature_by_id($feature_id) {
        $sql = "UPDATE tbl_feature SET publication_status= 1 WHERE feature_id='$feature_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "feature info published successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
     public function select_feature_info_by_id($feature_id) {
        $sql = "SELECT * FROM tbl_feature WHERE feature_id='$feature_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_feature_info($data) {
        $sql = "UPDATE tbl_feature SET feature_name='$data[feature_name]', feature_description='$data[feature_description]' , publication_status='$data[publication_status]' WHERE feature_id='$data[feature_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'feature info update successfully';

            header('Location: manage_feature.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function delete_feature_by_id($feature_id) {
        $sql = "DELETE FROM tbl_feature WHERE feature_id='$feature_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "feature info delete successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    } 
   //products
    
    public function select_all_product_info() {
        $sql = "SELECT * FROM tbl_product";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
     public function unpublished_product_by_id($product_id) {
        $sql = "UPDATE tbl_product SET publication_status= 0 WHERE product_id='$product_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "product info unpublished successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function published_product_by_id($product_id) {
        $sql = "UPDATE tbl_product SET publication_status= 1 WHERE product_id='$product_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "product info published successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
     public function select_product_info_by_id($product_id) {
        $sql = "SELECT * FROM tbl_product WHERE product_id='$product_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_product_info($data) {
        $sql = "UPDATE tbl_product SET product_name='$data[product_name]', product_short_description='$data[product_short_description]' , publication_status='$data[publication_status]' WHERE product_id='$data[product_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'product info update successfully';

            header('Location: manage_product.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function delete_product_by_id($product_id) {
        $sql = "DELETE FROM tbl_product WHERE product_id='$product_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "product info delete successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function save_product_info($data) {
        $directory = '../assets/admin_assets/product_images/';
        $target_file = $directory . $_FILES['product_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['product_image']['size'];
        $image = getimagesize($_FILES['product_image']['tmp_name']);
        if ($image) {
            if (file_exists($target_file)) {
                echo 'This image already exists';
                exit();
            } else {
                if ($file_size > 5242880) {
                    echo 'File size is too large. Please select a file within 5MB';
                    exit();
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png') {
                        die('File type is not valid');
                    } else {
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                        $sql = "INSERT INTO tbl_product (product_name, category_id, product_short_description, product_long_description, product_image, publication_status) VALUES ('$data[product_name]', '$data[category_id]', '$data[product_short_description]', '$data[product_long_description]', '$target_file', '$data[publication_status]')";
                        if(mysqli_query($this->db_connect, $sql)) {
                            $message="Product information create successfully";
                            return $message;
                        } else {
                            die('Query problem'.  mysqli_error($this->db_connect) );   
                        }
                    }
                }
            }
        } else {
            echo 'You must upload a valid image to create new product in this system.';
            exit();
        }
    }
    //category 
    
    public function save_category_info($data) {
        $sql = "INSERT INTO tbl_category (category_name, category_description, publication_status) VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "category info save successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
   

    public function select_all_category_info() {
        $sql = "SELECT * FROM tbl_category";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    

    public function unpublished_category_by_id($category_id) {
        $sql = "UPDATE tbl_category SET publication_status= 0 WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Category info unpublished successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
   

    public function published_category_by_id($category_id) {
        $sql = "UPDATE tbl_category SET publication_status= 1 WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Category info published successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    

    public function select_category_info_by_id($category_id) {
        $sql = "SELECT * FROM tbl_category WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
   

    public function update_category_info($data) {
        $sql = "UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]' , publication_status='$data[publication_status]' WHERE category_id='$data[category_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'Category info update successfully';

            header('Location: manage_category.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    

    public function delete_category_by_id($category_id) {
        $sql = "DELETE FROM tbl_category WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Category info delete successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    
    //pages
    public function save_pages_info($data) {
        $sql = "INSERT INTO tbl_pages (pages_name, pages_description, publication_status) VALUES ('$data[pages_name]', '$data[pages_description]', '$data[publication_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "pages info save successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
   

    public function select_all_pages_info() {
        $sql = "SELECT * FROM tbl_pages";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    

    public function unpublished_pages_by_id($pages_id) {
        $sql = "UPDATE tbl_pages SET publication_status= 0 WHERE pages_id='$pages_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "pages info unpublished successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
   

    public function published_pages_by_id($pages_id) {
        $sql = "UPDATE tbl_pages SET publication_status= 1 WHERE pages_id='$pages_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "pages info published successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    

    public function select_pages_info_by_id($pages_id) {
        $sql = "SELECT * FROM tbl_pages WHERE pages_id='$pages_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
   

    public function update_pages_info($data) {
        $sql = "UPDATE tbl_pages SET pages_name='$data[pages_name]', pages_description='$data[pages_description]' , publication_status='$data[publication_status]' WHERE pages_id='$data[pages_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'pages info update successfully';

            header('Location: manage_pages.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    

    public function delete_pages_by_id($pages_id) {
        $sql = "DELETE FROM tbl_pages WHERE pages_id='$pages_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "pages info delete successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    
    
}
