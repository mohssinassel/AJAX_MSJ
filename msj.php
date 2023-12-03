<?php
include("conn.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $conn->query("SELECT * FROM conversation ORDER BY idMessage DESC");
    $messages = $stmt->fetch_all(MYSQLI_ASSOC);


    foreach ($messages as $message) {
        $nomAuteur = $message['user'];
        $contenuMessage = $message['message'];
        $dateMessage = $message['date'];
        if (!isset($_SESSION['nom'])) {
            $_SESSION['nom'] = $nomAuteur;
        }
        if ($nomAuteur === $_SESSION['nom']) {
            $classeAuteur = 'memeAuteur';
            $nomAuteur = 'Vous';
        } else {
            $classeAuteur = 'autreAuteur';
        }

        echo "<div class='message'>";
            echo "<span class='date'>$dateMessage</span>";
            echo "<div class='$classeAuteur'>";
            echo " <span class='nom'>$nomAuteur  :</span> <span>$contenuMessage</span>";
            echo "</div>";
        echo "</div>";
    }
}

?>
