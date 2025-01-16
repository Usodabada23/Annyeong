<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anneyo Register</title>
</head>
<body>
    <header class="header-container">
        <h1 class="header-container__h1">Annyeong</h1>
        <a href="/Annyeong/login.php" class="header-container__a">Login</a>
    </header>
    <main class="main-container">
        <h2 class="main-container__h2">Register</h2>
        <form action="" method="post" class="main-container__form">
            <div class="main-container__form--lastname">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" />
            </div>
            <div class="main-container__form--firstname">
                <label for="first">Firstname</label>
                <input type="text" name="firstname" />
            </div>
            <div class="main-container__form--birthDate">
                <label for="birthDate">Birth Date</label>
                <input type="date" name="birthDate" />
            </div>
            <div class="main-container__form--email">
                <label for="email">Email</label>
                <input type="text" name="email" />
            </div>
            <div class="main-container__form--username">
                <label for="username">Username</label>
                <input type="text" name="username" />
            </div>
            <div class="main-container__form--password">
                <label for="password">Password</label>
                <input type="password" name="password" id="pwd"/>
                <p id="error-message"></p> 
            </div>
            <div class="main-container__form--password">
                <label for="confPassword">Confirm Password</label>
                <input type="password" name="confPassword" id="confPwd"/>
                <p id="confirm-error"></p> 
            </div>
            <div class="main-container__form--role">
                <select for="role" name="role">
                    <option value="client">Client</option>
                    <option value="Provider">Provider</option>
            </select>
            </div>
            <button type="submit" value="register">Register</button> 
        </form>
    </main>
    <footer class="footer-container">
       <h4 class="footer-container__h4">Annyeong</h4>
       <p class="footer-container__p">&copy 2025.All rights reserved</p>
    </footer>
    <script src="js/init.js"></script>
</body>
</html>

<?php 
try {
    require 'init_database.php';
    $conn = connToDb();
    if(isset($_POST["lastname"]) && isset($_POST["firstname"]) && isset($_POST["birthDate"]) && 
    isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && $_POST["role"]){
        $lname = $_POST["lastname"];
        $fname = $_POST["firstname"];
        $birthDate = $_POST["birthDate"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role =  $_POST["role"];


        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "invalid email ";
            exit;
        }
        $pwd_regex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{9,}$/';

        if (!preg_match($pwd_regex, $password)) {
            echo "Invalid password (8 characters, 1 lowercase, 1 uppercase, a number, and a special character)";
            exit;
        }

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username,$email]); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user){
            if($user["email"] === $email){
                echo "your email is already used";
                exit;
            }else if($user["username"] === $username){
                echo "yout username is already used";
                exit;
            }
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username,lastname,firstname,email,password,birthDate,role) VALUES (?,?,?,?,?,?,?)";
        $conn->prepare($sql)->execute([$username, $lname, $fname,$email,$hashedPassword,$birthDate,$role]);
        sleep(2);
        header("Location: /Annyeong/login.php");
        exit(); 
        
    }
}catch(Exception $e){
    echo $e->getMessage();
}
?>