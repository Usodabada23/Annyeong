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
    <title>Annyeaong - #<?php echo $_GET["number"];?> - details</title>
</head>
<body>
<header class="annyeong-header">
        <h1 class="annyeong-header__h1">Annyeong<span>.</span></h1>
        <div class="annyeong-header__mid">
            <a href="http://localhost/Annyeong/index.php?page=homeClient" class="annyeong-header__right--button">Home</a>
            <a href="http://localhost/Annyeong/index.php?page=addRequirement">What do you need ?</a>
            <a href='http://localhost/Annyeong/index.php?page=allRequirement'>Ongoing requests</a>
            <a href='http://localhost/Annyeong/index.php?page=comments'>Your comments</a>
        </div>
        <div class="annyeong-header__right">
            <a href="http://localhost/Annyeong/index.php?page=login" class="annyeong-header__right--button">Log out</a>
        </div>
    </header>
    <main class="main-container">   
    <?php
    if ($details) {
        $number = $_GET["number"];
        echo "<h2>Requirement Details</h2>";
        echo "<p><strong>Service:</strong> " . htmlspecialchars($details["serviceDetail"]) . "</p>";
        echo "<p><strong>Provider email:</strong> " . htmlspecialchars($details["providerDetail"]) . "</p>";
        echo "<p><strong>Location:</strong> " . htmlspecialchars($details["location"]) . "</p>";
        echo "<p><strong>Date:</strong> " . htmlspecialchars($details["date"]) . "</p>";
        echo "<p><strong>Preference:</strong> " . htmlspecialchars($details["preference"]) . "</p>";
        echo "<p><strong>Created At:</strong> " . htmlspecialchars($details["created_at"]) . "</p>";
        echo "<p><strong>Last Updated:</strong> " . htmlspecialchars($details["updated_at"]) . "</p>";
        echo "<div class='pagination'>";
        if ($number > 1) {
            echo "<a href='index.php?page=details&number=" . ($number - 1) . "'>⟨ Previous Requirement</a>";
        }
        if ($number < $totalRequirements) {
            echo "<a href='index.php?page=details&number=" . ($number + 1) . "'>Next Requirement ⟩</a>";
        }
        echo "</div>";
    } else {
        echo "<p>Requirement details not found.</p>";
    }
    ?>
</main>
    <footer class="annyeong-footer">
       <h4 class="annyeong-footer__h4">Annyeong</h4>
       <p class="annyeong-footer__p">&copy 2025.All rights reserved</p>
    </footer>
</body>
</html>
<?php
