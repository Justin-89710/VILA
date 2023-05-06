<?php
session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new SQLite3('Database.db');

    $result = $db->query("SELECT * FROM login WHERE username='$username'");

    if ($row = $result->fetchArray()) {
        $encrypted_password = $row['password'];
        if (password_verify($password, $encrypted_password)) {
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit;
        } else {
            $error = "email en/of wachtwoord zijn onjuist.";
        }
    } else {
        $error = "email en/of wachtwoord zijn onjuist.";
    }

    $db->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
	height: 520px;
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
	height: 420px;
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
	height: 420px;
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
.error{
    color: red;
}
    </style>
    <title>Login</title>
</head>
<body>
<div class="box">
<form method="post" action="">
    <h2>Login</h2>
    <div class="inputBox">
    <input type="text" id="username" name="username" required>
        <span>Username:</span>
        <i></i>
    </div>
    <br>
    <div class="inputBox">
    <input type="password" id="password" name="password" required>
        <span>Password:</span>
        <i></i>
    </div>
    <div class="error">
    <?= $error ?>
    </div>
    <br>
    <div class="links">
    <a href="Register.php">Signup</a>
    <a href="Wachtwoord_vergeten.php">Forgot Password?</a>
    </div>
    <input type="submit" name="submit" value="Inloggen">
</form>
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