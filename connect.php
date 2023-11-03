<?php
class Connect{
    public $server;
    public $dbName;
    public $username;
    public $password;
    public function __construct(){
        $this->server = "u6354r3es4optspf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "fc4lmdkfenpgroaa";
        $this->password = "zzbuen4c3ihcedxs";
        $this->dbName= "ktom750ot6hzt00r";
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