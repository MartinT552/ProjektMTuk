<?php
require_once 'baza.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naziv = $_POST['naziv'];
    $tip = $_POST['tip'];

    $sql = "INSERT INTO predmeti (naziv, tip) VALUES ('$naziv', '$tip')";

    
    if (mysqli_query($link, $sql)) {
        echo "<p>Podatki so bili uspešno shranjeni!</p>";
        header("refresh:2;url=izpis_predmetov.php"); 
        exit();
    } else {

        echo "<p>Napaka pri shranjevanju podatkov: " . mysqli_error($link) . "</p>";
        header("refresh:2;url=vnos_predmetov.php"); 
        exit();
    }
}

?>
