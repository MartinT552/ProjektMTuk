<?php
require_once 'baza.php';

if (!$link) {
    die("Povezava ni uspela: " . mysqli_connect_error());
}

$zanri_sql = "SELECT id_z, ime FROM zanri ORDER BY ime";
$zanri_result = mysqli_query($link, $zanri_sql);

if (!$zanri_result) {
    echo "<p>Napaka pri pridobivanju žanrov: " . mysqli_error($link) . "</p>";
    exit();
}

$izbran_zanr = 0;
if (isset($_GET['zanr'])) {
    $izbran_zanr = intval($_GET['zanr']);
}

$sql = "
    SELECT DISTINCT f.id_f, f.naslov, f.datum_izdaje, f.trajanje_filma,
        d.ime AS drzava, r.ime AS reziser
    FROM filmi f
    INNER JOIN drzave d ON f.id_d = d.id_d
    INNER JOIN reziserji r ON f.id_r = r.id_r
    INNER JOIN filmi_zanri fz ON f.id_f = fz.id_f
    WHERE (fz.id_z = $izbran_zanr OR $izbran_zanr = 0)
";

$result = mysqli_query($link, $sql);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Domača stran</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<?php include_once 'glava.php'; ?>

<h1>Filmi za oceniti:</h1>

<?php
if (isset($_SESSION['je_admin']) && $_SESSION['je_admin'] === '1') {
    echo '<a href="admin.php" class="admin">Admin</a>';
}
?>

<form method="GET" action="">
    <label for="zanr">Filtriraj po žanru:</label>
    <select name="zanr" id="zanr" onchange="this.form.submit()">
        <option value="0">Vsi žanri</option>
        <?php

		while ($zanr = mysqli_fetch_assoc($zanri_result)) {
			echo '<option value="' . $zanr['id_z'] . '"';
    
			if ($zanr['id_z'] == $izbran_zanr) {
				echo ' selected';
			}

			echo '>' . htmlspecialchars($zanr['ime']) . '</option>';
		}
		?>

    </select>
</form>

<div class="filmi">
    
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div>';
        echo '<a href="ocena.php?id=' . $row['id_f'] . '" class="film">';
        echo '<img src="poster.php?id=' . $row['id_f'] . '" alt="' . htmlspecialchars($row['naslov']) . '" style="width:100%; height:300px; object-fit:cover;">';
        echo '<div class="podatki">';
        echo '<h3>' . htmlspecialchars($row['naslov']) . '</h3>';
        echo '<p>Leto: ' . date("Y", strtotime($row['datum_izdaje'])) . '</p>';
        echo '<p>Trajanje: ' . $row['trajanje_filma'] . ' min</p>';
        echo '<p>Država: ' . htmlspecialchars($row['drzava']) . '</p>';
        echo '<p>Režiser: ' . htmlspecialchars($row['reziser']) . '</p>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
    ?>
    
</div>

<?php include_once 'noga.php'; ?>

</body>
</html>