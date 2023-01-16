<?php

class categorymodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ****************************************************ADMIN******************************************************
     */
    
    /**
     * ***************************category_PRODUCT****************************
     */
    public function category($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
        return $this->db->select($sql);
        // $sql = "SELECT * FROM tbl_category_product ORDER BY id_category_product DESC";
        // $query = $this ->db ->query($sql);
        // $result = $query ->fetchAll();
        // return $result;
    }

    public function categorybyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    public function insertcategory($table_category_product, $data)
    {
        return $this->db->insert($table_category_product, $data);
    }

    public function updatecategory($table_category_product, $data, $cond)
    {
        return $this->db->update($table_category_product, $data, $cond);
    }

    public function deletecategory($table_category_product, $cond)
    {
        return $this->db->delete($table_category_product, $cond);
    }

    /**
     * ***************************category_POST****************************
     */
    public function insertcategory_post($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function category_post($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_category_post DESC";
        return $this->db->select($sql);
    }

    public function deletecategory_post($table_category_post, $cond)
    {
        return $this->db->delete($table_category_post, $cond);
    }

    public function categorybyid_post($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    public function updatecategory_post($table_category_post, $data, $cond)
    {
        return $this->db->update($table_category_post, $data, $cond);
    }

    /**
     * ***************************PRODUCT****************************
     */
    public function insertproduct($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function product($table_product, $table_category)
    {
        $sql = "SELECT * FROM $table_product,$table_category WHERE $table_product.id_category_product = $table_category.id_category_product ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
    }

    public function deleteproduct($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }

    public function productbyid($table, $cond)
    {
        $sql = "SELECT * FROM $table WHERE $cond";
        return $this->db->select($sql);
    }

    public function updateproduct($table_product, $data, $cond)
    {
        return $this->db->update($table_product, $data, $cond);
    }
    public function demsanpham($table_product,$cate_id){
        $sql="select count($table_product.id_category_product) from $table_product where $table_product.id_category_product='.$cate_id.'";
        return $this->db->select($sql);
    }

    /**
     * *****************************************************VIEW******************************************************
     */
    // lay ra danh muc san pham
    public function category_home($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
        return $this->db->select($sql);
    }

    // lay san pham theo danh muc san pham
    public function categorybyid_product($table_cate_product, $table_product, $cond)
    {
        $sql = "SELECT * FROM $table_cate_product,$table_product WHERE $cond";
        return $this->db->select($sql);
    }

    // lay ra tat ca san pham o trang san pham
    // public function list_product_home($table_product)
    // {
    // $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC";
    // return $this->db->select($sql);
    // }
    
    // lay ra tat ca san pham o trang chu
    public function list_product_index($table_product)
    {
        $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC ";
        return $this->db->select($sql);
    }

    // chi tiet san pham
    public function details_product_home($table_cate_product, $table_product, $cond)
    {
        $sql = "SELECT * FROM $table_product,$table_cate_product WHERE $cond";
        return $this->db->select($sql);
    }

    // san pham lien quan
    public function related_product_home($table_cate_product, $table_product, $cond_related)
    {
        $sql = "SELECT * FROM $table_product,$table_cate_product WHERE $cond_related ORDER BY $table_product.id_product DESC LIMIT 4";
        return $this->db->select($sql);
    }

    // lay ra san pham hot
    public function product_hot($table_product, $cond)
    {
        $sql = "SELECT * FROM $table_product WHERE $cond";
        return $this->db->select($sql);
    }

    // tim tong so tat ca san pham
    public function total_product($table_product)
    {
        $sql = "SELECT count(id_product) as total FROM $table_product";
        return $this->db->select($sql);
    }

    // tim tong so tat ca san pham theo danh muc
    public function total_cate_product($table_product, $table_cate_product, $cond)
    {
        $sql = "SELECT count(id_product) as total FROM $table_product,$table_cate_product WHERE $cond";
        return $this->db->select($sql);
    }

    // tim tong so tat ca san pham hot
    public function total_hot_product($table_product, $cond)
    {
        $sql = "SELECT count(id_product) as total FROM $table_product WHERE $cond";
        return $this->db->select($sql);
    }

    // tim va lay tong so tat ca san pham theo tim kiem
    public function search_product($table_product, $cond)
    {
        $sql = "SELECT * FROM $table_product WHERE $cond";
        return $this->db->select($sql);
    }

    // lay danh sach san pham theo limit va start
    public function paging_product($table_product, $start, $limit)
    {
        $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC LIMIT $start, $limit";
        return $this->db->select($sql);
    }
    
    //danh sach don hang khach hang da dat
    public function list_order_details($table_product, $table_order_details, $cond)
    {
        $sql = "SELECT * FROM $table_product,$table_order_details WHERE $cond";
        return $this->db->select($sql);
    }

    // lay ra tat ca danh muc tin tuc
    public function categorypost_home($table_cate_post)
    {
        $sql = "SELECT * FROM $table_cate_post ORDER BY id_category_post DESC";
        return $this->db->select($sql);
    }

    // lay bai viet theo tin tuc
    public function postbyid_home($table_cate_post, $table_post, $id)
    {
        $sql = "SELECT * FROM $table_cate_post,$table_post WHERE $table_cate_post.id_category_post = $table_post.id_category_post AND $table_post.id_category_post ='$id' ORDER BY $table_post.id_post DESC";
        return $this->db->select($sql);
    }

    // lay ra tat ca tin tuc
    public function list_post_home($table_post)
    {
        $sql = "SELECT * FROM $table_post ORDER BY $table_post.id_post DESC";
        return $this->db->select($sql);
    }

    // chi tiet tun tuc
    public function details_post_home($table_cate_post, $table_post, $cond)
    {
        $sql = "SELECT * FROM $table_cate_post, $table_post WHERE $cond";
        return $this->db->select($sql);
    }

    // tin tuc lien quan
    public function related_post_home($table_cate_post, $table_post, $cond_related)
    {
        $sql = "SELECT * FROM $table_cate_post, $table_post WHERE $cond_related ORDER BY $table_post.id_post DESC";
        return $this->db->select($sql);
    }

    // lay ra tin tuc trong muc slide tin tuc
    public function post_index($table_post)
    {
        $sql = "SELECT * FROM $table_post ORDER BY id_post DESC LIMIT 4";
        return $this->db->select($sql);
    }
}
?>