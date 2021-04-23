<?php

class Roles extends Dbconnection
{

    public $id;
    public $name;

    public $updated_at;
    private $table_name = "role";
    public function __construct(){
        parent::__construct();
    }


    public function getRoles(){
        $sql = "SELECT * FROM ".$this->table_name;
        $query = $this->db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data ? $data : [];

    }

    public function getRulesById($id){

    }

    public function getRulesByEmail($email){

        $sql = "SELECT * FROM ".$this->table_name." WHERE email=?";
        $query = $this->db->prepare($sql);
        $query->execute([$email]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data ? $data : [];

    }

    public function save(){

        $sql = "INSERT INTO ".$this->table_name."(name, email, password, phone, user_type, status) VALUES(?, ?, ?, ?, ?, ?)";
        $query = $this->db->prepare($sql);
        $query->execute([$this->name, $this->email, $this->password, $this->phone, $this->user_type, $this->status]);
        return $this->db->lastInsertId();

    }

    public function update($id){

    }

    public function delete($id){

    }

}