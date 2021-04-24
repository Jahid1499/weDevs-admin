<?php
class Product extends DbConnection{
	
	public $id;
	public $name;
	public $category_id;
	public $sku;
	public $price;
	public $quantity;
	public $description;
	public $is_feature;
	public $image;
	public $status;
	private $table_name="products";
	
	public function __construct(){
		 parent::__construct();
	}
	
	public function getProducts(){
		
		$sql = "SELECT * FROM ".$this->table_name;
		$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
		
	}


	
	public function getProductById($id){
		$sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];
		
	}

	public function getProductWithCategory(){

	$sql = "SELECT p.*, c.name as category_name FROM ".$this->table_name." as p, categories as c WHERE p.category_id = c.id";

	$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
	return $data ? $data : [];


	}
	
	public function save(){
		
		$sql = "INSERT INTO ".$this->table_name." (category_id, name, sku, price, quantity, image, description, status, is_feature) VALUES(?, ?, ?, ?, ?, ?, ?, ? ,?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->category_id, $this->name, $this->sku,$this->price, $this->quantity, $this->image, $this->description, $this->status, $this->is_feature]);
		return $this->db->lastInsertId();
		
	}
	
	public function update($id){
		
    $sql = "UPDATE ".$this->table_name." SET category_id=?, name=?, sku=?, price=?, quantity=?, description=?, status=?, is_feature=?, image=? WHERE id=?";
    $query = $this->db->prepare($sql);
    $update = $query->execute([$this->category_id, $this->name, $this->sku,$this->price, $this->quantity, $this->description, $this->status, $this->is_feature, $this->image, $id]);

	return $update ? true : false;
		
	}

	public function updateImage($FILES, $oldPath){

        unlink($oldPath);

        $ext = end(explode(".", $FILES['image']['name']));
        $file_path = "uploads/product/".rand(100,10000).'.'.$ext;
        move_uploaded_file($FILES['image']['tmp_name'], $file_path);

        return $file_path;

	}
	
	public function delete($id){
		
		$sql = "DELETE FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$delete = $query->execute([$id]);
		return $delete ? true : false;
		
	}
	
	public function uploadImage($FILES){

        $ext = end(explode(".", $FILES['image']['name']));
        $file_path = "uploads/product/".rand(100,10000).'.'.$ext;
        /*echo $file_path;
        exit();*/
        move_uploaded_file($FILES['image']['tmp_name'], $file_path);

        return $file_path;
	}

	
}



?>