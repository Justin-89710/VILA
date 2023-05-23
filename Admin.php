<?php
session_start();
$db = new SQLite3('Database.db');

//check if user is admin and if not send back to home.php and if he is let him in the admin page.
if ($_SESSION['username'] != 'Admin') {
    header('Location: home.php');
    exit;
}

//make it so the you can delete other users and bids on the site.
if (isset($_POST['delete'])) {
    $username = $_POST['username'];
    $stmt = $db->prepare("DELETE FROM login WHERE username = :username");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $count = $result->fetchArray()[0];
}
if (isset($_POST['deletebid'])) {
    //make it so the user and the bid have to be the same as in the database.
    $user = $_POST['user'];
    $bid = $_POST['bod'];
    $stmt = $db->prepare("DELETE FROM bieding1 WHERE user = :user AND bod = :bod");
    $stmt->bindValue(':user', $user, SQLITE3_TEXT);
    $stmt->bindValue(':bod', $bid, SQLITE3_TEXT);
    $result = $stmt->execute();
    $count = $result->fetchArray()[0];
}
if (isset($_POST['updatebid'])) {
    //make it so the user and the bid have to be the same as in the database.
    $user = $_POST['user'];
    $bid = $_POST['bod'];
    $newbid = $_POST['newbod'];
    $stmt = $db->prepare("UPDATE bieding1 SET bod = :newbid WHERE user = :user AND bod = :bod");
    $stmt->bindValue(':user', $user, SQLITE3_TEXT);
    $stmt->bindValue(':bod', $bid, SQLITE3_TEXT);
    $stmt->bindValue(':newbid', $newbid, SQLITE3_TEXT);
    $result = $stmt->execute();
    $count = $result->fetchArray()[0];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Admin</h1>
            <h1>Users</h1>
            <?php
            $result = $db->query("SELECT * FROM login");
            if (!$result) {
                die("Query failed");
            }
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo "<p>" . $row['username'] . "</p>";
            }
            ?>
            <form action="" method="post">
                <input type="text" name="username" value="" placeholder="Username">
                <input type="submit" name="delete" value="Delete user">
            </form>
            <h1>Biedingen</h1>
            <?php
            $result = $db->query("SELECT * FROM bieding1");
            if (!$result) {
                die("Query failed");
            }
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo "<p>" . $row['user'] . " heeft " . $row['bod'] . " geboden op " . $row['huisid'] . "</p>";
            }
            ?>
            <form action="" method="post">
                <input type="text" name="user" value="" placeholder="user">
                <input type="text" name="bod" value="" placeholder="bid">
                <input type="submit" name="deletebid" value="Delete bids">
            </form>
            <H1>Update Bid</H1>
            <?php
            $result = $db->query("SELECT * FROM bieding1");
            if (!$result) {
                die("Query failed");
            }
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo "<p>" . $row['user'] . " heeft " . $row['bod'] . " geboden op " . $row['huisid'] . "</p>";
            }

            ?>
            <form action="" method="post">
                <input type="text" name="user" value="" placeholder="user">
                <input type="number" name="bod" value="" placeholder="bid">
                <input type="number" name="newbod" value="" placeholder="new bid">
                <input type="submit" name="updatebid" value="Update bids">
            </form>
        </div>
    </div>
</div>

</body>
</html>