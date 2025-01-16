<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anneyo Login</title>
</head>
<body>
    <header class="header-container">
        <h1 class="header-container__h1">Annyeong</h1>
        <a href="/Annyeong/register.php" class="header-container__a">Register</a>
    </header>
    <main class="main-container">
        <h2 class="main-container__h2">Login</h2>
        <form action="" method="post" class="main-container__form">
            <div class="main-container__form--username">
                <label for="username">Username</label>
                <input type="text" name="username" />
            </div>
            <div class="main-container__form--password">
                <label for="password">Password</label>
                <input type="password" name="password" />
            </div>
            <button type="submit" value="register">Login</button> 
        </form>
    </main>
    <footer class="footer-container">
       <h4 class="footer-container__h4">Annyeong</h4>
       <p class="footer-container__p">&copy 2025.All rights reserved</p>
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
