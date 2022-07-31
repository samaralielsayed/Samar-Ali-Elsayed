<?php
namespace App\Database\Config;
// use mysqli;
class Connection{
    private string $serverName = "localhost";
    private string $userName = "root";
    private string $password = "";
    private string $nameDatabase = "ecommerce";
    public \mysqli $connect;

     public function __construct()
{
        $this->connect = new \mysqli($this->serverName, $this->userName, $this->password,$this->nameDatabase);

     }
     public function __destruct()
     {
        $this->connect->close();
     }

}

