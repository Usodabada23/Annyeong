<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    <title>Annyeaong - All requirements</title>
</head>
<body>
<header class="annyeong-header">
        <h1 class="annyeong-header__h1">Annyeong<span>.</span></h1>
        <div class="annyeong-header__mid">
            <a href="http://localhost/Annyeong/index.php?page=homeProvider" class="annyeong-header__right--button">Home</a>
        </div>
        <div class="annyeong-header__right">
        <a href="http://localhost/Annyeong/index.php?page=profileProvider" class="annyeong-header__right--button">My Account</a>
            <a href="http://localhost/Annyeong/index.php?page=login" class="annyeong-header__right--button">Log out</a>
        </div>
    </header>
    <main class="main-container">
    <?php
    if ($requests) {
        foreach($requests as $request){
            echo "<form method='post'>";
            echo "<h2>Requests</h2>";
            echo "<p><strong>Service:</strong> " . htmlspecialchars($request["serviceDetail"]) . "</p>";
            echo "<p><strong>Client email:</strong> " . htmlspecialchars($request["clientDetail"]) . "</p>";
            echo "<p><strong>Location:</strong> " . htmlspecialchars($request["location"]) . "</p>";
            echo "<p><strong>Date:</strong> " . htmlspecialchars($request["date"]) . "</p>";
            echo "<p><strong>Preference:</strong> " . htmlspecialchars($request["preference"]) . "</p>";
            echo "<input type='submit' name='accept' value='Accept'/>";
            echo "<input type='submit' name='deny'value='Deny'/>";

        }
    } else {
        echo "<p>Requests list not found.</p>";
    }
    ?>
    <p id="message-acceptRequest" style="color:green;">* When you accept a request, you will be immediately put in contact with the client. You will be able to discuss the details of the service directly with them.</p>
</main>
    <footer class="annyeong-footer">
       <h4 class="annyeong-footer__h4">Annyeong</h4>
       <p class="annyeong-footer__p">&copy 2025.All rights reserved</p>
    </footer>
</body>
</html>
<?php
