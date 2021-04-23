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
        $sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data ? $data : [];

    }

    public function getRulesByEmail($email){

        $sql = "SELECT * FROM ".$this->table_name." WHERE email=?";
        $query = $this->db->prepare($sql);
        $query->execute([$email]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data ? $data : [];

    }

    public function save(){

        $sql = "INSERT INTO ".$this->table_name."(name) VALUES(?)";
        $query = $this->db->prepare($sql);
        $query->execute([$this->name]);
        return $this->db->lastInsertId();

    }

    public function update($id){

        //SET `id`=[value-1],`name`=[value-2] WHERE 1
        $sql = "UPDATE ".$this->table_name." SET name =? WHERE id =?";
        $query = $this->db->prepare($sql);
        $update = $query->execute([$this->name, $id]);
        if($update){
            return true;
        }else{
            return false;
        }

    }

    public function delete($id){

        $sql = "DELETE FROM ".$this->table_name." WHERE id = (?)";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return true;
    }

}