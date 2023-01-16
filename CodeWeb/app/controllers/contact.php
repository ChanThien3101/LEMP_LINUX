<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class contact extends DController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
//         Session::init();
        $this->lienhe();
    }
    public function lienhe()
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $this->load->view('header', $data);
        // $this->load->view('slider');
        $this->load->view('contact');
        $this->load->view('footer');
    }
    
    public function gioithieu()
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $this->load->view('header', $data);
        // $this->load->view('slider');
        $this->load->view('agency');
        $this->load->view('footer');
    }
    
    public function guimail(){
        require '../vendor/phpmailer/phpmailer/src/Exception.php';
        require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require '../vendor/phpmailer/phpmailer/src/SMTP.php';
        require '../vendor/autoload.php';
       
        $mail = new PHPMailer;  //true: enables exceptions
        
        $name = $_POST['name'];
        
        $email = $_POST['email'];
        
        $noidung = $_POST['noidung'];
        try {
            $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
            $mail->isSMTP();
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $nguoigui = 'hoanle396@gmail.com';
            $matkhau = '0123455567';
            $tennguoigui = $name;
            $mail->Username = $nguoigui; // SMTP username
            $mail->Password = $matkhau;   // SMTP password
            $mail->SMTPSecure = 'tls';  // encryption TLS/SSL
            $mail->Port = 587;  // port to connect to
            $mail->setFrom($nguoigui, $tennguoigui );
            $to = "nhập email của người nhận";
            $to_name = "Tên người nhận";
            
            $mail->addAddress($email, $name); //mail và tên người nhận
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Gửi thư từ php';
            $noidungthu = "<b>Chào bạn!</b><br>Chúc an lành!" ;
            $mail->Body = $noidungthu;
           
            $mail->send();
            echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        }
    }
}