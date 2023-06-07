<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Document</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
body{
  font-family: 'Poppins', sans-serif;
}

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

/*Start of main*/
/* Slideshow container */
.swiper {
      width: 100%;
      height: 100%;
      border-radius: 50px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 30px;
      color: #52A0FC;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .swiper {
      width: 100%;
      height: 300px;
      margin: 20px 0;
    }

    .wrapper1 {
    display: flex;
    gap: 90px;
    margin-top: 90px;
  }

  .titelTekst {
    margin-top: 80px;
    text-align: center;
    width: 500px;
    margin-right: auto;
    margin-left: auto;
    font-size: 25px;
  }

  .uitlegTekst {
    font-size: 20px;
  }

  .section-wrapper{
    margin-top: 30px;
  }

  .section {
    margin-right: auto;
    margin-left: auto;
    margin-top: 90px;
    width: 80%;
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
    text-align: center;
    max-width: 80%;
    align-items: center;
    height: 350px;
}

.section img{
    height: 300px;
    width: 30%;
    border-radius: 10px;
    float: right;
    align-items: center;
}

.section h3 {
    align-items: center;
    font-weight: normal;
}

.section2 {
    margin-right: auto;
    margin-left: auto;
    margin-top: 70px;
    width: 80%;
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
    text-align: center;
    max-width: 80%;
    align-items: center;
    height: 350px;
}

.section2 img{
    height: 300px;
    width: 50%;
    border-radius: 10px;
    float: right;
    align-items: center;
}

.section2 h3 {
    align-items: center;
    font-weight: normal;
}

#verkocht-uitleg {
  font-size: 15px;
  font-weight: normal;
}

/*End of main*/
/*Footer*/

.footer{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 20px;
}
.linkbox1{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 33%;
    margin-left: 3em;
    margin-top: 5em;
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
    margin-top: 5em;
    margin-right: 3em;
    float: right;
}

.linkbox2 a{
    text-decoration: none;
    color: black;
    font-size: 13px;
    font-weight: bold;
}

.socials{
   display: flex;
   justify-content: center;
   margin-top: 40px;
   gap: 20px;
}

.socials img{
    width: 100px;
}

.copyright{
    
    display: flex;
    justify-content: center;
    font-family: 'Poppins', sans-serif;
    font-size: 7px;
}

.copyright p{
  color: rgb(107, 107, 107);
  font-weight: normal;
}

/*End of footer*/
</style>
<body>
<div class="nav">
    <div class="navlogo">
        <img src="afbeeldingen/Logo.png" alt="">
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
<div class="titelTekst">
            <p >Villa te koop</p>
            <div class= "uitlegTekst">Kies uit een van onze diverse villa's en als u geintereseerd bent plaats u bod.</div>
            <p id="verkocht-uitleg">Als bij het huis geen foto van de villa staat maar <span style="color: #52A0FC;">Verkocht</span> dan betekent het dat er niet meer op dat huis geboden kan worden.</p>
        </div>

  <!-- Swiper -->
  <div class="wrapper1">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><a href="#"><img src="afbeeldingen/huis1_2.jpg"></a></div>
      <div class="swiper-slide">Verkocht<a href="#"></a></div>
   
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    <div class="swiper-pagination"></div>
  </div>
  <div class="swiper mySwiper2">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><a href="#"><img src="afbeeldingen/huis2_2.jpg"></a></div>
        <div class="swiper-slide">Verkocht<a href="#"></a></div>
      
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    <div class="swiper-pagination"></div>
  </div>
  <div class="swiper mySwiper3">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><a href="#"><img src="afbeeldingen/huis3_3.jpg"></a></div>
        <div class="swiper-slide">Verkocht<a href="#"></a></div>
    
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    
    <div class="swiper-pagination"></div>
  </div>
</div>


<div class="section-wrapper">
<div class="section">
        <div>
        <h3>Onze website is gemaakt zodat mensen snel en gemakkelijk hogekwaliteit villa's kunnen vinden in Nederland.</h3>
        </div>
            <img src="afbeeldingen/villa-mooi.jpeg" >
      </div>

      <div class="section2">
        <img src="afbeeldingen/villa-achtergrond.webp">
    <h3>Wij Zorgen voor de hoogste kwaliteit villa's met goede comfort. Alles wat u van een villa verwacht kunt u bij onze villa's vinden.</h3>
        </div>

      </div>

      <div class="section">
        <div>
        <h3>Als u vragen heeft over onze services of een eventuele klacht dan kunt u altijd terecht bij onze helpdesk/contact pagina's.</h3>
        </div>
            <img src="afbeeldingen/villa-contact.jpeg" >
      </div>
</div>

      
<div class="footer">
    <div class="linkbox1">
        <a href="#">Mobile app</a>
        <a href="#">Community</a>
        <a href="#">Company</a>
    </div>
    <div class="logo">
        <img src="afbeeldingen/Logo.png" alt="logo">
    </div>
    <div class="linkbox2">
        <a href="#">Help desk</a>
        <a href="#">Blog</a>
        <a href="#">Recources</a>
    </div>
</div>
</div>

<hr/>
        <div class="socials"> 
            <a href="https://nl.linkedin.com/school/grafischlyceumrotterdam/" target="_blank"><img src="afbeeldingen/Linked.png" style="width:50px;  " ></a>
            <a href="https://www.facebook.com/GrafischLyceumRotterdam/?locale=nl_NL" target="_blank"><img src="afbeeldingen/facebook.png" style="width:50px;  " ></a>
            <a href="https://www.instagram.com/grafisch_lyceum_rotterdam/?hl=en" target="_blank"><img src="afbeeldingen/insta.png" style="width:50px;  " ></a>
            <a href="https://twitter.com/glr_tweets?lang=en" target="_blank"><img src="afbeeldingen/twitter.png" style="width:50px;  " ></a>
        </div>
        <div class="copyright">
            <p>© Photo.Inc. 2019. We love our users!</p>
        </div>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"> </script>

 <!-- Initialize Swiper -->
 <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      rewind: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    var swiper3 = new Swiper(".mySwiper3", {
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

</body>

</html>