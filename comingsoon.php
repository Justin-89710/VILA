<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comming Soon!</title>
    <link rel="icon" href="afbeeldingen/Logo.png">
    <link rel="stylesheet" href="vila.css">
</head>
<style>

@import url(https://fonts.googleapis.com/css?family=Montserrat);
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

h1 {
  margin: 0;
  font-family: 'Montserrat', sans-serif;
  font-size: 4em;
}

p {
  font-family: 'Open Sans', sans-serif;
  font-size: 1.4em;
  font-weight: bold;
}

.container {
    margin-top: 5em;
  position: absolute;
  top: 0;
  bottom: 0;
  width: 100%;
  background-size: cover;
}

.wrapper {
  width: 100%;
  height: auto;
  display: table;
    margin-top: 20em;
    margin-bottom: 19em;
}

.content {
  display: table-cell;
  vertical-align: middle;
}

.item {
  width: auto;
  height: auto;
  margin: 0 auto;
  text-align: center;
  padding: 8px;
}

@media only screen and (min-width: 800px) {
  h1 {
    font-size: 6em;
  }
  p {
    font-size: 1.6em;
  }
}

@media only screen and (max-width: 320px) {
  h1 {
    font-size: 2em;
  }
  p {
    font-size: 1.2em;
  }
}
</style>
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

<div class="container">
  <div class="wrapper">
    <div class="content">
      <div class="item">
        <h1>COMING SOON</h1>
        <p>The app is under construction and were working hard to get it ready and published as soon as posible</p>
      </div>
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
</div>
</div>
<script>
const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

if (isDarkMode) {
document.body.classList.add('dark-mode');
document.querySelector('.nav').classList.add('dark-mode');
document.querySelector('.footer').classList.add('dark-mode');
document.querySelector('.linkbox1 a').classList.add('dark-mode');
document.querySelector('.linkbox2 a').classList.add('dark-mode');
}
</script>
</body>
</html>