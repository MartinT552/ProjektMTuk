<?php
require_once 'baza.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $e_posta = $_POST['e_posta'];
    $geslo = $_POST['geslo'];

    $sql = "SELECT e_posta, geslo FROM uporabniki";
	
	if(($e_posta && $geslo) == true){
		echo "<p>Uspešna prijava!</p>";
        header("refresh:2;url=index.php"); 
        exit();
	}else{
		echo "<p>Neuspešna prijava!" . mysqli_error($link) . "</p>";
        header("refresh:2;url=prijava.php"); 
        exit();
	}


}

?>
