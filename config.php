<?php
class Config {
    public $conn = "";
    function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'wordpress');
        // Check connection
        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
        } //echo "connected";
    }


    function __destruct()
    {
        $this->conn->close();
    }
}
?>
