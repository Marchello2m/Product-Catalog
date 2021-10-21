<?php
require 'vendor/autoload.php';

class Services
{

    public $conn;


    function __construct()
    {
        $this->connect();
    }


    function connect()
    {
        //Including the constants.php file to get the database constants
        include_once dirname(__FILE__) . '/DB.php';

        // //Checking if any error occured while connecting
        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->mysqli_connect_error();
        }
        //finally returning the connection link
        return $this->conn;
    }
}
?>
