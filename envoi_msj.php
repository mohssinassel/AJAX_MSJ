<?php 
include("conn.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = strtolower($_POST["nom"]);
    $msj = $_POST["message"];



    $date = date("n/j G:i");


    $stmt = $conn->prepare("INSERT INTO conversation (user, message , date) VALUES (?, ?,?)");
    $stmt->bind_param("sss", $nom, $msj, $date);
    if ($stmt->execute()) {
        $_SESSION['nom'] = $nom;
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}




?>