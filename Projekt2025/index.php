<?php
require_once 'baza.php';

if (!$link) {
    die("Povezava ni uspela: " . mysqli_connect_error());
}

$sql = "
    SELECT f.id_f, f.naslov, f.datum_izdaje, f.trajanje_filma, 
           d.ime AS drzava, r.ime AS reziser
    FROM filmi f
    JOIN drzave d ON f.id_d = d.id_d
    JOIN reziserji r ON f.id_r = r.id_r
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
<?php include_once 'glava.php';?>
<h1>Filmi za oceniti:</h1>
<a href="vnos_filmov.php">Vnos novih filmov</a>
<div class="filmi">
	<?php while($row = $result->fetch_assoc()): ?>
		<a href="ocena.php?id=<?= $row['id_f'] ?>" class="film">
			<img src="poster.php?id=<?= $row['id_f'] ?>" alt="<?= htmlspecialchars($row['naslov']) ?>" style="width:100%; height:300px; object-fit:cover;">
			<div class="podatki">
				<h3><?= htmlspecialchars($row['naslov']) ?></h3>
				<p>Leto: <?= date("Y", strtotime($row['datum_izdaje'])) ?></p>
				<p>Trajanje: <?= $row['trajanje_filma'] ?> min</p>
				<p>Država: <?= htmlspecialchars($row['drzava']) ?></p>
				<p>Režiser: <?= htmlspecialchars($row['reziser']) ?></p>
			</div>
		</a>
	<?php endwhile; ?>
</div>

</body>
</html>


