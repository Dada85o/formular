<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <main>
        <section>
            <div class="form" style="text-align:center;">
                <img src="img/apexlogo.png" alt="Logo" style="width:100px;">
                <h2>Vítej zpátky, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
                <p>Jsi úspěšně přihlášený.</p>
                <a href="logout.php" style="color:#f25a5a; margin-top:20px; display:inline-block;">Odhlásit se</a>
            </div>
        </section>
    </main>
</body>
</html>