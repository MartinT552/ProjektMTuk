<?php
require_once 'baza.php';

$kraji = mysqli_query($link, "SELECT id_k, kraj FROM kraji ORDER BY kraj");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
    $naslov = $_POST['naslov'];
    $e_posta = $_POST['e_posta'];
    $geslo = sha1($_POST['geslo']); 
    $id_k = $_POST['id_k'];
    $je_admin = 0;


    $obstaja = mysqli_query($link, "SELECT * FROM uporabniki WHERE e_posta = '$e_posta'");
    if (mysqli_num_rows($obstaja) > 0) {
        echo "<p>Ta e-pošta je že registrirana.</p>";
    } else {
        $sql = "INSERT INTO uporabniki (ime, priimek, naslov, e_posta, geslo, id_k, je_admin)
                VALUES ('$ime', '$priimek', '$naslov', '$e_posta', '$geslo', '$id_k', '$je_admin')";
        if (mysqli_query($link, $sql)) {
            echo "<p>Registracija uspešna!</p>";
            header("refresh:2;url=prijava.php");
            exit();
        } else {
            echo "<p>Napaka: " . mysqli_error($link) . "</p>";
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
		<link rel="stylesheet" href="index.css">

</head>
<body>
<div class="registracija_form">
<h1 class="registracija_text">Registracija</h1>
<form method="post" action="registracija.php">
    <input type="text" name="ime" placeholder="Ime" required class="ime"><br><br>
    <input type="text" name="priimek" placeholder="Priimek" required class="priimek"><br><br>
    <input type="text" name="naslov" placeholder="Naslov" required class="naslov"><br><br>
    <input type="email" name="e_posta" placeholder="E-pošta" required class="email"><br><br>
    <input type="password" name="geslo" placeholder="Geslo" required class="geslo"><br><br>

    <label for="id_k">Kraj:</label><br>
    <select name="id_k" required>
        <option value="" class="izbira_krajev">-- Izberi kraj --</option>
         <?php
        while ($row = mysqli_fetch_assoc($kraji)) {
            echo '<option value="' . $row['id_k'] . '" class="kraji">' . htmlspecialchars($row['kraj']) . '</option>';
        }
        ?>
    </select><br><br>

    <input type="submit" value="Registriraj se" class="registracija_gumb">
</form>
</div>
</body>
</html>
