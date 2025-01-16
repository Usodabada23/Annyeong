<?php
if (session_status() !== PHP_SESSION_ACTIVE){
	session_start();
	
}
if (!isset($_SESSION["user_id"])){
	header("Location: /Annyeong/login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/custom.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <header class="header-container">
        <h1 class="header-container__h1">Annyeong</h1>
        <a href="/Annyeong/logout.php" class="header-container__a">Log out</a>
    </header>
    <main class="main-container">
        <h2 class="main-container__h2">Hello,  <?php echo $_SESSION["username"];?></h2>
        <h3>Informations</h3>
        <p>Role : <?php echo $_SESSION["role"];?></p>
    </main>
    <footer class="footer-container">
       <h4 class="footer-container__h4">Annyeong</h4>
       <p class="footer-container__p">&copy 2025.All rights reserved</p>
    </footer>
</body>
</html>
<?php
