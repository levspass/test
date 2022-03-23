<?php


class database
{
    private $host = "localhost";
    private $db_name = "junior_developer_test_task";
    private $username = "root";
    private $password = "";
    public $conn;

    // получение соединения с базой данных
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
        }

        return $this->conn;
    }

    /*
    public function query($sql) {
        $result = mysqli_query($this->link, $sql);

        if ($result == false) {
            print("Произошла ошибка при выполнении запроса" . "<br>");
        }
    }
    */
}