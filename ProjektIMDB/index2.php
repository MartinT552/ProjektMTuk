<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieRate - Ocenjevanje filmov</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo">MovieRate</div>
            <div class="auth-buttons">
                <a href="login.php" class="btn btn-login">Prijava</a>
                <a href="register.php" class="btn btn-register">Registracija</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h2>Vsi filmi</h2>
        
        <div class="movie-grid">
            <!-- Film 1 -->
            <div class="movie-card">
              <img src="Slike/minecraft.jpg" alt="Minecraft poster" class="movie-poster" style="max-width: 100%; height: auto;">

                <div class="movie-info">
                    <h3 class="movie-title">Minecraft movie <span class="movie-year">(2025)</span></h3>
                    <p>Chicken jockey</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.9/5</div>
                </div>
            </div>
            
            <!-- Film 2 -->
            <div class="movie-card">
                <img src="Slike/fast five.jpg" alt="Fast five" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">Fast five <span class="movie-year">(2007)</span></h3>
                    <p>Zgodba polna drame in avtov</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.8/5</div>
                </div>
            </div>
            
            <!-- Film 3 -->
            <div class="movie-card">
                <img src="Slike/ted.jpg" alt="Ted" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">Ted <span class="movie-year">(2017)</span></h3>
                    <p>Zgodba o človeku in medvedku</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.7/5</div>
                </div>
            </div>
			<!-- Film 4 -->
			<div class="movie-card">
                <img src="Slike/ninjazelve.jpg" alt="Ted" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">Ninja turtles <span class="movie-year">(2017)</span></h3>
                    <p>Štiri želve in podgana</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.4/5</div>
                </div>
            </div>
			<!-- Film 5 -->
			<div class="movie-card">
                <img src="Slike/jumanji.jpg" alt="Ted" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">Jumanju <span class="movie-year">(2022)</span></h3>
                    <p>Pet ljudi v xbox-u</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.4/5</div>
                </div>
            </div>
			<!-- Film 6 -->
			<div class="movie-card">
                <img src="Slike/the dictator.jpg" alt="Ted" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">The dictator <span class="movie-year">(2016)</span></h3>
                    <p>En arabec, ko je bogat</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.4/5</div>
                </div>
            </div>
			<!-- Film 7 -->
            <div class="movie-card">
              <img src="Slike/dick.jpg" alt="Minecraft poster" class="movie-poster" style="max-width: 100%; height: auto;">

                <div class="movie-info">
                    <h3 class="movie-title">Moby dick <span class="movie-year">(2021)</span></h3>
                    <p>Velik morski pesek</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.1/5</div>
                </div>
            </div>
            
            <!-- Film 8 -->
            <div class="movie-card">
                <img src="Slike/baywatch.jpg" alt="Fast five" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">Baywatch <span class="movie-year">(2013)</span></h3>
                    <p>Zgodba polna plavanja in reševanja</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.2/5</div>
                </div>
            </div>
            
            <!-- Film 9 -->
            <div class="movie-card">
                <img src="Slike/spiderman.jpg" alt="Ted" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">Spider man <span class="movie-year">(2019)</span></h3>
                    <p>Pajek in zeleni človek</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.4/5</div>
                </div>
            </div>
			<!-- Film 10 -->
			<div class="movie-card">
                <img src="Slike/starwars.jpg" alt="Ted" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">Star wars <span class="movie-year">(2017)</span></h3>
                    <p>Ljudje v vesolju in vesoljčki</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.4/5</div>
                </div>
            </div>
			<!-- Film 11 -->
			<div class="movie-card">
                <img src="Slike/jumanji.jpg" alt="Ted" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">Jumanju <span class="movie-year">(2022)</span></h3>
                    <p>Pet ljudi v xbox-u</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.4/5</div>
                </div>
            </div>
			<!-- Film 12 -->
			<div class="movie-card">
                <img src="Slike/the dictator.jpg" alt="Ted" class="movie-poster" style="max-width: 100%; height: auto;">
                <div class="movie-info">
                    <h3 class="movie-title">The dictator <span class="movie-year">(2016)</span></h3>
                    <p>En arabec, ko je bogat</p>
                    
                    <div class="rating-stars">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <div class="average-rating">Povprečna ocena: 4.4/5</div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2025 MovieRate by Martin Tuk. Vse pravice pridržane.</p>
        </div>
    </footer>
</body>
</html>