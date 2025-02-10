<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/css/style.css" rel="stylesheet">
    <title>Annyeong Register</title>
</head>
<body>
<header class="annyeong-header">
        <h1 class="annyeong-header__h1">Annyeong<span>.<span></h1>
        <div class="annyeong-header__right">
            <a href="http://localhost/Annyeong/index.php?page=login" class="annyeong-header__right--button">Login</a>
        </div>
    </header>
    <main>
        <div class="register-container">
            <h2 class="register-container__title">Register</h2>
            <form action="" method="post" class="main-container__form">
                <div class="register-container__form--info">
                    <label for="lastname" >Lastname</label>
                    <input  type="text" name="lastname" id="lastname" />
                    <label for="firstname" >Firstname</label>
                    <input  type="text" name="firstname" id="firstname" />
                    <label for="birthDate" >Birth Date</label>
                    <input  type="date" name="birthDate" id="birthDate" />
                </div>
                <div class="register-container__form--email">
                    <label for="email">Email</label>
                    <input  type="email" name="email" id="email" />
                </div>
                <div class="register-container__form--username">
                    <label for="username">Username</label>
                    <input  type="text" name="username" id="username" />
                </div>
                <div class="register-container__form--password">
                    <label for="password" >Password</label>
                    <input  type="password" name="password" id="pwd" />
                    <p id="error-message"></p>
                </div>
                <div class="register-container__form--confpwd">
                    <label for="confPassword">Confirm Password</label>
                    <input type="password" name="confPassword" id="confPwd" />
                    <p id="confirm-error"></p>
                </div>
                <div class="register-container__form--role">
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="client">Client</option>
                        <option value="provider">Provider</option>
                    </select>
                </div>
                <button type="submit" class="register-container__form--button">Register</button>
            </form>
        </div>
    </main>
    <footer class="annyeong-footer">
       <h4 class="annyeong-footer__h4">Annyeong</h4>
       <p class="annyeong-footer__p">&copy 2025.All rights reserved</p>
    </footer>
    <script src="../public/js/init.js"></script>
</body>
</html>