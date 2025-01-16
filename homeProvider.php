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
    <link href="./css/style.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <header class="header-container">
        <h1 class="header-container__h1">Annyeong</h1>

        <div class="header-container__right">
            <a href="/Annyeong/profile.php" class="header-container__a">My Account</a>
            <a href="/Annyeong/logout.php" class="header-container__a">Log out</a>
        </div>
    </header>
    <main>
        <h2>Hello,  <?php echo $_SESSION["username"];?></h2>
        <h3>Our Services</h3> 
        <section class="homeProvider-container">
        <?php
            try{
                $services = $conn->query("SELECT * FROM services")->fetchAll();
                foreach($services as $service){
                    echo "<article class='homeProvider-container__card'>";
                    echo "<h4 class='homeProvider-container__card--h4'>" . $service["name"] . "</h4>";
                    echo "<p class='homeProvider-container__card--description'>" . $service["description"] . "</p>";
                    echo "<p class='homeProvider-container__card--price'>~" . $service["price"] . "$</p>";
                    echo "</article>";
                }
            }catch(Exception $e){
                $e->getMessage();
            }
        ?>
        </section>
    </main>
    <footer class="footer-container">
       <h4 class="footer-container__h4">Annyeong</h4>
       <p class="footer-container__p">&copy 2025.All rights reserved</p>
</body>
</html>
<?php