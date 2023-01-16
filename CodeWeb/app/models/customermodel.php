<?php

class customermodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function category($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
        return $this->db->select($sql);
        // $sql = "SELECT * FROM tbl_category_product ORDER BY id_category_product DESC";
        // $query = $this ->db ->query($sql);
        // $result = $query ->fetchAll();
        // return $result;
    }

    public function insertcustomer($table_customer, $data)
    {
        return $this->db->insert($table_customer, $data);
    }

    public function login_customer($table_customer, $username, $phone, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE (customers_email = ? OR customers_phone = ?) AND customers_password = ?";
        return $this->db->affectedRows2($sql, $username, $phone, $password);
    }

    public function getLogin($table_customer, $username, $phone, $password)
    {
        $sql = "SELECT * FROM $table_customer WHERE (customers_email = ? OR customers_phone = ?) AND customers_password = ?";
        return $this->db->selectUser2($sql, $username, $phone, $password);
    }

    public function checkcustomer_dk($table_customer, $email, $phone)
    {
        $sql = "SELECT * FROM $table_customer WHERE $table_customer.customers_phone = ? OR $table_customer.customers_email = ?";
        return $this->db->affectedRows($sql, $phone, $email);
    }

    public function update_customers($table_customer, $data, $cond)
    {
        return $this->db->update($table_customer, $data, $cond);
    }

    public function delete_customers($table_customer, $cond)
    {
        return $this->db->delete($table_customer, $cond);
    }
    public function list_customer($table_customers){
        $sql = "SELECT * FROM $table_customers ORDER BY customers_id DESC";
        return $this->db->select($sql);
    }
}
?>