<?php


class DataBase
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "dbname";
    public static $conn;
    public static $instance;

    private function __construct()
    {
        try {
            $dsn = 'mysql:host='.$this->servername.';dbname='.$this->dbname;
            $pdo = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            self::$conn['config']=$pdo;
            return self::$conn['config'];
        }catch (PDOException $e){
            die ('Connection failed: ' . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return self::$conn['config'];
    }
}