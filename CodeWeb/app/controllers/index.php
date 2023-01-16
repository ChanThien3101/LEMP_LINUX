<?php

class index extends DController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Session::init();
        $this->homepage();
    }

    public function homepage()
    {

        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        
        $table_product = 'tbl_product';
        $table_post = 'tbl_post';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $data['product_index'] = $categorymodel->list_product_index($table_product);
        $data['post_index'] = $categorymodel->post_index($table_post);
        
        $this->load->view('header', $data);
        $this->load->view('slider', $data);
//         echo "<pre>";
//         print_r($_SESSION['customer_id']);
//         echo "</pre>";
        $this->load->view('home', $data);
        $this->load->view('footer');
    }


    public function notfound()
    {
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $this->load->view('header', $data);
        $this->load->view('404');
        $this->load->view('footer');
    }
    public function admin_404()
    {
        $this->load->view('cpanel/404');
       
    }
}
?>