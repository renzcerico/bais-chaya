<?php

class Admin {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function dashboardCount($id) {
        $sql = "SELECT 
                    count(cu.id) total_custodian
                    , (SELECT count(hh.id) FROM tbl_household hh) as total_meal
                    , AVG(
                        (SELECT 
                            count(hh.id)
                        FROM tbl_household hh
                        WHERE 
                            hh.created_at > (SELECT a.last_login FROM tbl_admin a WHERE id = :id)
                        ) +
                        -- as new_meal,
                        (SELECT 
                            count(nc.id)
                        FROM tbl_custodian nc
                        WHERE 
                            nc.created_at > (SELECT a.last_login FROM tbl_admin a WHERE id = :id)
                        )
                        -- as new_custodian,
                    ) new_application 
                FROM tbl_custodian cu";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getNewParents($id) {
        $sql = "SELECT  p.id 
                        , CONCAT(p.last_name, ', ', p.first_name, ' ', LEFT(p.middle_name, 1)) as parent_name
                        , p.email_address
                        , p.status
                        , p.created_at  
                FROM tbl_parents p
                    LEFT JOIN tbl_household hh ON hh.parent_id = p.id 
                    LEFT JOIN tbl_admin a ON a.id = :id
                WHERE hh.created_at > a.last_login
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }

    public function getNewChild($id) {
        $sql = "SELECT  c.id 
                        , CONCAT(c.last_name, ', ', c.first_name, ' ', LEFT(c.middle_name, 1)) as child_name
                        , c.parent_id
                        , c.created_at  
                FROM tbl_child c
                    LEFT JOIN tbl_custodian cu ON cu.child_id = c.id 
                    LEFT JOIN tbl_admin a ON a.id = :id
                WHERE cu.created_at > a.last_login
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }

    public function logout($id, $currentDateTime) {
        $sql = "UPDATE tbl_admin SET last_login = :currentDateTime WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':currentDateTime', $currentDateTime);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return 200;
    }

    public function insertParent($data) {
		try {
			$last_name = ucwords(htmlspecialchars($data['last_name']));
			$first_name = ucwords(htmlspecialchars($data['first_name']));
			$middle_name = ucwords(htmlspecialchars($data['middle_name'])) || '';
			$email_address = strtolower(htmlspecialchars($data['email_address']));
			$password = md5('welcome');


			$sql = "INSERT INTO tbl_parents SET
							last_name = :last_name,
							first_name = :first_name,
							middle_name = :middle_name,
							email_address = :email_address,
							password = :password,
							status = 'verified'";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':last_name', $last_name);
			$stmt->bindParam(':first_name', $first_name);
			$stmt->bindParam(':middle_name', $middle_name);
			$stmt->bindParam(':email_address', $email_address);
			$stmt->bindParam(':password', $password);
			$stmt->execute();

			return 200;
		} catch (PDOException $ex) {
			return $ex->getMessage();
		}
    }
    
    public function parentResetPassword($id) {
        $password = md5('welcome');

        $sql = "UPDATE tbl_parents SET password = :password WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return 200;
    }

    public function parentAccountDelete($id) {
        $sql = "DELETE FROM tbl_parents WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return 200;       
    }

    public function parentAccountUpdate($data) {

        $sql = "UPDATE tbl_parents SET last_name = :last_name,
                        first_name = :first_name,
                        middle_name = :middle_name,
                        email_address = :email_address
                    WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':middle_name', $data['middle_name']);
        $stmt->bindParam(':email_address', $data['email_address']);
        $stmt->execute();

        return 200;
    }

    public function insertAdmin($data) {
        $password = md5($data['password']);

        $sql = "INSERT INTO tbl_admin
                        SET first_name = :first_name,
                            last_name = :last_name,
                            middle_name = :middle_name,
                            email_address = :email_address,
                            password = :password,
                            status = 'verified'";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':first_name', $data['firstname']);
        $stmt->bindParam(':last_name', $data['lastname']);
        $stmt->bindParam(':middle_name', $data['middlename']);
        $stmt->bindParam(':email_address', $data['email']);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        return 200;
    }

    public function getAllAdmin() {
        $sql = "SELECT id, 
                       CONCAT(last_name, ', ', first_name, ' ', LEFT(middle_name, 1)) as admin_name,
                       email_address,
                       created_at  
                FROM tbl_admin
               ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getProfileById($id) {
       
        $sql = 'SELECT last_name, 
                   first_name, 
                   middle_name, 
                   email_address 
            FROM tbl_admin
            WHERE id = :id';
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }

    public function adminUpdate($data) {

        $sql = 'UPDATE tbl_admin SET last_name = :last_name,
                        first_name = :first_name,
                        middle_name = :middle_name,
                        email_address = :email_address
                    WHERE id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':middle_name', $data['middle_name']);
        $stmt->bindParam(':email_address', $data['email_address']);
        $stmt->execute();

        return 200;
    }

    public function archiveStudent($year, $students) {
        $count = 0;

        while ($count < count($students)) {
            $student = $students[$count];

            $sql = "INSERT INTO tbl_child_archives 
                        SET child_id = :students, 
                            year = :year";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':students', $student);
            $stmt->bindParam(':year', $year);
            $stmt->execute();

            $count++;
        }

        return 200;
    }

    public function resetApplication($year) {
        $sqlMeal = "SELECT id FROM tbl_meal WHERE id NOT IN (SELECT meal_id FROM tbl_meal_archives)";
        $stmtMeal = $this->conn->prepare($sqlMeal);
        $stmtMeal->execute();
        $row = $stmtMeal;
        $meal = $row->fetchAll(PDO::FETCH_ASSOC);
        $count = 0;

        while ( $count < $row->rowCount() ) {
            $mealID = $meal[$count]['id'];

            $sql = "INSERT INTO tbl_meal_archives 
                        SET meal_id = :mealID,
                            year = :year
                ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':mealID', $mealID);
            $stmt->bindParam(':year', $year);
            $stmt->execute();
            
            $count++;
        }

        return 200;
    }
    
}
?>