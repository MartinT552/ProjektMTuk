<?php include_once 'seja.php'; ?>
<header class="glava1">
        <div class="logo">
            <a href="index.php">🎬 Kao IMDB</a>
        </div>
        <div class="uporabnik">
            <?php 
            if (isset($_SESSION['id_u'])) {
                echo '<span>' . htmlspecialchars($_SESSION['name']) . ' ' . htmlspecialchars($_SESSION['surname']) . '</span>';
                echo ' | <a href="odjava.php">Odjava</a>';
            } else {
                echo '<a href="prijava.php">Prijava uporabnika</a>';
            }
            ?>
        </div>
</header>
