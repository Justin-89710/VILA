<?php
session_start();
$db = new SQLite3('Database.db');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $error = "Username is required";
    } else if (empty($password)) {
        $error = "Password is required";
    } else if (strlen($password) < 8) {
        $error = "Password must be at least 8 characters";
    } else if (strlen($password) > 20) {
        $error = "Password must be less than 20 characters";
    } else if (preg_match('/[0-9]/', $password) == 0 || preg_match('/[A-Z]/', $password) == 0 || preg_match('/[a-z]/', $password) == 0) {
        $error = "Password must contain at least one lowercase letter, one number, and one uppercase letter";
    } else if (preg_match('/[\'^£$%&*()}{@#~?<>,|=_+¬-]/', $username)) {
        $error = "Username must not contain special characters";
    } else if (strlen($username) < 4) {
        $error = "Username must be at least 4 characters";
    } else if (strlen($username) > 20) {
        $error = "Username must be less than 20 characters";
    } else {
        // encrypt the password
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        // insert the user into the database
        $stmt = $db->prepare("INSERT INTO login (username, password) VALUES (:username, :password)");
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':password', $encrypted_password, SQLITE3_TEXT);
        $stmt->execute();

        // set session variable and redirect to home page
        $_SESSION["username"] = $username;
        header("Location: home.php");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="afbeeldingen/Logo.png">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .dark-mode,
        .dark-mode .box,
        .dark-mode form{
            background-color: #1a1a1a;
            color: #fff;
        }
        body
        {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            background: white;
        }
        .box
        {
            position: relative;
            width: 380px;
            height: 600px;
            background: #eeeeee;
            border-radius: 8px;
            overflow: hidden;
        }
        .box::before
        {
            content: '';
            z-index: 1;
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 600px;
            transform-origin: bottom right;
            background: linear-gradient(0deg,transparent,#52A0FC,#52A0FC);
            animation: animate 6s linear infinite;
        }
        .box::after
        {
            content: '';
            z-index: 1;
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 600px;
            transform-origin: bottom right;
            background: linear-gradient(0deg,transparent,#52A0FC,#52A0FC);
            animation: animate 6s linear infinite;
            animation-delay: -3s;
        }
        @keyframes animate
        {
            0%
            {
                transform: rotate(0deg);
            }
            100%
            {
                transform: rotate(360deg);
            }
        }
        form
        {
            position: absolute;
            inset: 2px;
            background: #eeeeee;
            padding: 50px 40px;
            border-radius: 8px;
            z-index: 2;
            display: flex;
            flex-direction: column;
        }
        h2
        {
            color: #52A0FC;
            font-weight: 500;
            text-align: center;
            letter-spacing: 0.1em;
        }
        .inputBox
        {
            position: relative;
            width: 300px;
            margin-top: 35px;
        }
        .inputBox input
        {
            position: relative;
            width: 100%;
            padding: 20px 10px 10px;
            background: transparent;
            outline: none;
            box-shadow: none;
            border: none;
            color: #eeeeee;
            font-size: 1em;
            letter-spacing: 0.05em;
            transition: 0.5s;
            z-index: 10;
        }
        .inputBox span
        {
            position: absolute;
            left: 0;
            padding: 20px 0px 10px;
            pointer-events: none;
            font-size: 1em;
            color: #52A0FC;
            letter-spacing: 0.05em;
            transition: 0.5s;
        }
        .inputBox input:valid ~ span,
        .inputBox input:focus ~ span
        {
            color: #52A0FC;
            transform: translateX(0px) translateY(-34px);
            font-size: 0.75em;
        }
        .inputBox i
        {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #52A0FC;
            border-radius: 4px;
            overflow: hidden;
            transition: 0.5s;
            pointer-events: none;
            z-index: 9;
        }
        .inputBox input:valid ~ i,
        .inputBox input:focus ~ i
        {
            height: 44px;
        }
        .links
        {
            display: flex;
            justify-content: space-between;
        }
        .links a
        {
            margin: 10px 0;
            font-size: 0.75em;
            color: #8f8f8f;
            text-decoration: beige;
        }
        .links a:hover,
        .links a:nth-child(2)
        {
            color: #52A0FC;
        }
        input[type="submit"]
        {
            border: none;
            outline: none;
            padding: 11px 25px;
            background: #52A0FC;
            cursor: pointer;
            border-radius: 4px;
            font-weight: 600;
            width: auto;
            margin-top: 10px;
        }
        input[type="submit"]:active
        {
            opacity: 0.8;
        }
        .error
        {
            color: red;
            font-size: 0.75em;
            margin-top: 10px;
        }
        .username-status
        {
            color: red;
            font-size: 0.75em;
            margin-top: 10px;
            position: absolute;
        }
        .info{
            color: rgb(175, 175, 175);
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="box">
    <form action="Register.php" method="post">
        <h2>Register</h2>
        <div class="inputBox">
            <input type="text" name="username" id="username" required>
            <span>Username</span>
            <i></i>
            <span class="username-status"></span>
        </div>
        <span class="info">minimaal 4 leters <br> maximaal 20 tekens <br> alleen letters</span>
        <span id="message"></span>
        <div class="inputBox">
            <input type="password" name="password" required>
            <span>Password</span>
            <i></i>
        </div>
        <span class="info">minimaal 8 tekens <br> minimaal 1 hoofdleter <br> minimaal 1 klijne letter <br> minimaal 1 getal <br> minimaal 1 seciaal teken <br> max 20 tekens.</span>
        <div class="links">
        <a href="Login.php">Login</a>
        </div>
        <div class="error">
        <?= $error ?>
        </div>
        <input type="submit" name="register" value="Register">
    </form>
</div>

<script>
    let timerId;

    function checkUsername() {
        let username = document.getElementById("username").value;
        clearTimeout(timerId);
        if (username.length >= 4) {
            timerId = setTimeout(function() {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "check_username.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = JSON.parse(xhr.responseText);
                        let message = document.getElementById("message");
                        let status = document.querySelector(".username-status");
                        if (response.error) {
                            message.innerHTML = response.error;
                            message.style.color = "red";
                            status.innerHTML = "";
                        } else if (response.available) {
                            message.innerHTML = "Username is available";
                            message.style.color = "green";
                            status.innerHTML = "";
                        } else {
                            message.innerHTML = "Username is taken";
                            message.style.color = "red";
                            status.innerHTML = "";
                        }
                    }
                };
                xhr.send("username=" + username);
            }, 1000);
        }
    }

    document.getElementById("username").addEventListener("input", checkUsername);
</script>
<script>
    // Check if user's browser is in dark mode
    const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

    // If user's browser is in dark mode, set the page to dark mode
    if (isDarkMode) {
        document.body.classList.add('dark-mode');
        document.querySelector('.box').classList.add('dark-mode');
        document.querySelector('form').classList.add('dark-mode');
    }
</script>
</body>
</html>