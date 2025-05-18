<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieRate - Registracija</title>
	<link rel="stylesheet" href="register.css">
    
</head>
<body>
    <div class="register-container">
        <h1>Registracija</h1>
        <form>
            <div class="form-group">
                <label for="name">Ime</label>
                <input type="text" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-pošta</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Geslo</label>
                <input type="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Potrdi geslo</label>
                <input type="password" id="confirm-password" required>
            </div>
            <button type="submit" class="btn">Registracija</button>
            <div class="login-link">
                Že imate račun? <a href="login.php">Prijavite se</a>
            </div>
        </form>
    </div>
</body>
</html>