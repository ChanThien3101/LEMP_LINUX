<?php

class login extends DController
{

    public function __construct()
    {
        $message = array();
        parent::__construct();
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        Session::init();
        if (Session::get("logindn") == true) {
            header("Location:" . BASE_URL . "/login/dashboard");
        }
        $this->load->view('cpanel/login');
    }

    public function dashboard()
    {
        $table_cate_product = 'tbl_category_product';
        $table_product = 'tbl_product';
        
        $categorymodel = $this->load->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['product_index'] = $categorymodel->list_product_index($table_product);
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/dashboard', $data);
        $this->load->view('cpanel/footer');
    }
    public function profile()
    {
        Session::checkSession();
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/profile/profile');
        $this->load->view('cpanel/footer');
    }

    public function authentication_login()
    {
        if (isset($_POST['signin'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $table_admin = 'tbl_admin';
            $loginmodel = $this->load->model('loginmodel');
            $count = $loginmodel->login($table_admin, $email, $password);
            
            if ($count == 0) {
                header("Location:" . BASE_URL . "/login");
            } else {
                $result = $loginmodel->getLogin($table_admin, $email, $password);
                Session::init();
                Session::set('logindn', true); // ng dung da dang nhap
                Session::set('userid', $result[0]['admin_id']);
                Session::set('nameadmin', $result[0]['full_name']);
                Session::set('profile', $result);
                header("Location:" . BASE_URL . "/login/dashboard");
            }
        }
    }
    
    public function update_profile($id){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        
        $table_admin = 'tbl_admin';
        $loginmodel = $this->load->model('loginmodel');
        $cond = "$table_admin.admin_id = '$id'";
        
        try {
            $data = array(
                'full_name' => $name,
                'email' => $email,
                'password' => $password,
                'phone' => $password,
                'country' => $country,
            );
            $result = $loginmodel->update_admin($table_admin, $data, $cond);
            if ($result == 1) {
                Session::init();
                foreach ($_SESSION['profile'] as $key => $infor) {
                    if ($_SESSION['profile'][$key]['admin_id'] == $_SESSION['userid']) {
                        $_SESSION['profile'][$key]['full_name'] = $name;
                        $_SESSION['profile'][$key]['email'] = $email;
                        $_SESSION['profile'][$key]['password'] = $password;
                        $_SESSION['profile'][$key]['phone'] = $phone;
                        $_SESSION['profile'][$key]['country'] = $country;
                    }
                }
                $_SESSION['msg'] = 'Cập nhật thông tin tài khoản thành công!';
                header('Location:' . BASE_URL . "/login/profile");
            }
        } catch (Exception $e) {
            header('Location:' . BASE_URL . "/khachhang/hoso");
        }
    }

    public function logout()
    {
        Session::init();
        // Session::destroy();
        unset($_SESSION['logindn']);
        header("Location:" . BASE_URL . "/login");
    }
}
?>
