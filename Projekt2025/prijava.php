<?php
session_start();
require_once 'baza.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['e_posta'];
    $geslo = sha1($_POST['pas']);

    $sql = "SELECT * FROM uporabniki WHERE e_posta = '$email' AND geslo = '$geslo'";
    $result = mysqli_query($link, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['id_u'] = $row['id_u'];
        $_SESSION['name'] = $row['ime'];
        $_SESSION['surname'] = $row['priimek'];
        $_SESSION['je_admin'] = $row['je_admin'];

        header("Location: index.php");
        exit();
    } else {
        echo "<p>Napačen e-naslov ali geslo.</p>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
</head>
<body>
<h1>Prijava</h1>
<form method="post" action="prijava.php">
    <input type="email" name="e_posta" placeholder="E-Pošta" required><br><br>
    <input type="password" name="pas" placeholder="Geslo" required><br><br>
    <input type="submit" name="sub" value="Prijavi se">
</form>
<a href="registracija.php">Nimaš računa? Ustvari ga!</a>
</body>
</html>
