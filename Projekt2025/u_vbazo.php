<?php
require_once 'baza.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
    $e_posta = $_POST['e_posta'];
    $geslo = $_POST['geslo'];
    $kraj = $_POST['kraj'];

    $sql = "INSERT INTO uporabniki (ime, priimek, naslov, e_posta, geslo, id_k) 
        VALUES ('$ime', '$priimek', '$naslov', '$e_posta', '$geslo',
                (SELECT id_k FROM kraji WHERE LOWER(kraj)=LOWER('$kraj')))";


    if (mysqli_query($link, $sql)) {
        echo "<p>Podatki so bili uspešno shranjeni!</p>";
        header("refresh:2;url=izpis_uporabnikov.php"); 
        exit();
    } else {
        echo "<p>Napaka pri shranjevanju podatkov: " . mysqli_error($link) . "</p>";
        header("refresh:2;url=vnos_uporabnikov.php"); 
        exit();
    }
}
?>
