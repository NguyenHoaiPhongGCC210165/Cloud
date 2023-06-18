<?php
    class Connect
    {
        public $server;
        public $user;
        public $password;
        public $dbName;

        public function __construct()
        {
            //$this (là một biến giả) tham chiếu đến đối tượng hiện tại của lớp
            // $this -> server = "localhost";
            // $this -> user = "root";
            // $this -> password = "";
            // $this -> dbName = "asm2_cloud";

            $this -> server = "co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this -> user = "d4782vz51021w6of";
            $this -> password = "fik64l4jdab13qp2";
            $this -> dbName = "dkqkenerl9qyqx34";
        }
        //Option 1: use mySQL (no condition)
        function connectToMySQL():mysqli
        {
            $conn_my = new mysqli($this->server,$this->user,$this->password,$this->dbName);
            if($conn_my->connect_error)
            {
                die("Failed".$conn_my->connect_error);
            }
            else{
                //echo "Connect!!!";
                // echo "<br>";
            }
            return $conn_my;
        }

        //Option 2: use PDO  (exist condition)
        function connectToPDO():PDO
        {
            try
            {
                $conn_pdo = new PDO
                ("mysql:host=$this->server;dbname=$this->dbName",$this->user,$this->password);
                // echo "Connect to PDO";
            }
            catch(PDOException $e)
            {
                die("Failed $e");
            }
            return $conn_pdo;
        }
    }
    $c = new Connect();
    $c -> connectToMySQL();

    $e = new Connect();
    $e -> connectToPDO();


?>