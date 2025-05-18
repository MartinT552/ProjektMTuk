<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava - Film Ocene</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to top, purple, blue);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }
        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-container button {
            background: #007BFF;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        .login-container button:hover {
            background: #0056b3;
        }
        .login-container a {
            display: block;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
            font-size: 14px;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Prijava</h2>
        <form action="dashboard.html" method="POST">
            <input type="text" name="username" placeholder="Uporabniško ime" required>
            <input type="password" name="password" placeholder="Geslo" required>
            <button type="submit">Prijava</button>
        </form>
        <a href="#">Pozabljeno geslo?</a>
    </div>
</body>
</html>