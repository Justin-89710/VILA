<?php
session_start();
$db = new SQLite3('Database.db');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <style>
        .popup {
            width: 30%;
            top: 0;
            left: 0;
            display: none;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .popup-content {
            background-color: transparent;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .progress-container {
            width: 100%;
            height: 10px;
            background-color: #f1f1f1;
            margin-top: 10px;
        }

        .progress-bar {
            height: 100%;
            background-color: #52A0FC;
            width: 0%;
        }
    </style>
</head>
<body>
<?php
if (isset($_SESSION['username'])) {
    // Display popup
    ?>
    <div class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <p>Hello, <span id="username"><?php echo $_SESSION['username']; ?></span></p>
            <div class="progress-container">
                <div class="progress-bar" id="myBar"></div>
            </div>
        </div>
    </div>
<?php
}
?>
    <a href="vila.php?id=1">huis1</a>
    <a href="vila.php?id=2">huis2</a>
    <a href="vila.php?id=3">huis3</a>

    <script>
        var popup = document.querySelector('.popup');

        var closeBtn = document.querySelector('.close');

        window.onload = function() {
            popup.style.display = "block";
            setTimeout(function() {
                popup.style.display = "none";
            }, 2000);
        }

        closeBtn.onclick = function() {
            popup.style.display = "none";
        }

        var progressBar = document.getElementById("myBar");
        var width = 0;
        var interval = setInterval(frame, 10);
        var duration = 2000;

        function frame() {
            if (width >= 100) {
                clearInterval(interval);
            } else {
                width += 100 / (duration / 10);
                progressBar.style.width = width + '%';
            }
        }
    </script>
</body>
</html>