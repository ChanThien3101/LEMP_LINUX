<?php

class loginmodel extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($table_admin, $username, $password)
    {
        $sql = "SELECT * FROM $table_admin WHERE email = ? AND password = ?";
        return $this->db->affectedRows($sql, $username, $password);
    }

    public function getLogin($table_admin, $username, $password){
        $sql = "SELECT * FROM $table_admin WHERE email = ? AND password = ?";
        return $this->db->selectUser($sql, $username, $password);
    }
    
    public function update_admin($table_admin, $data, $cond){
        return $this->db->update($table_admin, $data, $cond);
    }
    
}
?>