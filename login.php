<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.css" rel="stylesheet">
    <title>Anneyo Login</title>
</head>
<body>
    <header class="annyeong-header">
        <h1 class="annyeong-header__h1">Annyeong<span>.<span></h1>
        <div class="annyeong-header__right">
            <a href="/Annyeong/register.php" class="annyeong-header__right--button">Register</a>
        </div>
    </header>
    <main class="login-container">
        <h2 class="login-container__titlelogin">Login</h2>
        <form class="login-container__form" action="" method="post">
            <div class="login-container__form--username">
                <label for="username">Username</label>
                <input type="text" name="username" />
            </div>
            <div class="login-container__form--password">
                <label for="password">Password</label>
                <input type="password" name="password" />
            </div>
            <button type="submit" value="login">Login</button> 
        </form>
    </main>
    <footer class="annyeong-footer">
       <h4 class="annyeong-footer__h4">Annyeong</h4>
       <p class="annyeong-footer__p">&copy 2025.All rights reserved</p>
    </footer>
</body>
</html>

<?php
try {
    require_once "init_database.php";
    $conn = connToDb();
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $pwd = $_POST["password"];
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedpwd = $user["password"];
        if($user &&  password_verify($pwd,$hashedpwd)){
            sleep(2);
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user["role"];
            if($user["role"]=== "client"){
               header("Location: /Annyeong/homeClient.php");
               exit;
            }else{
                header("Location: /Annyeong/homeProvider.php");
                exit; 
            }     
        }else{
            echo "invalid password or username";
            header("Location: /Annyeong/login.php?error=invalid_credentials");
            exit();
        }
    }
}catch(Exception $e){
  echo $e->getMessage();
}
