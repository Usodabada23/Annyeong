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
    <title>Annyeaong - Add a requirement</title>
</head>
<body>
<header class="annyeong-header">
        <h1 class="annyeong-header__h1">Annyeong<span>.</span></h1>
        <div class="annyeong-header__mid">
            <a href="http://localhost/Annyeong/index.php?page=homeClient" class="annyeong-header__right--button">Home</a>
            <a href="http://localhost/Annyeong/index.php?page=allRequirement">Ongoing requests</a>
            <a href='http://localhost/Annyeong/index.php?page=comments'>Your comments</a>
        </div>
        <div class="annyeong-header__right">
            <a href="http://localhost/Annyeong/index.php?page=login" class="annyeong-header__right--button">Log out</a>
        </div>
    </header>
    <main class="main-container">
        
        <?php if ($providers && $services){
            ?>
            <form method="post">
            <div>
                <!---<label for="chooseProvider">Choose a provider</label>--->
                <select name="chooseProvider" id="chooseProvider">
                    <option value="">--- Choose a provider ---</option>
                    <?php
                        foreach($providers as $provider){
                            echo "<option value='". $provider["id"] ."'required>".$provider["lastname"]." ".$provider["firstname"]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
            <select name="chooseService" id="chooseService">
                    <option value="">--- Choose a service ---</option>
                    <?php
                        foreach($services as $service){
                            echo "<option value='". $service["id"] ."' required>".$service["name"]." - ".$service["price"]." $</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="location">Where ?</label>
                <input type="text" id="location" name="location" required/>  
            </div>
            <div>
                <label for="meeting-time">Best date for you ?</label>
                <input type="date" id="date-input" name="dateRequirement" required/>  
            </div>
            <div>
                <label>You preferred ?</label>
                <input type="radio" id="morning" value="Morning" name="preference" />
                <label for="morning">Morning</label>
                
                <input type="radio" id="afternoon" value="Afternoon" name="preference" />
                <label for="afternoon">Afternoon</label>
            </div>
            <input type="submit" value="Add a requirement"/>
            </form>
        <?php
        } else{
        ?>
            <p>Providers and services not found</p>
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
