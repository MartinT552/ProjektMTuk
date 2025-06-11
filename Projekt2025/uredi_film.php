<?php
include_once 'seja.php';
require_once 'baza.php';

if (!isset($_SESSION['je_admin']) || $_SESSION['je_admin'] !== '1') {
    die("Dostop zavrnjen.");
}

if (!isset($_GET['id'])) {
    die("ID filma ni podan.");
}

$id_f = intval($_GET['id']);
$sql = "SELECT * FROM filmi WHERE id_f = $id_f";
$result = mysqli_query($link, $sql);
$film = mysqli_fetch_array($result);

if (!$film) {
    die("Film ni bil najden.");
}

$drzave = mysqli_query($link, "SELECT id_d, ime FROM drzave ORDER BY ime");
$reziserji = mysqli_query($link, "SELECT id_r, ime, priimek FROM reziserji ORDER BY priimek, ime");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Uredi film</title>
    <link rel="stylesheet" href="index.css"> 
	
</head>
<body>
<?php include_once 'glava.php'; ?>

<h1 class="prijava_text">Uredi film: <?php echo htmlspecialchars($film['naslov']); ?></h1>

<form method="POST" action="shrani_urejanje.php" class="form_filmi">
    <input type="hidden" name="id_f" value="<?php echo $film['id_f']; ?>">

    <div>
        <label>Naslov:</label>
        <input type="text" name="naslov" value="<?php echo htmlspecialchars($film['naslov']); ?>" required class="naslov">
    </div>

    <div>
        <label>Datum izdaje:</label>
        <input type="date" name="datum_izdaje" value="<?php echo $film['datum_izdaje']; ?>" required class="email">
    </div>

    <div>
        <label>Trajanje (min):</label>
        <input type="number" name="trajanje_filma" value="<?php echo $film['trajanje_filma']; ?>" required class="email">
    </div>

    <div>
        <label>Država:</label>
        <select name="id_d" required class="kraji">
            <option value="">-- Izberi državo --</option>
            <?php
            while ($drzava = mysqli_fetch_array($drzave)) {
                $selected = ($film['id_d'] == $drzava['id_d']) ? 'selected' : '';
                echo '<option value="' . $drzava['id_d'] . '" ' . $selected . '>' . htmlspecialchars($drzava['ime']) . '</option>';
            }
            ?>
        </select>
    </div>

    <div>
        <label>Režiser:</label>
        <select name="id_r" required class="kraji">
            <option value="">-- Izberi režiserja --</option>
            <?php
            while ($reziser = mysqli_fetch_array($reziserji)) {
                $selected = ($film['id_r'] == $reziser['id_r']) ? 'selected' : '';
                echo '<option value="' . $reziser['id_r'] . '" ' . $selected . '>' . htmlspecialchars($reziser['ime'] . ' ' . $reziser['priimek']) . '</option>';
            }
            ?>
        </select>
    </div>

    <div>
        <input type="submit" value="Shrani spremembe" class="registracija_gumb">
    </div>
</form>

<?php include_once 'noga.php'; ?>
</body>
</html>
