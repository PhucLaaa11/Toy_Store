<?php
$Connect = mysqli_connect("lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "vmfm8w0l9qcbnu9d", "rin92axrzp6dpk5d", "fodpqah8yi80f3no");
?>
<?php
class Connect{
    public $server;
    public $dbName;
    public $username;
    public $password;
    public function __construct(){
        $this->server = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbName= "shop_210353";
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
