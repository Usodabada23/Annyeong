<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/Annyeong/public/css/style.css" rel="stylesheet">
    <title>Anneyo Login</title>
</head>
<body>
    <header class="annyeong-header">
        <h1 class="annyeong-header__h1">Annyeong<span>.<span></h1>
        <div class="annyeong-header__right">
            <a href="http://localhost/Annyeong/index.php?page=register" class="annyeong-header__right--button">Register</a>
        </div>
    </header>
    <main class="login-container">
        <h2 class="login-container__titlelogin">Login</h2>
        <form class="login-container__form" action="" method="post">
            <div class="login-container__form--username">
                <label for="username">Username</label>
                <input type="text" name="username" required/>
            </div>
            <div class="login-container__form--password">
                <label for="password">Password</label>
                <input type="password" name="password" required/>
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
