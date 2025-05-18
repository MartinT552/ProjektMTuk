<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieRate - Prijava</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h1>Prijava</h1>
        <form>
            <div class="form-group">
                <label for="email">E-pošta</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Geslo</label>
                <input type="password" id="password" required>
            </div>
            <button type="submit" class="btn">Prijava</button>
            <div class="register-link">
                Še nimate računa? <a href="register.php">Registrirajte se</a>
            </div>
        </form>
    </div>
</body>
</html>