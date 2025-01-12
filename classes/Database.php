<?php
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "orarend";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $this->conn->set_charset("utf8");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function getOsztalyok()
    {
        $sql = "SELECT * FROM osztalyok";
        return $this->select($sql);
    }
    public function getTanarok()
    {
        $sql = "SELECT * FROM tanarok";
        return $this->select($sql);
    }
    public function getTantargyak()
    {
        $sql = "SELECT * FROM tantargyak";
        return $this->select($sql);
    }
    private function insert($sql)
    {
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function setEsemeny($tanarId, $tantereId, $kezdet, $veg, $leiras)
    {
        $sql = "INSERT INTO `esemeny` (`erintettTanarId`, `erintettTeremId`, `kezdete`, `vege`, `megjegyzes`) VALUES ('$tanarId', '$tantereId', '$kezdet', '$veg', '$leiras')";
        return $this->insert($sql);
    }
    private function select($sql)
    {
        $result = $this->conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function __destruct()
    {
        $this->conn->close();
    }
}
