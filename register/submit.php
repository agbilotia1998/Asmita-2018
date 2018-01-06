<?php

session_start();
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST["uname"];
    $email = $_POST["uemail"];
    $mobile = $_POST["mobile"];
    $college = $_POST["college"];
    $tname = $_POST["tname"];
    $tsize = $_POST["tsize"];
    $interestArray = $_POST["interest"];
    $interest = json_encode($interestArray);


                $sql = "INSERT INTO users (name, email, mobile,college,teamName,teamSize,event)
                VALUES ('$name','$email','$mobile','$college','$tname','$tsize','$interest')";
                // use exec() because no results are returned
                $conn->exec($sql);
                $conn = null;

                echo 'Thankyou ', $name, ' For Registering';
                header('Location: https://asmita.iiita.ac.in');
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


