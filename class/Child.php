<?php
class Child {
	public $conn;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function insert($data, $parentId) {

		$sql = "INSERT INTO tbl_child 
                        SET first_name = :first_name,
                            last_name = :last_name,
                            middle_name = :middle_name,
                            parent_id = :parent_id";

		$stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':middle_name', $data['middle_name']);
        $stmt->bindParam(':parent_id', $parentId);
        $stmt->execute();
        
        return 200;
	}

    public function insertAdmin($data) {

        $sql = "INSERT INTO tbl_child 
                        SET first_name = :first_name,
                            last_name = :last_name,
                            middle_name = :middle_name,
                            parent_id = :parent_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':middle_name', $data['middle_name']);
        $stmt->bindParam(':parent_id', $data['parent_id']);
        $stmt->execute();
        
        return 200;
    }

    public function getChildProfile($id) {
        $sql = 'SELECT last_name, 
                first_name, 
                middle_name
        FROM tbl_child
        WHERE id = :id';

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt;
    }
    
    public function delete($id) {
        $sql = "DELETE FROM tbl_child WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return 200;       
    }

    public function update($data) {

        $sql = "UPDATE tbl_child SET last_name = :last_name,
                        first_name = :first_name,
                        middle_name = :middle_name
                    WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':middle_name', $data['middle_name']);
        $stmt->execute();

        return 200;
    }
}
?>