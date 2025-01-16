<?php
if (session_status() !== PHP_SESSION_ACTIVE){
	session_start();
	
}
if (!isset($_SESSION["user_id"])){
	header("Location: /Annyeong/login.php");
	exit();
}
require_once 'init_database.php';
$conn = connToDb();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/custom.css" rel="stylesheet">
    <title>Home</title>
</head>
<body style="padding-left:12%;padding-right:12%">
    <header style="display:flex;"class="header-container">
        <h1 class="header-container__h1">Annyeong</h1>

        <div style="margin:0 auto; left:0; padding-top:3%"class="header-container__right">
            <a href="/Annyeong/profile.php" class="header-container__right--profile">My Account</a>
            <a href="/Annyeong/logout.php" class="header-container__right--logout">Log out</a>
        </div>
    </header>
    <main class="main-container">
        <h2 class="main-container__h2">Hello,  <?php echo $_SESSION["username"];?></h2>
        <?php
            try{
                $services = $conn->query("SELECT * FROM services")->fetchAll();
                echo "<article class='card text-bg-light mb-3' style='max-width: 18rem;'>";
                foreach($services as $service){
                    echo "<h3 class='card-title'>" . $service["name"] . "</h3>";
                    echo "<p class='card-text'>" . $service["description"] . "</p>";
                    echo "<p class='card-text'>" . $service["price"] . "$</p>";
                }
                echo "</article>";
            }catch(Exception $e){
                $e->getMessage();
            }
        ?>
    </main>
    <footer class="footer-container">
       <h4 class="footer-container__h4">Annyeong</h4>
       <p class="footer-container__p">&copy 2025.All rights reserved</p>
</body>
</html>
<?php