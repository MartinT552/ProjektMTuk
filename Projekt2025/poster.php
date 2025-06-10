<?php
require_once 'baza.php';

if (!isset($_GET['id'])) {
    echo "ID ni podan.";
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT poster FROM filmi WHERE id_f = $id";
$result = mysqli_query($link, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $poster = $row['poster'];
    
    header("Content-Type: image/jpeg");
    echo $poster;
} else {
    echo "Slika ni najdena.";
}
?>