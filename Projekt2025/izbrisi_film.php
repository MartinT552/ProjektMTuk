<?php
include_once 'seja.php';
require_once 'baza.php';


$id_f = intval($_GET['id']);

mysqli_query($link, "DELETE FROM ocene WHERE id_f = $id_f");

mysqli_query($link, "DELETE FROM filmi_zanri WHERE id_f = $id_f");

mysqli_query($link, "DELETE FROM filmi WHERE id_f = $id_f");

header("Location: admin.php");
exit();
?>
