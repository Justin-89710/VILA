<?php
$db = new SQLite3('Database.db');

if ($db) {
    echo "Database connection successful";
} else {
    echo "Database connection failed";
}

function register($username, $password){
    global $db;
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();
}

function login($username, $password){
    global $db;
    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $user = $stmt->execute();
    return $user;
}

function reset_password($username, $new_password){
    global $db;
    $query = "UPDATE users SET password=? WHERE username=?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $new_password);
    $stmt->bindParam(2, $username);
    $stmt->execute();
}
?>