<?php
session_start();
$db = new SQLite3('Database.db');
$id = 0;
$title = "";
$adres = "";
$beschijving = "";
if (isset($_GET["id"])){
    $id = $_GET["id"];
    $result = $db->query("SELECT * FROM huis WHERE id='$id'");
    if (!$result) {
        die("Query failed");
    }
    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $title = $row['title'];
        $adres = $row['adres'];
        $beschijving = $row['beschijving'];
     }

}
if (isset($_POST['bieden'])){
    $bieding = $_POST['bieding'];
    $username = $_SESSION['username'];

    $result = $db->query("SELECT * FROM bieding1 WHERE bod='$bieding' AND user='$username' AND huisid='$id'");

    if ($_SESSION['username'] == "") {
        $error = "Je moet ingelogd zijn om te bieden";
    } elseif (empty($bieding)) {
        $error = "beiding is leeg";
    } elseif ($bieding < 1000000) {
        $error = "Je bod moet minstens 1 miljoen zijn";
    } elseif (!is_numeric($bieding)) {
        $error = "Je bod moet een nummer zijn";
    } elseif ($bieding < 1000000) {
        $error = "Je bod moet minstens 1 miljoen zijn";
    } elseif ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $error = "Je bod moet hoger zijn dan de vorige";
    }
    else {
        $query = "INSERT INTO bieding1 (bod, user, huisid) VALUES (:bieding, :username, :huisid)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $bieding);
        $stmt->bindParam(2, $username);
        $stmt->bindParam(3, $id);
        $stmt->execute();
        $goed = "Je bod is geplaats";
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
    <title>Vila</title>
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
<div class="maindiv">
    <div class="overlayoverlay">
    <div class="overlay">
        <div class="overlay-content">Klik op de foto om te vergroten</div>
    </div>
    </div>
    <div class="image-container">
<div class="main_img">
    <img data-enlargable width="100"  src="afbeeldingen/huis<?php echo $id?>_1.jpg" alt="main_img">
</div>
<div class="extra_img">
    <div class="top">
    <img data-enlargable width="100"  src="afbeeldingen/huis<?php echo $id?>_2.jpg" alt="main_img">
    <img data-enlargable width="100"  src="afbeeldingen/huis<?php echo $id?>_3.jpg" alt="main_img">
    </div>
    <img data-enlargable width="100"  src="afbeeldingen/huis<?php echo $id?>_4.jpg" alt="main_img">
    <img data-enlargable width="100"  src="afbeeldingen/huis<?php echo $id?>_5.jpg" alt="main_img">
</div>
    </div>
</div>

<div class="leeg">
</div>

<div class="title">
    <h1><?php echo $title?></h1>
</div>

<div class="adres">
    <h1 class="adh1">Adres</h1>
    <div class="adres_text">
        <?php
        echo '<div>';
        echo '<p class="ad">' . $adres . '</p>';
        echo '</div>';
        ?>
    </div>
</div>


<div class="beschrijving">
    <div class="beschrijving_text">
        <h1>Beschrijving</h1>
        <?php
        echo '<div>';
        echo '<p class="bp">' . $beschijving . '</p>';
        echo '</div>';
        ?>
    </div>
</div>



<div class="bieden">
    <?php
    if($_SESSION['username'] == ""){
        echo '<a href="Login.php"><button class="button">Log eerst in om te bieden!</button></a>';
    } else {
        echo '<form action="" method="post">';
        echo '<input type="hidden" name="id" value="'.$id.'">';
        echo '<input type="number" id="bieding" name="bieding" min="0" required>';
        echo '<input type="submit" name="bieden" value="Bieden">';
        echo '<p class="error" style="color: red">' . $error . '</p>';
        echo '<p class="goed" style="color: green">' . $goed . '</p>';
        echo '</form>';
    }
    ?>
</div>
<div class="bieding">
    <h1>recente biedingen</h1>
    <div class="biedingen">
        <?php
        $result = $db->query("SELECT * FROM bieding1 WHERE huisid='$id'");
        while ($row = $result->fetchArray()) {
            echo '<div id="bieding">';
            echo '<p>' . $row['bod'] . ' ' . $row['user'] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="locatie">
    <div class="locatie_img">
        <?php
        if ($id == 1){
            echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2455.035241403447!2d4.347860912521998!3d52.024455672682436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b5d78e1486a5%3A0x5afaaaa92b67dfb5!2sPauwhof%2015%2C%202289%20BH%20Rijswijk!5e0!3m2!1snl!2snl!4v1682768035083!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        } elseif ($id == 2){
            echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.3199555667584!2d4.570715357746652!3d52.364618175807415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5eeb619d1b993%3A0xf56097af4639ed6!2sDuindoornhof%205%2C%202116%20TZ%20Bentveld!5e0!3m2!1snl!2snl!4v1682768236795!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        } elseif ($id == 3){
            echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2448.56275300813!2d4.392796057673568!3d52.142274792067326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b87a95cc3dbf%3A0xd98e68a1e95e7523!2sLange%20Kerkdam%205%2C%202242%20BN%20Wassenaar!5e0!3m2!1snl!2snl!4v1682768343389!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        }
        ?>
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

<script>
    document.querySelectorAll('img[data-enlargable]').forEach(function(img) {
        img.classList.add('img-enlargable');
        img.addEventListener('click', function() {
            var src = this.getAttribute('src');
            var div = document.createElement('div');
            div.style.background = 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center';
            div.style.backgroundSize = 'contain';
            div.style.width = '100%';
            div.style.height = '100%';
            div.style.position = 'fixed';
            div.style.zIndex = '10000';
            div.style.top = '0';
            div.style.left = '0';
            div.style.cursor = 'zoom-out';
            div.addEventListener('click', function() {
                this.remove();
            });
            document.body.appendChild(div);
        });
    });

    const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (isDarkMode) {
            document.body.classList.add('dark-mode');
        document.querySelector('.nav').classList.add('dark-mode');
        document.querySelector('.footer').classList.add('dark-mode');
        document.querySelector('.linkbox1 a').classList.add('dark-mode');
        document.querySelector('.linkbox2 a').classList.add('dark-mode');
        document.querySelector('.error').classList.add('dark-mode');
    }
</script>
</body>
</html>