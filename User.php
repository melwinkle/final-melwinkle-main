<!-- This is the OOP class for the unit testing -->


<?php


include_once('DbConnection.php');
class User extends DbConnection{
  
    public function __construct(){
        parent::__construct();
       
       
    }
    public function check_login($username, $password){
        $sql = "SELECT * FROM Employee_Log_in WHERE EmployeeID = '$username'";
        $query = $this->connection->query($sql);
        if($query->num_rows > 0){
            echo "\n(1)Login Succesful";
            return true;
        }
        else{
            return false;
        }
    }
    public function details($sql){
        $query = $this->connection->query($sql);
        $row = $query->fetch_array();
        return $row;
    }
    public function escape_string($value){
        return $this->connection->real_escape_string($value);
    }

    public function getsql($sql){
        $query = $this->connection->query($sql);
        if($query->num_rows > 0){
            echo "\n(2)User Details Exist";
            return true;
        }else{
            return false;
        }
    }

    public function getname($sql){
        $query = $this->connection->query($sql);
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            echo "\n(3)User First Name Exist";
            return $row[0];
        }else{
            return false;
        }
    }


    public function numberr($sql){
        $query = $this->connection->query($sql);
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $query->num_rows;
        }else{
            return 0;
        }
    }

    public function addcustomer($sql){
        $query = $this->connection->query($sql);
        if($query){
            echo "\n(4)New Customer Added";
            return "succesful";
        }else{
            return 'error';
        }
    }

    public function checkd($sql){
        $query = $this->connection->query($sql);
        if($query){
            
            $row = $query->fetch_array();
            echo "\n(4)Department Exists ";
            return $row[0];
        }else{
            return 'error';
        }
    }
}
?>