<?php
class Custodian {
	public $conn;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function insert($data) {
		$parentOne      = $data['parent_one'];
        $parentSecond   = $data['parent_two'];
        $childID        = $data['child_id'];
        $rabbi          = $data['rabbi'];
        $dateFilled     = $data['date_filled'];
        $dob            = $data['dob'];
        $id             = $data['id'];
        
        if ($id > 0) {
            $sql = "UPDATE tbl_custodian 
                            SET parent_one = :parentOne,
                                parent_two = :parentSecond,
                                rabbi_name = :rabbi,
                                child_dob  = :dob,
                                date       = :dateFilled,
                                child_id   = :childID
                    WHERE id = :id
                    ";
        } else {
            $sql = "INSERT INTO tbl_custodian 
                                SET parent_one = :parentOne,
                                    parent_two = :parentSecond,
                                    rabbi_name = :rabbi,
                                    child_dob  = :dob,
                                    date       = :dateFilled,
                                    child_id   = :childID
                    ";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':parentOne', $parentOne);
        $stmt->bindParam(':parentSecond', $parentSecond);
        $stmt->bindParam(':rabbi', $rabbi);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':dateFilled', $dateFilled);
        $stmt->bindParam(':childID', $childID);

        if ($id > 0) {
            $stmt->bindParam(':id', $id);
        }
        
        $stmt->execute();

        return 200;
    }
    
    public function getById($id) {
        $sql = 'SELECT * FROM tbl_custodian WHERE child_id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}


?>