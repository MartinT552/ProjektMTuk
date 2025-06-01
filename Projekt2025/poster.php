<?php
require_once 'baza.php';

if (!isset($_GET['id'])) {
    http_response_code(400);
    exit('ID ni podan.');
}

$id = (int)$_GET['id'];

$sql = "SELECT poster FROM filmi WHERE id_f = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $poster);

if (mysqli_stmt_num_rows($stmt) === 1) {
    mysqli_stmt_fetch($stmt);
    header("Content-Type: image/jpeg"); 
    echo $poster;
} else {
    http_response_code(404);
    echo "Slika ni najdena.";
}
?>
