<?php


class database
{
    private $host = "localhost";
    private $db_name = "junior_developer_test_task";
    private $username = "root";
    private $password = "";

    public $link;

    // получение соединения с базой данных
    public function getConnection() {
        $this->link = null;

        try {
            $this->link = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
        }

        return $this->link;
    }
}