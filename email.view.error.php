<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="afbeeldingen/Logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .dark-mode{
            background-color: #1a1a1a;
            color: #fff;
        }
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
    </style>
    <title>Error</title>
</head>
<body>
<h1>Error!</h1>
<br>
<p> <?= $php_errormsg ?> </p>
<br>
<p><a href="home.php">Go back to the home page! </a></p>
<br><br>
<img src="https://www.freeiconspng.com/thumbs/error-icon/error-icon-4.png" alt="Success!">

<script>
    const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (isDarkMode) {
        document.body.classList.add('dark-mode');
    }

</script>
</body>
</html>