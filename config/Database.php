<?php 
  class Database {
    // DB Params
    private $host = 'mysql.cba.pl';
    private $db_name = 'czprogramy_cba_pl';
    private $username = 'czegrojac';
    private $password = 'win2000cze10';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }