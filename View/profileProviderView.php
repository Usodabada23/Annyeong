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
    <title>we miss you <?php echo $_SESSION["username"]; ?></title>
</head>
<body>
<header class="annyeong-header">
        <h1 class="annyeong-header__h1">Annyeong<span>.</span></h1>
        <div class="annyeong-header__mid">
            <a href="http://localhost/Annyeong/index.php?page=homeProvider" class="annyeong-header__right--button">Home</a>
            <a  href="http://localhost/Annyeong/index.php?page=addRequirement">What do you need ?</a>
            <a href="http://localhost/Annyeong/index.php?page=allRequirement">Ongoing requests</a>
        </div>
        <div class="annyeong-header__right">
            <a href="http://localhost/Annyeong/index.php?page=login" class="annyeong-header__right--button">Log out</a>
        </div>
    </header>
    <main class="main-container">
        <h2 class="main-container__h2">My Account</h2>
        <h3>Provider informations</h3>
        <p>Lastname : <?php echo $user["lastname"];?></p>
        <p>Firstname : <?php echo $user["firstname"];?></p>
        <p>Username : <?php echo $user["username"];?></p>
        <p>Email : <?php echo $user["email"];?></p>
        <p>Birth date : <?php echo $user["birthDate"];?></p>
        <p>Your Account has been created at : <?php echo $user["created_at"];?></p>
    </main>
    <footer class="annyeong-footer">
       <h4 class="annyeong-footer__h4">Annyeong</h4>
       <p class="annyeong-footer__p">&copy 2025.All rights reserved</p>
    </footer>
</body>
</html>
<?php
