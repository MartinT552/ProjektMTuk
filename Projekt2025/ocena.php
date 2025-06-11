<?php
include_once 'seja.php';
require_once 'baza.php';

if (!isset($_SESSION['id_u'])) {
    echo "<p>Morate biti prijavljeni, da lahko oddate oceno.</p>";
    exit();
}

$id_f = 0;
if (isset($_GET['id'])) {
    $id_f = intval($_GET['id']);
}

$id_u = $_SESSION['id_u'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ocena = intval($_POST['ocena']);
    $komentar = mysqli_real_escape_string($link, $_POST['komentar']);
    
    $sql = "INSERT INTO ocene (ocena, komentar, id_u, id_f) VALUES ($ocena, '$komentar', $id_u, $id_f)";
    
    if (mysqli_query($link, $sql)) {
        echo "<p>Hvala za oceno!</p>";
        header("refresh:2;url=ocena.php?id=$id_f");
        exit();
    } else {
        echo "<p>Napaka pri oddaji ocene: " . mysqli_error($link) . "</p>";
    }
}

$result = mysqli_query($link, "SELECT naslov FROM filmi WHERE id_f = $id_f");
$row = mysqli_fetch_array($result);

$film_naslov = "Neznan naslov";
if ($row) {
    $film_naslov = $row['naslov'];
}

$ocene = array();
$sql_ocene = "SELECT o.ocena, o.komentar, u.ime FROM ocene o JOIN uporabniki u ON o.id_u = u.id_u WHERE o.id_f = $id_f ORDER BY o.id_o DESC";
$result_ocene = mysqli_query($link, $sql_ocene);

while ($row = mysqli_fetch_array($result_ocene)) {
    $ocene[] = $row;
}

$povprecna_ocena = "0";
$sql_povprecje = "SELECT AVG(ocena) AS povprecje FROM ocene WHERE id_f = $id_f";
$result_povprecje = mysqli_query($link, $sql_povprecje);

if ($result_povprecje) {
    $row_povprecje = mysqli_fetch_array($result_povprecje);
    if ($row_povprecje && $row_povprecje['povprecje'] != null) {
        $povprecna_ocena = number_format($row_povprecje['povprecje'], 2);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Oceni film</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
<?php include_once 'glava.php'; ?>
<div class="oceni_film">
<h2>Oceni film: <?= htmlspecialchars($film_naslov) ?></h2>
    <p><strong>Povprečna ocena za ta film:</strong> <?= $povprecna_ocena ?> / 10</p>
    <hr>

<form method="post">
    <label>Ocena (1–10):</label><br>
    <input type="number" name="ocena" min="1" max="10" required><br><br>

    <label>Komentar:</label><br>
    <textarea name="komentar" rows="4" cols="40" required></textarea><br><br>

    <input type="submit" value="Oddaj oceno">
</form>
</div>

<div class="ocene">
<h3>Obstoječe ocene:</h3>
<?php
if (!empty($ocene)) {
    foreach ($ocene as $o) {
        echo '<b>' . htmlspecialchars($o['ime']) . '</b><br>';
        echo 'Ocena: ' . (int)$o['ocena'] . '<br>';
        echo 'Komentar: ' . htmlspecialchars($o['komentar']) . '<br>' . '<hr>';
    }
} else {
    echo '<p>Za ta film še ni bilo oddanih ocen.</p>';
}
?>
</div>
<br>

		<?php include_once 'noga.php';?>
</body>

</html>
