<?php
session_start();
require_once 'baza.php';


if (!isset($_SESSION['je_admin']) || $_SESSION['je_admin'] !== '1') {
    die("Dostop zavrnjen.");
}


if ($_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST['id_f'], $_POST['naslov'], $_POST['datum_izdaje'], $_POST['trajanje_filma'], $_POST['id_d'], $_POST['id_r'])) {
    

    $id_f = intval($_POST['id_f']);
    $naslov = mysqli_real_escape_string($link, $_POST['naslov']);
    $datum_izdaje = mysqli_real_escape_string($link, $_POST['datum_izdaje']);
    $trajanje = intval($_POST['trajanje_filma']);
    $id_d = intval($_POST['id_d']);
    $id_r = intval($_POST['id_r']);


    $sql = "UPDATE filmi SET naslov = '$naslov', datum_izdaje = '$datum_izdaje', trajanje_filma = $trajanje, id_d = $id_d, id_r = $id_r WHERE id_f = $id_f";

    if (mysqli_query($link, $sql)) {
        echo "<p>Film je bil uspešno posodobljen.</p>";
        header("refresh:2;url=admin.php"); 
        exit;
    } else {
        echo "<p>Napaka pri posodabljanju filma: " . mysqli_error($link) . "</p>";
    }
} else {
    echo "<p>Manjkajo podatki za posodobitev.</p>";
}
?>
