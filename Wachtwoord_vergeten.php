<?php
// Start session
session_start();

// Connect to SQLite3 database
$db = new SQLite3('Database.db');

// Check if form has been submitted
if(isset($_POST['submit'])) {

    // Get form inputs
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form inputs
    if(empty($username) || empty($new_password) || empty($confirm_password)) {
        $_SESSION['error'] = "Please fill in all fields.";
    } elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/', $new_password)) {
        $_SESSION['error'] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    } elseif($new_password != $confirm_password) {
        $_SESSION['error'] = "New password and confirm password do not match.";
    } else {
        // Get user's hashed password from database
        $stmt = $db->prepare("SELECT id, password FROM login WHERE username = :username");
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $result = $stmt->execute();
        $row = $result->fetchArray(SQLITE3_ASSOC);
        $stored_password = $row['password'];

        // Verify user's hashed password
        if(!$row) {
            $_SESSION['error'] = "Username not found.";
        } elseif(!password_verify($new_password, $stored_password)) {
            // Hash new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update user's password in database
            $stmt = $db->prepare("UPDATE login SET password = :password WHERE id = :id");
            $stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);
            $stmt->bindValue(':id', $row['id'], SQLITE3_INTEGER);
            $result = $stmt->execute();

            // Notify user that password has been changed
            $_SESSION['success'] = "Password has been changed successfully.";
        } else {
            $_SESSION['error'] = "New password cannot be the same as old password.";
        }
    }
}

// Display form and error/success messages
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Wachtwoord vergeten</title>
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
            height: 530px;
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
            height: 530px;
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
            height: 530px;
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
    </style>
</head>
<body>

    <div class="box">
        <form action="" method="post">
            <h2>Wachtwoord veranderen</h2>
            <div class="inputBox">
                <input type="text" name="username" required>
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="new_password" required>
                <span>Nieuw Wachtwoord</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="confirm_password" required>
                <span>confirm Wachtwoord</span>
                <i></i>
            </div>
            <div class="links">
                <a href="Login.php">Back to Login</a>
            </div>
            <div class="error">
                <?= $error ?>
            </div>
            <input type="submit" name="submit" value="Change Password">
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

<?php
if(isset($_SESSION['error'])) {
    echo "<p class='error'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
if(isset($_SESSION['success'])) {
    echo "<p class='success'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>