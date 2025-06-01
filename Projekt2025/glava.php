	<div>
		<?php include_once 'seja.php';
		if(isset($_SESSION['id_u'])){
			echo $_SESSION['name'] . " " . $_SESSION['surname'];
		echo '<p style="text-align: right;"> <a href="odjava.php">Odjava</a></p>';
		} else {
			echo '<p style="text-align: right;">
				<a href="prijava.php">Prijava uporabnika</a>
			      </p>';
		}
		?>


	</div>