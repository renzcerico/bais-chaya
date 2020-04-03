<?php
class Archives {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getYearChild() {
		$sql = "SELECT DISTINCT (year) as year, id
				FROM tbl_child_archives group by year
			   ";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

	public function getYearParent() {
		$sql = "SELECT DISTINCT (year) as year, id
				FROM tbl_meal_archives group by year
			   ";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

    

}	