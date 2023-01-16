<?php

class ordermodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    // them danh sach cac don hang
    public function insert_order($table_order, $data_order)
    {
        return $this->db->insert($table_order, $data_order);
    }

    // them danh sach chi tiet don hang
    public function insert_order_details($table_order_details, $data_details)
    {
        return $this->db->insert($table_order_details, $data_details);
    }

    // lay ra tat ca don hang
    public function list_order($table_order)
    {
        $sql = "SELECT * FROM $table_order ORDER BY order_date DESC";
        return $this->db->select($sql);
    }

    // chi tiet don hang theo order_code
    public function list_order_details($table_product, $table_order_details, $cond)
    {
        $sql = "SELECT * FROM $table_product,$table_order_details WHERE $cond";
        return $this->db->select($sql);
    }

    // lay chi tiet nguoi mua hang theo order_code
    public function list_info_details($table_order_details, $cond_info)
    {
        $sql = "SELECT * FROM $table_order_details WHERE $cond_info LIMIT 1";
        return $this->db->select($sql);
    }

    // xu li xac nhan don hang
    public function order_confirm($table_order, $data, $cond)
    {
        return $this->db->update($table_order, $data, $cond);
    }
    // xoa don hang
    public function delete_order($table_order, $cond){
        return $this->db->delete($table_order, $cond);
    }
}
?>