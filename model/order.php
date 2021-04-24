<?php
class Orders extends DbConnection{

    public $id;
    public $user_id;
    public $product_id;
    public $payment_status;
    public $order_status;
    public $total;
    public $quantity;

    private $table_name="order_details";

    public function __construct(){
        parent::__construct();
    }

    public function getOrders(){

        $sql = "SELECT * FROM ".$this->table_name;
        $query = $this->db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data ? $data : [];

    }

    public function getOrdersById($id){

        $sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data ? $data : [];

    }

    public function update($id){

        $sql = "UPDATE ".$this->table_name." SET order_status=?, payment_status=? WHERE id=?";
        $query = $this->db->prepare($sql);
        $update = $query->execute([$this->order_status, $this->payment_status, $id]);

        return $update ? true : false;

    }

    public function delete($id){

        $sql = "DELETE FROM ".$this->table_name." WHERE id=?";
        $query = $this->db->prepare($sql);
        $delete = $query->execute([$id]);
        return $delete ? true : false;

    }

}

?>