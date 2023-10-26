<?php
class Connect{
    public $server;
    public $dbName;
    public $username;
    public $password;
    public function __construct(){
        $this->server = "lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "vmfm8w0l9qcbnu9d";
        $this->password = "rin92axrzp6dpk5d";
        $this->dbName= "fodpqah8yi80f3no";
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