<?php
session_start();
require_once 'baza.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $e_posta = $_POST['e_posta'];
    $geslo = sha1($_POST['pas']);

    $sql = "SELECT * FROM uporabniki WHERE e_posta = ? AND geslo = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $e_posta, $geslo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['name'] = $row['ime'];
        $_SESSION['surname'] = $row['priimek'];
        $_SESSION['id_u'] = $row['id_u']; 
		$_SESSION['je_admin'] = $row['je_admin']; 

        header("Location: index.php"); 
        exit();
    } else {
        echo "<p>Neuspešna prijava. Napačen e-naslov ali geslo.</p>";
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
