<?php
session_start();
$db = new SQLite3('Database.db');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="afbeeldingen/Logo.png">
    <title>Contact Form</title>
    <style>
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
            height: 720px;
            background: #ffffff;
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
            height: 720px;
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
            height: 720px;
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
        .error {
            color: red;
        }
        .inputBox textarea
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
            resize: none;
            height: 120px;
        }

        .inputBox textarea:valid ~ span,
        .inputBox textarea:focus ~ span
        {
            color: #52A0FC;
            transform: translateX(0px) translateY(-34px);
            font-size: 0.75em;
        }
        .inputBox textarea:valid ~ i,
        .inputBox textarea:focus ~ i
        {
            height: 112px;
        }
        .footer{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }
        .info{
            color: rgb(175, 175, 175);
        }
    </style>
    <link rel="stylesheet" href="vila.css">
</head>
<body>
<div class="nav">
    <div class="navlogo">
        <img src="afbeeldingen/Logo.png" alt="logo">
    </div>
    <div class="navlinks">
        <a class="link" href="home.php">Home</a>
        <a class="link" href="contact.php">Contact</a>
    </div>
    <div class="navlogin">
        <?php
        if ($_SESSION['username'] == 'Admin') {
            echo '<a href="Logout.php"><button class="button">Logout</button></a>';
            echo  '<a href="Admin.php"><button class="button2">Admin</button></a>';
        } elseif(isset($_SESSION['username'])){
            echo '<a href="Logout.php"><button class="button">Logout</button></a>';
            echo  '<p class="name">' . $_SESSION['username'] . '</p>';
        }else {
            echo '<a href="Login.php"><button class="button">Login</button></a>';
            echo '<a href="Register.php"><button class="button2">Register</button></a>';
        }
        ?>
    </div>
</div>
<div class="bigbox">
<div class="box">
    <form method="post" action="Email.php">
        <h2>Contact Us</h2>
        <div class="inputBox">
            <input type="text" name="naam" required>
            <span>Name</span>
            <i></i>
        </div>
        <div class="inputBox">
            <input type="email" name="email" required>
            <span>Email</span>
            <i></i>
        </div>
        <div class="inputBox">
            <input type="text" name="adres" required>
            <span>Adres</span>
            <i></i>
        </div>
        <div class="inputBox">
            <input type="tel" name="telefoonnummer" required>
            <span>Telefoonnummer</span>
            <i></i>
        </div>
        <div class="inputBox">
            <textarea name="vraag" required></textarea>
            <span>Vraag</span>
            <i></i>
        </div>
        <span class="info">max van 255 tekens</span>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</div>
<div class="footer">
    <div class="linkbox1">
        <a href="comingsoon.php">Mobile app</a>
        <a href="comingsoon.php">Community</a>
        <a href="comingsoon.php">Company</a>
    </div>
    <div class="logo">
        <img src="afbeeldingen/Logo.png" alt="logo">
    </div>
    <div class="linkbox2">
        <a href="contact.php">Help desk</a>
        <a href="comingsoon.php">Blog</a>
        <a href="comingsoon.php">Recources</a>
    </div>
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