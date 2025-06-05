<?php
include_once 'seja.php';
require_once 'baza.php';


if (!isset($_SESSION['je_admin']) || $_SESSION['je_admin'] != 1) {
    die("Dostop zavrnjen. Samo administratorji.");
}


$drzave_result = mysqli_query($link, "SELECT id_d, ime FROM drzave ORDER BY ime");
$reziserji_result = mysqli_query($link, "SELECT id_r, ime, priimek FROM reziserji ORDER BY priimek");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naslov = mysqli_real_escape_string($link, $_POST['naslov']);
    $datum_izdaje = $_POST['datum_izdaje'];
    $id_d = (int)$_POST['id_d'];
    $trajanje = (int)$_POST['trajanje'];
    $id_r = (int)$_POST['id_r'];

	if (!empty($_FILES['poster']['tmp_name'])) {
		$poster = addslashes(file_get_contents($_FILES['poster']['tmp_name']));
	} else {
		$poster = null;
	}

	$query = "
		INSERT INTO filmi (naslov, datum_izdaje, id_d, trajanje_filma, id_r, poster)
		VALUES ('$naslov', '$datum_izdaje', $id_d, $trajanje, $id_r, " . ($poster ? "'$poster'" : "NULL") . ")
	";

	if (mysqli_query($link, $query)) {
		echo "<p>Film uspešno dodan!</p>";
		header("refresh:2;url=vnos_filmov.php");
		exit;
	} else {
		echo "<p>Napaka: " . mysqli_error($link) . "</p>";
	}


    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Film uspešno dodan!</p>";
        header("refresh:2;url=vnos_filmov.php");
        exit();
    } else {
        echo "<p>Napaka: " . mysqli_stmt_error($stmt) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dodaj film</title>
</head>
<body>
<?php include_once 'glava.php'; ?>
<h2>Dodaj nov film</h2>

<form method="post" enctype="multipart/form-data">
    <label>Naslov:</label><br>
    <input type="text" name="naslov" required><br><br>

    <label>Datum izdaje:</label><br>
    <input type="date" name="datum_izdaje" required><br><br>

    <label>Država:</label><br>
	<select name="id_d" required>
		<option value="">-- Izberi državo --</option>
		<?php
		while ($drzava = mysqli_fetch_assoc($drzave_result)) {
			echo '<option value="' . $drzava['id_d'] . '">' . htmlspecialchars($drzava['ime']) . '</option>';
		}
		?>
	</select><br><br>


    <label>Trajanje filma (v minutah):</label><br>
    <input type="number" name="trajanje" required><br><br>

	<label>Režiser:</label><br>
	<select name="id_r" required>
		<option value="">-- Izberi režiserja --</option>
		<?php
		while ($reziser = mysqli_fetch_assoc($reziserji_result)) {
			$ime_priimek = htmlspecialchars($reziser['ime'] . ' ' . $reziser['priimek']);
			echo '<option value="' . $reziser['id_r'] . '">' . $ime_priimek . '</option>';
		}
		?>
	</select><br><br>


    <label>Poster (slika):</label><br>
    <input type="file" name="poster" accept="image/*" required><br><br>

    <input type="submit" value="Dodaj film">
</form>

<br><a href="index.php">Domov</a>
</body>
</html>
