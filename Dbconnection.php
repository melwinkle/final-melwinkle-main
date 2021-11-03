<!-- This is the OOp class for databse connection for testing -->

<?php

class DbConnection{
  private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $database = 'AILEEN12372022';
   protected $connection;
    public function __construct(){
        if (!isset($this->connection)) {
          $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
          if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
          }
        }    
       return $this->connection;
    }
}
?>
