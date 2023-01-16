<?php

class Database extends PDO
{

    public function __construct($connect, $user, $pass)
    {
        parent::__construct($connect, $user, $pass);
        // $db = new PDO($connect, $user, $pass);
    }

    public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC) // mac dinh tra ve kieu du lieu dang mang
    {
        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindParam($key, $value);
        }
        
        $statement->execute();
        return $statement->fetchAll($fetchStyle);
    }

    public function insert($table, $data)
    {
        $keys = implode(",", array_keys($data));
        $value = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table($keys) VALUES($value)";
        $statement = $this->prepare($sql);
        
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }

    public function update($table, $data, $cond)
    {
        $updatekeys = NULL;
        foreach ($data as $key => $value) {
            $updatekeys .= "$key =:$key,";
        }
        $updatekeys = rtrim($updatekeys, ",");
        
        $sql = "UPDATE $table SET $updatekeys where $cond";
        $statement = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }

    public function delete($table, $cond, $limit = 1)
    {
        $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
        return $this->exec($sql);
    }

    // tao ham so sanh du lieu
    public function affectedRows($sql, $data1, $data2)
    {
        $statement = $this->prepare($sql);
        $statement->execute(array(
            $data1,
            $data2
        ));
        return $statement->rowCount();
    }

    public function selectUser($sql, $username, $password)
    {
        $statement = $this->prepare($sql);
        $statement->execute(array(
            $username,
            $password
        ));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //login customer
    public function affectedRows2($sql, $username, $phone, $password)
    {
        $statement = $this->prepare($sql);
        $statement->execute(array(
            $username,
            $phone,
            $password
        ));
        return $statement->rowCount();
    }
    
    public function selectUser2($sql, $username, $phone, $password)
    {
        $statement = $this->prepare($sql);
        $statement->execute(array(
            $username,
            $phone,
            $password
        ));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>