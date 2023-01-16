<?php

class product extends DController
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->add_category();
    }
    
    /**
     * *********************CATEGORY**********************
     */
    public function add_category()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/add_category');
        $this->load->view('cpanel/footer');
    }
    
    public function insert_category()
    {
        try {
            $title = $_POST['title_category_product'];
            $desc = $_POST['desc_category_product'];
            
            $table = "tbl_category_product";
            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc
            );
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->insertcategory($table, $data);
            
            if ($result == 1) {
                header('Location:' . BASE_URL . "/product");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
    }
    
    public function list_category()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        
        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category($table);
        $this->load->view('cpanel/product/list_category', $data);
        
        $this->load->view('cpanel/footer');
    }
    
    public function delete_category($id)
    {
        try {
            $table = "tbl_category_product";
            // $cond = "tbl_category_product.id_category_product=$id";
            $cond = "id_category_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->deletecategory($table, $cond);
            if ($result == 1) {
                header('Location:' . BASE_URL . "/product/list_category");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
    }
    
    public function edit_category($id)
    {
        $table = "tbl_category_product";
        $cond = "id_category_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        $data['categorybyid'] = $categorymodel->categorybyid($table, $cond);
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/edit_category', $data);
        $this->load->view('cpanel/footer');
    }
    
    public function update_category_product($id)
    {
        try {
            
            $table = "tbl_category_product";
            $cond = "id_category_product='$id'";
            
            $title = $_POST['title_category_product'];
            $desc = $_POST['desc_category_product'];
            
            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc
            );
            
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->updatecategory($table, $data, $cond);
            
            if ($result == 1) {
                header('Location:' . BASE_URL . "/product/list_category");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
    }
    
    /**
     * *********************PRODUCT**********************
     */
    public function add_product()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        
        $table = "tbl_category_product";
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category($table);
        
        $this->load->view('cpanel/product/add_product', $data);
        $this->load->view('cpanel/footer');
    }
    
    public function insert_product()
    {
        try {
            $title = $_POST['title_product'];
            $desc = $_POST['desc_product'];
            $price = $_POST['price_product'];
            $quantity = $_POST['quantity_product'];
            $hot = $_POST['product_hot'];
            
            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode(".", $image); // chuyen doi chuoi thanh mang
            $file_ext = strtolower(end($div)); // doi tat ca thanh chu thuong, lay đuôi mở rộng
            $unique_image = $div[0] . time() . '.' . $file_ext;
            $path_uploads = "public/uploads/product/" . $unique_image;
            
            $category = $_POST['category_product'];
            
            $table = "tbl_product";
            $data = array(
                'title_product' => $title,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'price_product' => $price,
                'image_product' => $unique_image,
                'id_category_product' => $category,
                'product_hot' => $hot
            );
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->insertproduct($table, $data);
            
            if ($result == 1) {
                move_uploaded_file($tmp_image, $path_uploads);
                header('Location:' . BASE_URL . "/product/add_product");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
    }
    
    public function list_product()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        
        $table_product = "tbl_product";
        $table_category = "tbl_category_product";
        
        $categorymodel = $this->load->model('categorymodel');
        $data['product'] = $categorymodel->product($table_product, $table_category);
        $this->load->view('cpanel/product/list_product', $data);
        
        $this->load->view('cpanel/footer');
    }
    
    public function delete_product($id)
    {
        try {
            $table = "tbl_product";
            // $cond = "tbl_category_product.id_category_product=$id";
            $cond = "id_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
            
            $data['productbyid'] = $categorymodel->productbyid($table, $cond);
            foreach ($data['productbyid'] as $key => $value) {
                $path_unlink = "public/uploads/product/";
                unlink($path_unlink . $value['image_product']); // xoa hinh anh cu
            }
            
            $result = $categorymodel->deleteproduct($table, $cond);
            
            if ($result == 1) {
                header('Location:' . BASE_URL . "/product/list_product");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
    }
    
    public function edit_product($id)
    {
        $table_product = "tbl_product";
        $table_category = "tbl_category_product";
        $cond = "id_product='$id'";
        $categorymodel = $this->load->model('categorymodel');
        
        $data['productbyid'] = $categorymodel->productbyid($table_product, $cond);
        $data['category'] = $categorymodel->category($table_category);
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/product/edit_product', $data);
        $this->load->view('cpanel/footer');
    }
    
    public function update_product($id)
    {
        try {
            $table = "tbl_product";
            $cond = "id_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
            
            $title = $_POST['title_product'];
            $desc = $_POST['desc_product'];
            $price = $_POST['price_product'];
            $quantity = $_POST['quantity_product'];
            $category = $_POST['category_product'];
            $hot = $_POST['product_hot'];
            
            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode(".", $image); // chuyen doi chuoi thanh mang
            $file_ext = strtolower(end($div)); // doi tat ca thanh chu thuong, lay đuôi mở rộng
            $unique_image = $div[0] . time() . '.' . $file_ext;
            $path_uploads = "public/uploads/product/" . $unique_image;
            
            if ($image) {
                $data['productbyid'] = $categorymodel->productbyid($table, $cond);
                
                foreach ($data['productbyid'] as $key => $value) {
                    $path_unlink = "public/uploads/product/";
                    unlink($path_unlink . $value['image_product']); // xoa hinh anh cu
                }
                
                $data = array(
                    'title_product' => $title,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'price_product' => $price,
                    'image_product' => $unique_image,
                    'id_category_product' => $category,
                    'product_hot' => $hot
                );
                move_uploaded_file($tmp_image, $path_uploads); // them hinh anh moi
            } else {
                $data = array(
                    'title_product' => $title,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'price_product' => $price,
                    // 'image_product' => $unique_image,
                    'id_category_product' => $category,
                    'product_hot' => $hot
                );
            }
            
            $result = $categorymodel->updateproduct($table, $data, $cond);
            
            if ($result == 1) {
                header('Location:' . BASE_URL . "/product/list_product");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
    }
   
    public function ajaxload(){
        $table_product = 'tbl_product';
        $categorymodel = $this->load->model('categorymodel');
        $result = $categorymodel->demsanpham($table_product,45);
         return [2,3,4,5];
        
        
    }
}
?>