<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST["uname"];
    $email = $_POST["uemail"];
    $mobile = $_POST["mobile"];
    $college = $_POST["college"];

                $sql = "INSERT INTO users (name, email, mobile,college)
                VALUES ('$name','$email','$mobile','$college')";
                // use exec() because no results are returned
                $conn->exec($sql);
                $conn = null;

                echo 'Thankyou ', $name, ' For Registering';
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


