<?php
include_once 'seja.php';
require_once 'baza.php';

if (!isset($_SESSION['je_admin']) || $_SESSION['je_admin'] != 1) {
    die("Dostop zavrnjen. Samo administratorji.");
}

$drzave_result = mysqli_query($link, "SELECT id_d, ime FROM drzave ORDER BY ime");
$reziserji_result = mysqli_query($link, "SELECT id_r, ime, priimek FROM reziserji ORDER BY priimek");
$zanri_result = mysqli_query($link, "SELECT id_z, ime FROM zanri ORDER BY ime");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naslov = mysqli_real_escape_string($link, $_POST['naslov']);
    $datum_izdaje = $_POST['datum_izdaje'];
    $id_d = (int)$_POST['id_d'];
    $trajanje = (int)$_POST['trajanje'];
    $id_r = (int)$_POST['id_r'];

    $izbrani_zanri = isset($_POST['zanri']) && is_array($_POST['zanri']) ? $_POST['zanri'] : [];


    if (!empty($_FILES['poster']['tmp_name'])) {
        $poster = addslashes(file_get_contents($_FILES['poster']['tmp_name']));
    } else {
        $poster = null;
    }



    $query = "INSERT INTO filmi (naslov, datum_izdaje, id_d, trajanje_filma, id_r, poster) VALUES ('$naslov', '$datum_izdaje', $id_d, $trajanje, $id_r, " . ($poster ? "'$poster'" : "NULL") . ")";

    if (mysqli_query($link, $query)) {
        $id_novega_filma = mysqli_insert_id($link);

        if ($id_novega_filma > 0 && !empty($izbrani_zanri)) {
            foreach ($izbrani_zanri as $id_z) {
                $id_z = (int)$id_z; 
                $insert_zanr_query = "INSERT INTO filmi_zanri (id_f, id_z) VALUES ($id_novega_filma, $id_z)";
                if (!mysqli_query($link, $insert_zanr_query)) {
                    echo "<p>Napaka pri dodajanju žanra (ID filma: $id_novega_filma, ID žanra: $id_z): " . mysqli_error($link) . "</p>";
                }
            }
        }

        echo "<p>Film uspešno dodan!</p>";
        header("refresh:2;url=admin.php");
        exit;
    } else {
        echo "<p>Napaka: " . mysqli_error($link) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin nadzorna plošča</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php include_once 'glava.php'; ?>

<h2>Dodaj nov film</h2>

<form method="post">
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
            echo '<option value="' . $reziser['id_r'] . '">';
            echo htmlspecialchars($reziser['ime'] . ' ' . $reziser['priimek']);
            echo '</option>';
        }
        ?>
    </select><br><br>
    
    <label>Žanri:</label><br>
    <select name="zanri[]" multiple size="5">
        <?php
        while ($zanr = mysqli_fetch_assoc($zanri_result)) {
            echo '<option value="' . $zanr['id_z'] . '">' . htmlspecialchars($zanr['ime']) . '</option>';
        }
        ?>
    </select><br><br>

    <label>Poster (slika):</label><br>
    <input type="file" name="poster" accept="image/*" required><br><br>

    <input type="submit" value="Dodaj film">
</form>

<hr>
<h2>Uredi filme:</h2>

<div class="filmi">
<?php
$filmi_query = "
    SELECT f.id_f, f.naslov, f.datum_izdaje, f.trajanje_filma,
           d.ime AS drzava, r.ime AS reziser
    FROM filmi f
    INNER JOIN drzave d ON f.id_d = d.id_d
    INNER JOIN reziserji r ON f.id_r = r.id_r
    ORDER BY f.datum_izdaje DESC
";

$filmi_result = mysqli_query($link, $filmi_query);

while ($row = mysqli_fetch_assoc($filmi_result)) {
    echo '<div>';
    echo '<a href="uredi_film.php?id=' . $row['id_f'] . '" class="film">';
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

<br><a href="index.php">Nazaj na domačo stran</a>
<?php include_once 'noga.php'; ?>
</body>
</html>