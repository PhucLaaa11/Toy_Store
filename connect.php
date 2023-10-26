<?php
class Connect{
    public $server;
    public $dbName;
    public $username;
    public $password;
    public function __construct(){
        $this->server = "lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "tnif9npq85u2l1fx";
        $this->password = "ni1o8oho32b5hp81";
        $this->dbName= "oe724m7i3qgzsikf";
    }

    // Option 1: mysqli
    function connectToMySQL(): mysqli{
        $conn = new mysqli($this->server,
        $this->username, $this->password, $this->dbName);

        if($conn->connect_error){
            die("Failed ".$conn->connect_error);
        }else{
            //echo "Connect!";
        }
        return $conn;
    }

    //opinion 2 : PDO
    function connectToPDO(): PDO{
        try{
            $conn = new PDO("mysql:host=$this->server;
            dbname=$this->dbName", $this->username,$this->password);
            //echo "Connect! PDO";
        }catch(PDOException $e){
            die("Failed ".$e);
        }
        return $conn;
    }
}
$c = new Connect();
$c->connectToMySQL();
$c->connectToPDO();
?>