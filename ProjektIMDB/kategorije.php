<?php
// kategorije.php - Prikaz filmov po kategorijah
session_start();
require_once 'includes/config.php';

// Preverimo, če je izbrana kategorija
$kategorija_id = isset($_GET['kategorija']) ? intval($_GET['kategorija']) : 0;

// Pridobimo ime kategorije
$kategorija_ime = "Vsi filmi";
if ($kategorija_id > 0) {
    $query = "SELECT ime_Varchar FROM zanni WHERE id_2_tri = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $kategorija_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $kategorija_ime = $row['ime_Varchar'];
    }
    $stmt->close();
}

// Pridobimo filme za izbrano kategorijo
$query = "SELECT f.id_f, f.naslov, f.leto, f.trajanje, f.opis, 
                 r.ime AS reziser_ime, r.primesk AS reziser_primek,
                 z.ime_Varchar AS zanr,
                 AVG(o.ocena) AS povprecna_ocena
          FROM film f
          JOIN reziserji r ON f.id_r = r.id_r
          JOIN zanni z ON f.id_2_tri = z.id_2_tri
          LEFT JOIN ocene o ON f.id_f = o.id_f";
          
if ($kategorija_id > 0) {
    $query .= " WHERE f.id_2_tri = ?";
}

$query .= " GROUP BY f.id_f ORDER BY f.naslov";

$stmt = $conn->prepare($query);
if ($kategorija_id > 0) {
    $stmt->bind_param("i", $kategorija_id);
}
$stmt->execute();
$film_result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieRate - <?php echo htmlspecialchars($kategorija_ime); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container main-content">
        <section class="movies-section">
            <h2 class="section-title"><?php echo htmlspecialchars($kategorija_ime); ?></h2>
            
            <?php if ($film_result->num_rows > 0): ?>
                <div class="movie-grid">
                    <?php while ($film = $film_result->fetch_assoc()): ?>
                        <div class="movie-card">
                            <img src="assets/images/posters/<?php echo $film['id_f']; ?>.jpg" 
                                 alt="<?php echo htmlspecialchars($film['naslov']); ?>" 
                                 class="movie-poster"
                                 onerror="this.src='assets/images/posters/default.jpg'">
                            <div class="movie-info">
                                <h3 class="movie-title"><?php echo htmlspecialchars($film['naslov']); ?> 
                                    <span class="movie-year">(<?php echo $film['leto']; ?>)</span>
                                </h3>
                                <div class="movie-meta">
                                    <span class="movie-duration"><?php echo floor($film['trajanje']/60); ?>h <?php echo $film['trajanje']%60; ?>min</span>
                                    <span class="movie-genre"><?php echo htmlspecialchars($film['zanr']); ?></span>
                                </div>
                                <div class="movie-rating">
                                    <div class="stars">
                                        <?php
                                        $avg_rating = round($film['povprecna_ocena'] ?? 0);
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo '<i class="fa' . ($i <= $avg_rating ? 's' : 'r') . ' fa-star"></i>';
                                        }
                                        ?>
                                    </div>
                                    <span class="rating-value">
                                        <?php echo number_format($film['povprecna_ocena'] ?? 0, 1); ?>/5
                                    </span>
                                </div>
                                <p class="movie-director">
                                    Režiser: <?php echo htmlspecialchars($film['reziser_ime'] . ' ' . htmlspecialchars($film['reziser_primek'])); ?>
                                </p>
                                <p class="movie-description">
                                    <?php echo substr(htmlspecialchars($film['opis']), 0, 100); ?>...
                                </p>
                                <a href="film.php?id=<?php echo $film['id_f']; ?>" class="btn-view">Ogled podrobnosti</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="no-movies">Ni filmov v tej kategoriji.</p>
            <?php endif; ?>
        </section>

        <?php include 'includes/sidebar.php'; ?>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>