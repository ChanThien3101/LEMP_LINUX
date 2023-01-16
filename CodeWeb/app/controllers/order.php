<?php

class order extends DController
{

    public function __construct()
    {
        
        parent::__construct();
    }

    public function index()
    {
        Session::checkSession();
        $this->order();
        
    }

    // lay danh sach tat ca don hang
    public function order()
    {
        $ordermodel = $this->load->model('ordermodel');
        $table_order = 'tbl_order';
        $data['order'] = $ordermodel->list_order($table_order);
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        
        $this->load->view('cpanel/order/order', $data);
        $this->load->view('cpanel/footer');
    }

    // chi tiet don hang
    public function order_details($order_code)
    {
        Session::checkSession();
        $ordermodel = $this->load->model('ordermodel');
        $table_order_details = 'tbl_order_details';
        $table_product = 'tbl_product';
        $cond = "$table_product.id_product = $table_order_details.product_id AND $table_order_details.order_code = '$order_code'";
        $cond_info = "$table_order_details.order_code = '$order_code'";
        
        $data['order_details'] = $ordermodel->list_order_details($table_product, $table_order_details, $cond);
        $data['order_info'] = $ordermodel->list_info_details($table_order_details, $cond_info);
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        
        $this->load->view('cpanel/order/order_details', $data);
        $this->load->view('cpanel/footer');
    }

    // xu li xac nhan don hang
    public function order_confirm($order_code)
    {
        $ordermodel = $this->load->model('ordermodel');
        $table_order = 'tbl_order';
        $cond = "$table_order.order_code = $order_code";
        $data = array(
            'order_status'=>1
        );
        $result = $ordermodel->order_confirm($table_order,$data,$cond);
        if ($result == 1) {
            header('Location:' . BASE_URL . "/order");
        }else {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
    }
    
    public function delete_order($order_code){
        $table_order = 'tbl_order';
        $ordermodel = $this->load->model('ordermodel');
        $cond = "$table_order.order_code = $order_code";
        try {
            $result = $ordermodel->delete_order($table_order, $cond);
            if ($result== 1){
                header('Location:' . BASE_URL . "/order/order");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
       
    }
}
?>