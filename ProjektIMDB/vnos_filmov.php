<?php
include_once 'baza.php';

$krajiQuery = "SELECT id_k, ime FROM kraji";
$krajiResult = mysqli_query($link, $krajiQuery);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vnos uporabnikov</title>
</head>
<body>
<?php include_once 'glava.php';?>
<h1>Vnos uporabnikov</h1>
<form method="post" action="u_vbazo.php">
    Ime<br>
    <input type="text" name="ime" required><br><br>
    Priimek<br>
    <input type="text" name="priimek" required><br><br>
    Mail<br>
    <input type="mail" name="mail" placeholder="E-Pošta" required><br><br>
    Geslo<br>
    <input type="password" name="geslo" placeholder="Geslo"><br><br>
    Kraj<br>
    <select name="kraj" required>
        <?php
        while ($row = mysqli_fetch_array($krajiResult)) {
            echo "<option value='" . $row['kraj'] . "'>" . $row['kraj'] . "</option>";
        }
        ?>
    </select><br><br>
    <input type="submit" name="submit" value="Vnesi">
</form>

<br>
<a href="index2.php">Domov</a>
</body>
</html>
