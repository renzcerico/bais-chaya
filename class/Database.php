<?php
class Database {
	public $conn;
	private $username = 'root';
	private $password = '';
	private $db_name = 'bais_chaya';

	public function connection() {
		try {
		    $this->conn = new PDO('mysql:host=localhost;dbname='.$this->db_name, $this->username, $this->password);
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $this->conn;
		} catch (PDOException $e) {
		    return 'Connection failed: ' . $e->getMessage();
		    die($e->getMessage());
		}
	}
}
?>