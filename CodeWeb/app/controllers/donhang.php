<?php

class donhang extends DController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function donhang($phone)
    {
        Session::init();
        
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $table_order_details = 'tbl_order_details';
        $table_product = 'tbl_product';
        $cond = "$table_product.id_product = $table_order_details.product_id AND $table_order_details.sodienthoai = '$phone'";
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        $data['order_details'] = $categorymodel->list_order_details($table_product, $table_order_details, $cond);
        
        $this->load->view('header', $data);
        // $this->load->view('slider');
        $this->load->view('purchaseorder', $data);
        $this->load->view('footer');
    }

    public function edit_donhang($order_code)
    {
        if (isset($_POST['delete_order'])) {
            $table_order_details = 'tbl_order_details';
            $ordermodel = $this->load->model('ordermodel');
            $cond = "$table_order_details.order_code = $order_code";
            try {
                $result = $ordermodel->delete_order($table_order_details, $cond);
                if ($result == 1) {
                    Session::init();
                    $_SESSION['msg'] = 'Xóa đơn hàng thành công!';
                    header('Location:' . BASE_URL . "/donhang/donhang/" . $_SESSION['customer_phone']);
                }
            } catch (Exception $e) {
                Session::init();
                $_SESSION['msg'] = 'Xóa đơn hàng thất bại!';
                header('Location:' . BASE_URL . "/donhang/donhang/" . $_SESSION['customer_phone']);
            }
        }else if (isset($_POST['update_order'])) {
            
        }
    }
}