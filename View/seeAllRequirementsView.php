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
            <a href="http://localhost/Annyeong/index.php?page=homeClient" class="annyeong-header__right--button">Home</a>
            <a href="http://localhost/Annyeong/index.php?page=addRequirement">What do you need ?</a>
            <a href='http://localhost/Annyeong/index.php?page=comments'>Your comments</a>
        </div>
        <div class="annyeong-header__right">
            <a href="http://localhost/Annyeong/index.php?page=login" class="annyeong-header__right--button">Log out</a>
        </div>
    </header>
    <main class="main-container">   
        <?php if ($requirements){
        ?>
            <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Provider</th>
                    <th>Service</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Preference</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requirements as $requirement) { ?>
                    <tr>
                        <td><?= htmlspecialchars($requirement["id"]) ?></td>
                        <td><?= htmlspecialchars($requirement["provider_id"]) ?></td>
                        <td><?= htmlspecialchars($requirement["service_id"]) ?></td>
                        <td><?= htmlspecialchars($requirement["location"]) ?></td>
                        <td><?= htmlspecialchars($requirement["date"]) ?></td>
                        <td><?= htmlspecialchars($requirement["preference"]) ?></td>
                        <td><?= htmlspecialchars($requirement["updated_at"]) ?></td>
                        <td><a href="http://localhost/Annyeong/index.php?page=details&number=<?php echo $requirement['id']; ?>">More details</a></td>
                        <td><a href="http://localhost/Annyeong/index.php?page=modify&number=<?php echo $requirement['id']; ?>">Modify</a></td>
                        <td><a href="http://localhost/Annyeong/index.php?page=delete&number=<?php echo $requirement['id']; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
        } else{
        ?>
            <p>Providers not found</p>
        <?php  
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
