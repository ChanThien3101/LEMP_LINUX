<?php

class paginationmodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    // lay tong so san pham cho phan trang
    public function total_product($table_product)
    {
        $sql = "SELECT count(id_product) as total FROM $table_product";
        return $this->db->select($sql);
    }

    // lay tong so san pham hot cho phan trang
    public function total_product_hot($table_product, $cond)
    {
        $sql = "SELECT count(id_product) as total FROM $table_product WHERE $cond";
        return $this->db->select($sql);
    }
}

?>