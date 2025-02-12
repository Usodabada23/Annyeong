<?php
if (session_status() !== PHP_SESSION_ACTIVE){
	session_start();
	
}
if (!isset($_SESSION["user_id"])){
	header("Location: http://localhost/Annyeong/index.php?page=login");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/Annyeong/public/css/style.css" rel="stylesheet">
    <title>Annyeong - Home</title>
</head>
<body>
    <?php
    echo "<header class='annyeong-header'>";
        echo "<h1 class='annyeong-header__h1'>Annyeong<span>.</span></h1>";
        echo "<div class='annyeong-header__mid'>";
            echo "<a href='http://localhost/Annyeong/index.php?page=addRequirement'>What do you need ?</a>";
            echo "<a href='http://localhost/Annyeong/index.php?page=allRequirement'>Ongoing requests</a>";
            echo "<a href='http://localhost/Annyeong/index.php?page=comments'>Your comments</a>";
        echo "</div>";
        echo "<div class='annyeong-header__right'>";
            echo "<a href='http://localhost/Annyeong/index.php?page=profileClient' class='annyeong-header__right--button'>My Account</a>";
            echo "<a href='http://localhost/Annyeong/index.php?page=login' class='annyeong-header__right--button'>Log out</a>";
        echo "</div>";
    echo "</header>";
    ?>
    <main>
        <h2 class="hello-username">Hello,  <?php echo $_SESSION["username"];?></h2>
        <h3>Our Services</h3> 
        <section class="homeProvider-container">
        <?php
            if($services){
                foreach($services as $service){
                    echo "<article class='homeProvider-container__card'>";
                    echo "<h4 class='homeProvider-container__card--h4'>" . $service["name"] . "</h4>";
                    echo "<p class='homeProvider-container__card--description'>" . $service["description"] . "</p>";
                    echo "<p class='homeProvider-container__card--price'>~" . $service["price"] . "$</p>";
                    echo "</article>";
                }
            }
            else {
                echo "<p>Aucun service trouvé</p>";
            }
        ?>
        </section>
    </main>
    <footer class="annyeong-footer">
       <h4 class="annyeong-footer__h4">Annyeong</h4>
       <p class="annyeong-footer__p">&copy 2025.All rights reserved</p>
    </footer>
</body>
</html>