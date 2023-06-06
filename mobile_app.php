<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.nav{
    background-color: #fff;
    padding: 10px 0;
    width: 100%;
    height: 100px;
}
.navlogo{
    float: left;
    width: 350px;
    padding-left: 10px;
}
.navlogo img{
    margin-top: 25px;
    margin-left: 13px;
    width: 200px;
}
.navlinks{
    float: left;
    width: 30%;
    padding-left: 0.7em;
    padding-top: 2.3em;
    font-size: 19px;
    margin-top: 0.6em;
}
.link{
    text-decoration: none;
    color: #52A0FC;
    padding-left: 2em;
}
.navlogin{
    float: right;
    width: 40%;
    padding-right: 1em;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 1.2em;
}
.name{
    font-size: 15px;
    color: #52A0FC;
    width: 10%;
    margin-left: 3em;
    margin-top: 2.3em;
}

/*End of header*/

/*button*/

.button{
    background-color: transparent;
    color: #52A0FC;
    border: 1px solid #52A0FC;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    margin-left: 1em;
    width: auto;
    margin-top: 1.5em;
    transition: 1s;
}

.button:hover{
    background-color: #52A0FC;
    color: white;
}

.button2{
    background-color: #52A0FC;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    margin-left: 1em;
    width: auto;
    margin-top: 1.5em;
    transition: 1s;
}

.button2:hover{
    background-color: transparent;
    color: #52A0FC;
    border: 1px solid #52A0FC;
}

@import url(https://fonts.googleapis.com/css?family=Montserrat);
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

h1 {
  margin: 0;
  font-family: 'Montserrat', sans-serif;
  font-size: 4em;
  color: #333;
  -webkit-text-shadow: 0 2px 1px rgba(0, 0, 0, 0.6), 0 0 2px rgba(0, 0, 0, 0.7);
  -moz-text-shadow: 0 2px 1px rgba(0, 0, 0, 0.6), 0 0 2px rgba(0, 0, 0, 0.7);
  text-shadow: 0 2px 1px rgba(0, 0, 0, 0.6), 0 0 2px rgba(0, 0, 0, 0.7);
  word-spacing: 16px;
}

p {
  font-family: 'Open Sans', sans-serif;
  font-size: 1.4em;
  font-weight: bold;
  color: #222;
  text-shadow: 0 0 40px #FFFFFF, 0 0 30px #FFFFFF, 0 0 20px #FFFFFF;
}

.container {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 100%;
  background: url('');
  background-size: cover;
}

.wrapper {
  width: 100%;
  min-height: 100%;
  height: auto;
  display: table;
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

@media screen and (max-width: 600px) {
    .linkbox1{
        display: none;
    }
    .linkbox2{
        display: none;
    }
    .linkbox1 a{
        display: none;
    }
    .linkbox2 a{
        display: none;
    }
    .logo{
        min-width: 100%;
        text-align: center;
    }
}
.footer{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 100%;
}
.linkbox1{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 33%;
    margin-left: 3em;
    margin-top: 10em;
}

.linkbox1 a{
    text-decoration: none;
    color: black;
    font-size: 13px;
    font-weight: bold;
}

.logo{
    width: 25%;
    margin-top: 2em;
    text-align: center;
}

.logo img{
    width: 50%;
    margin: auto;
}

.linkbox2{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 33%;
    margin-top: 10em;
    margin-right: 3em;
    float: right;
}

.linkbox2 a{
    text-decoration: none;
    color: black;
    font-size: 13px;
    font-weight: bold;
}
</style>
<body>
<div class="nav">
    <div class="navlogo">
        <img src="Logo.png" alt="logo">
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
        <p> were working hard to get it ready and published as soon as posible</p>
      </div>
    </div>
  </div>
</div>

<div class="footer">
    <div class="linkbox1">
        <a href="mobile_app.php">Mobile app</a>
        <a href="mobile_app.php">Community</a>
        <a href="mobile_app.php">Company</a>
    </div>
    <div class="logo">
        <img src="afbeeldingen/Logo.png" alt="logo">
    </div>
    <div class="linkbox2">
        <a href="help.php">Help desk</a>
        <a href="mobile_app.php">Blog</a>
        <a href="mobile_app.php">Recources</a>
    </div>
</div>
</div>
</body>
</html>