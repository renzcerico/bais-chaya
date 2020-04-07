<?php
class Email {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insert($data) {

        $sql = "INSERT INTO tbl_email 
                SET template_title = :template_title,
                    email_subject = :subject,
                    email_body = :body,
                    status = 'active';

                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':template_title', $data['template_title']);
        $stmt->bindParam(':subject', $data['subject']);
        $stmt->bindParam(':body', $data['body']);
        $stmt->execute();
        
        return 200;
    }

    public function getTemplates() {
        $sql = "SELECT id, template_title, 
                       created_at  
                FROM tbl_email 
                WHERE status = 'active'
               ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getTemplatesById($id) {
        $sql = "SELECT * FROM tbl_email 
                WHERE id = :id;
               ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }

    public function edit($data){
        $sql = "UPDATE tbl_email
                SET template_title = :template_title,
                    email_subject = :subject,
                    email_body = :body,
                    status = 'active'
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':template_title', $data['template_title']);
        $stmt->bindParam(':subject', $data['subject']);
        $stmt->bindParam(':body', $data['body']);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
        
        return 200;

    }

    public function deleteTemplate($id){
        $sql = "DELETE FROM tbl_email 
                WHERE id = :id;
               ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }

    public function getAllEmail(){

        $sql = "SELECT email_address FROM tbl_parents";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
       
    }


}
?>