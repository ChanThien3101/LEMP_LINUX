<?php

class khachhang extends DController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->hoso();
    }

    public function login_customer()
    {
        $username = $_POST['username'];
        $phone = $_POST['username'];
        $password = md5($_POST['password']);
        
        $table_customer = 'tbl_customers';
        $customermodel = $this->load->model('customermodel');
        $count = $customermodel->login_customer($table_customer, $username, $phone, $password);
        
        if ($count == 0) {
            session_start();
            $_SESSION['msgdn'] = "Tên tài khoản hoặc mật khẩu sai, xin kiểm tra lại!";
            header("Location:" . BASE_URL . "/khachhang/dangnhap");
        } else {
            $result = array();
            $result = $customermodel->getLogin($table_customer, $username, $phone, $password);
            Session::init();
            Session::set('customerdn', true); // ng dung da dang nhap
                                              // Session::set('username', $result[0]['customers_name']); // ten cot
                                              // $_SESSION['userid'][]= $result['customers_id'];
            
            Session::set('customer_id', $result[0]['customers_id']);
            Session::set('customer_phone', $result[0]['customers_phone']);
            Session::set('hoso', $result);
            
            header("Location:" . BASE_URL);
        }
    }

    public function hoso()
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $table_customers = 'tbl_customers';
        
        $categorymodel = $this->load->model('categorymodel');
        $customermodel = $this->load->model('customermodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $this->load->view('header', $data);
        $this->load->view('customer_file');
        $this->load->view('footer');
    }

    public function dangnhap()
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $table_customers = 'tbl_customers';
        
        $categorymodel = $this->load->model('categorymodel');
        $customermodel = $this->load->model('customermodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        $this->load->view('header', $data);
        $this->load->view('customer_login');
        $this->load->view('footer');
    }

    public function insert_dangky()
    {
        try {
            $name = $_POST['txtHoTen'];
            $email = $_POST['txtEmail'];
            $phone = $_POST['txtDienThoai'];
            $addrress = $_POST['txtDiaChi'];
            $password = $_POST['txtPassword'];
            
            $table_customer = "tbl_customers";
            $data = array(
                'customers_name' => $name,
                'customers_phone' => $phone,
                'customers_email' => $email,
                'customers_address' => $addrress,
                'customers_password' => md5($password)
            );
            
            $customermodel = $this->load->model('customermodel');
            
            $check_dk = $customermodel->checkcustomer_dk($table_customer, $email, $phone);
            if ($check_dk > 0) {
                Session::init();
                $_SESSION['msg'] = 'Email hoặc số điện thoại đã tồn tại!';
                header('Location:' . BASE_URL . "/khachhang/dangnhap");
            } else {
                $result = $customermodel->insertcustomer($table_customer, $data);
            }
            
            if ($result == 1) {
                Session::init();
                $_SESSION['msg'] = 'Đăng ký tài khoản thành công!';
                header('Location:' . BASE_URL . "/khachhang/dangnhap");
            }
        } catch (Exception $e) {
            Session::init();
            $_SESSION['msg'] = 'Đăng ký tài khoản thất bại!';
            header('Location:' . BASE_URL . "/khachhang/dangnhap");
        }
    }

    public function dangxuat()
    {
        Session::init();
        Session::unset('customerdn');
        // foreach ($_SESSION['hoso'] as $key => $infor) {
        // if ($_SESSION['hoso'][$key]['customers_id'] == $_SESSION['userid']) {
        // unset($_SESSION['hoso'][$key]);
        // }
        // }
        unset($_SESSION['hoso']);
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_phone']);
        header('Location:' . BASE_URL . '/khachhang/dangnhap');
    }

    public function update_khachhang($id)
    {
        $name = $_POST['txtHoTen'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtDienThoai'];
        $addrress = $_POST['txtDiaChi'];
        // $password = $_POST['txtPassword'];
        
        $table_customer = "tbl_customers";
        $customermodel = $this->load->model('customermodel');
        $cond = "$table_customer.customers_id = '$id'";
        if (isset($_POST['luu'])) {
            try {
                $data = array(
                    'customers_name' => $name,
                    'customers_phone' => $phone,
                    'customers_email' => $email,
                    'customers_address' => $addrress
                    // 'customers_password' => $password
                );
                
                $result = $customermodel->update_customers($table_customer, $data, $cond);
                if ($result == 1) {
                    Session::init();
                    foreach ($_SESSION['hoso'] as $key => $infor) {
                        if ($_SESSION['hoso'][$key]['customers_id'] == $_SESSION['customer_id']) {
                            $_SESSION['hoso'][$key]['customers_name'] = $name;
                            $_SESSION['hoso'][$key]['customers_phone'] = $phone;
                            $_SESSION['hoso'][$key]['customers_email'] = $email;
                            $_SESSION['hoso'][$key]['customers_address'] = $addrress;
                        }
                    }
                    $_SESSION['msg'] = 'Cập nhật thông tin tài khoản thành công!';
                    header('Location:' . BASE_URL . "/khachhang/hoso");
                }
            } catch (Exception $e) {
                Session::init();
                $_SESSION['msg'] = 'Cập nhật thông tin tài khoản thất bại!';
                header('Location:' . BASE_URL . "/khachhang/hoso");
            }
        } else {
            try {
                $result = $customermodel->delete_customers($table_customer, $cond);
                if ($result == 1) {
                    // session_start();
                    self::dangxuat();
                    $_SESSION['msg'] = 'Xóa tài khoản thành công!';
                    // header('Location:' . BASE_URL . "/product/list_category");
                }
            } catch (Exception $e) {
                Session::init();
                $_SESSION['msg'] = 'Xóa tài khoản thất bại!';
                header('Location:' . BASE_URL . "/khachhang/dangnhap");
            }
        }
    }
    public function list_customer(){
        $table_customers = 'tbl_customers';
        $customermodel = $this->load->model('customermodel');
        $data['list_customer'] = $customermodel->list_customer($table_customers);
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/profile/list_customers', $data);
        $this->load->view('cpanel/footer');
    }
    
    public function delete_customer($id){
        $table_customers = 'tbl_customers';
        $customermodel = $this->load->model('customermodel');
        try {
            $cond = "$table_customers.customers_id = '$id'";
            $result = $customermodel->delete_customers($table_customers, $cond);
            if ($result==1){
                header('Location:' . BASE_URL . "/khachhang/list_customer");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/index/admin_404");
        }
    }
}
?>