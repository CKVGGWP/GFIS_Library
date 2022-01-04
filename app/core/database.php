<?php

class Database
{
    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            $conn = new PDO($dsn, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (PDOException $e) {
            echo 'Connection Failed: ' . $e->getMessage();
            exit();
        }
    }

    public function viewUsers()
    {
        $sql = "SELECT * FROM tbl_user";
        $stmt = $this->connect()->query($sql);

        while ($row = $stmt->fetchAll()) {
            return $row;
        }
    }

    public function viewUsersByID($id)
    {
        $sql = "SELECT * FROM tbl_users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            $users  = $stmt->fetch();
            return $users;
        }
    }
}
