<?php

class sanpham extends DController
{

    public function __construct()
    {
        parent::__construct();
        // Session::init();
    }

    public function index()
    {
        $this->tatca();
    }

    public function danhmuc($id)
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $table_product = 'tbl_product';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        $data['category'] = $categorymodel->category_home($table_cate_product);
        
        // TÌM TỔNG SỐ product theo danh mục
        $cond1 = "$table_cate_product.id_category_product = $table_product.id_category_product AND $table_product.id_category_product ='$id'";
        $row = $categorymodel->total_cate_product($table_product, $table_cate_product, $cond1);
        
        $total_product = $row['0']['total'];
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        
        // TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_product / $limit);
        
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        
        // TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
        $cond2 = "$table_cate_product.id_category_product = $table_product.id_category_product AND $table_product.id_category_product ='$id' 
        ORDER BY $table_product.id_product DESC LIMIT $start, $limit";
        $data['category_by_id_product'] = $categorymodel->categorybyid_product($table_cate_product, $table_product, $cond2);
        
        // $this->load->view('slider');
        $this->load->view('header', $data);
        $this->load->view('categoryproduct', $data);
        
        echo '<div class="page">
                <nav aria-label="...">
	               <ul class="pagination">';
        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1 && $current_page <= $total_page) {
            echo '<li class="page-item "><a class="page-link"
					href="' . BASE_URL . '/sanpham/danhmuc/' . $id . '?page=' . ($current_page - 1) . '" tabindex="-1">Previous</a></li>';
        } else if ($current_page > $total_page) {
            echo '<li class="page-item "><a class="page-link"
					href="' . BASE_URL . '/sanpham/danhmuc/' . $id . '?page=' . ($total_page - 1) . '" tabindex="-1">Previous</a></li>';
        }
        
        // lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i ++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
                echo '<li class="page-item active"><a class="page-link" href="' . BASE_URL . '/sanpham/danhmuc/' . $id . '?page=' . $i . '"">' . $i . '<span
								class="sr-only">(current)</span></a></li>';
            } else if ($current_page > $total_page) {
                $i = $total_page;
                echo '<li class="page-item active"><a class="page-link" href="' . BASE_URL . '/sanpham/danhmuc/' . $id . '?page=' . $i . '"">' . $i . '<span
								class="sr-only">(current)</span></a></li>';
            } else {
                
                echo '<li class="page-item"><a class="page-link" href="' . BASE_URL . '/sanpham/danhmuc/' . $id . '?page=' . $i . '">' . $i . '</a></li>';
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
        if ($current_page < $total_page && $total_page > 1) {
            echo '<li class="page-item"><a href="' . BASE_URL . '/sanpham/danhmuc/' . $id . '?page=' . ($current_page + 1) . '">Next</a></li>';
        }
        echo "      </ul>
				</nav>
            </div>";
        $this->load->view('footer');
    }

    public function tatca()
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        $data['category'] = $categorymodel->category_home($table_cate_product);
        // /////////////////
        $table_product = 'tbl_product';
        
        // TÌM TỔNG SỐ product
        $row = $categorymodel->total_product($table_product);
        
        $total_product = $row['0']['total'];
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        
        // TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_product / $limit);
        
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        
        // TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
        $data['limit_product'] = $categorymodel->paging_product($table_product, $start, $limit);
        // ////////////////////
        $this->load->view('header', $data);
        $this->load->view('list_product', $data);
        $this->load->view('footer');
    }

    // phan so trang chho tat ca san pham
    public function get_phantrang_allsp()
    {
        $table_product = 'tbl_product';
        $paginationmodel = $this->load->model('paginationmodel');
        // TÌM TỔNG SỐ product
        $row = $paginationmodel->total_product($table_product);
        
        $total_product = $row['0']['total'];
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        // tổng số trang
        $total_page = ceil($total_product / $limit);
        
        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1 && $current_page <= $total_page) {
            echo '<li class="page-item "><a class="page-link"
					href="' . BASE_URL . '/sanpham/tatca?page=' . ($current_page - 1) . '" tabindex="-1">Previous</a></li>';
        } else if ($current_page > $total_page) {
            echo '<li class="page-item "><a class="page-link"
					href="' . BASE_URL . '/sanpham/tatca?page=' . ($total_page - 1) . '" tabindex="-1">Previous</a></li>';
        }
        
        // lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i ++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
                echo '<li class="page-item active"><a class="page-link" href="' . BASE_URL . '/sanpham/tatca?page=' . $i . '"">' . $i . '<span
								class="sr-only">(current)</span></a></li>';
            } else if ($current_page > $total_page) {
                $i = $total_page;
                echo '<li class="page-item active"><a class="page-link" href="' . BASE_URL . '/sanpham/tatca?page=' . $i . '"">' . $i . '<span
								class="sr-only">(current)</span></a></li>';
            } else {
                
                echo '<li class="page-item"><a class="page-link" href="' . BASE_URL . '/sanpham/tatca?page=' . $i . '">' . $i . '</a></li>';
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
        if ($current_page < $total_page && $total_page > 1) {
            echo '<li class="page-item"><a href="' . BASE_URL . '/sanpham/tatca?page=' . ($current_page + 1) . '">Next</a></li>';
        }
    }

    public function sanphamhot()
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $table_product = 'tbl_product';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        $data['category'] = $categorymodel->category_home($table_cate_product);
        
        $cond1 = "$table_product.product_hot = 1";
        $row = $categorymodel->total_hot_product($table_product, $cond1);
        
        $total_product = $row['0']['total'];
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        
        // TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_product / $limit);
        
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        // TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
        $cond2 = "$table_product.product_hot = 1 ORDER BY $table_product.id_product DESC LIMIT $start, $limit";
        $data['product_hot'] = $categorymodel->product_hot($table_product, $cond2);
        
        // $this->load->view('slider');
        $this->load->view('header', $data);
        $this->load->view('product_hot', $data);
        $this->load->view('footer');
    }

    // phan so trang cho san pham hot
    public function get_phantrang_hot()
    {
        $table_product = 'tbl_product';
        $paginationmodel = $this->load->model('paginationmodel');
        // TÌM TỔNG SỐ product hot
        $cond = "$table_product.product_hot = 1";
        $row = $paginationmodel->total_product_hot($table_product, $cond);
        
        $total_product = $row['0']['total'];
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        // tổng số trang
        $total_page = ceil($total_product / $limit);
        
        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1 && $current_page <= $total_page) {
            echo '<li class="page-item "><a class="page-link"
					href="' . BASE_URL . '/sanpham/sanphamhot?page=' . ($current_page - 1) . '" tabindex="-1">Previous</a></li>';
        } else if ($current_page > $total_page) {
            echo '<li class="page-item "><a class="page-link"
					href="' . BASE_URL . '/sanpham/sanphamhot?page=' . ($total_page - 1) . '" tabindex="-1">Previous</a></li>';
        }
        
        // lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i ++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
                echo '<li class="page-item active"><a class="page-link" href="' . BASE_URL . '/sanpham/sanphamhot?page=' . $i . '"">' . $i . '<span
								class="sr-only">(current)</span></a></li>';
            } else if ($current_page > $total_page) {
                $i = $total_page;
                echo '<li class="page-item active"><a class="page-link" href="' . BASE_URL . '/sanpham/sanphamhot?page=' . $i . '"">' . $i . '<span
								class="sr-only">(current)</span></a></li>';
            } else {
                
                echo '<li class="page-item"><a class="page-link" href="' . BASE_URL . '/sanpham/sanphamhot?page=' . $i . '">' . $i . '</a></li>';
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
        if ($current_page < $total_page && $total_page > 1) {
            echo '<li class="page-item"><a href="' . BASE_URL . '/sanpham/sanphamhot?page=' . ($current_page + 1) . '">Next</a></li>';
        }
    }

    public function chitietsanpham($id)
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $table_product = 'tbl_product';
        $cond = "$table_cate_product.id_category_product = $table_product.id_category_product AND $table_product.id_product='$id'";
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        $data['category'] = $categorymodel->category_home($table_cate_product);
        
        $data['details_product'] = $categorymodel->details_product_home($table_cate_product, $table_product, $cond);
        
        foreach ($data['details_product'] as $key => $cate) {
            $id_cate = $cate['id_category_product'];
        }
        
        $cond_related = "$table_cate_product.id_category_product = $table_product.id_category_product AND $table_cate_product.id_category_product = '$id_cate' AND $table_product.id_product NOT IN('$id')";
        $data['related_product'] = $categorymodel->related_product_home($table_cate_product, $table_product, $cond_related);
        
        $this->load->view('header', $data);
        // $this->load->view('slider');
        $this->load->view('details_product', $data);
        $this->load->view('footer');
    }
    public function timkiem()
    {
        Session::init();
        $table_cate_product = 'tbl_category_product';
        $table_cate_post = 'tbl_category_post';
        $table_product = 'tbl_product';
        
        $categorymodel = $this->load->model('categorymodel');
        
        $data['category'] = $categorymodel->category_home($table_cate_product);
        $data['category_post'] = $categorymodel->categorypost_home($table_cate_post);
        
        $content = addslashes($_GET['content']);
        // $cond = "$table_product.title_product LIKE '%$content%' OR $table_product.id_category_product = ($table_cate_product.id_category_product IN ($table_cate_product.title_category_product LIKE '%$content%'))";
        $cond = "$table_product.title_product LIKE '%$content%'";
        $data['product_search'] = $categorymodel->search_product($table_product, $cond);
        
       
        
        if (empty($data['product_search'])){
            
            $_SESSION['msgdn'] = "Không tìm thấy kết quả nào! <br> Hãy thử sử dụng các từ khóa chung chung hơn ^^";
        }
        else {
            
            $_SESSION['msgdn'] = "Hiển thị kết quả của từ khóa '$content'. Vẫn muốn tìm từ khóa '<a itemprop='item' href=''>$content</a>' ?";
        }
        $this->load->view('header', $data);
        $this->load->view('search_product', $data);
        $this->load->view('footer');
    }
}
?>