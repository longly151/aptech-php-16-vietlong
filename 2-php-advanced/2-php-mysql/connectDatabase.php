<?php
function connectDatabase()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "aptech_php";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed " . $e->getMessage();
    }
}
// function connectDatabase()
// {
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
    
//     // Create connection
//     $conn = new mysqli($servername, $username, $password);
// }



