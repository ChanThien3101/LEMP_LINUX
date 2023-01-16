<?php

class tintuc extends DController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->danhmuc();
    }

    public function tatca()
    {
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        
        $post = 'tbl_post';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $data['list_post'] = $categorymodel->list_post_home($post);
        
        $this->load->view('header', $data);
        // $this->load->view('slider');
        $this->load->view('list_post', $data);
        $this->load->view('footer');
    }

    public function danhmuc($id)
    {
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        
        $table_post = 'tbl_post';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $data['postbyid'] = $categorymodel->postbyid_home($table_cate_post, $table_post, $id);
        
        $this->load->view('header', $data);
        // $this->load->view('slider');
        $this->load->view('categorypost', $data);
        $this->load->view('footer');
    }

    public function chitiettin($id)
    {
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $table_post = 'tbl_post';
        $cond = "$table_cate_post.id_category_post = $table_post.id_category_post AND $table_post.id_post = $id";
        
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $data['details_post'] = $categorymodel->details_post_home($table_cate_post, $table_post, $cond);
        
        foreach ($data['details_post'] as $key => $cate) {
            $id_cate = $cate['id_category_post'];
        }
        
        $cond_related = "$table_cate_post.id_category_post = $table_post.id_category_post AND $table_cate_post.id_category_post = '$id_cate' AND $table_post.id_post NOT IN('$id')";
        $data['related_post'] = $categorymodel->related_post_home($table_cate_post, $table_post, $cond_related);
        
        $this->load->view('header', $data);
        // $this->load->view('slider');
        $this->load->view('details_post',$data);
        $this->load->view('footer');
    }
}
?>