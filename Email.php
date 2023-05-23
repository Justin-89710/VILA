<?php
session_start();
$db = new SQLite3('Database.db');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "vilatekoop@gmail.com";
    $inputMessage = $_POST['vraag'];
    $inputEmail = $_POST['email'];
    $inputName = $_POST['naam'];
    $inputAdres = $_POST['adres'];
    $inputTelefoonnummer = $_POST['telefoonnummer'];
    $subject = "Form Submitted";
    $message = "A form has been filled in on your website. \r\n\n The message is: {$inputMessage} \r\n\n The email address is: {$inputEmail} \r\n\n  The name is: {$inputName} \r\n\n The adres is: {$inputAdres} \r\n\n The telefoonnummer is: {$inputTelefoonnummer}";
    $headers = "From: " . $_POST['email'];
    if (!preg_match("/^[a-zA-z]*$/",$inputName))
    {
        $php_errormsg = "Invalid name!";
        include 'email.view.error.php';
    }
    else if (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL))
    {
        $php_errormsg = "Invalid email!";
        include 'email.view.error.php';
    }
    else if (empty($inputMessage))
    {
        $php_errormsg = "You didnt put in a message pleas try again!";
        include 'email.view.error.php';
    }
    else if (empty($inputEmail))
    {
        $php_errormsg = "You didnt put in a email pleas try again!";
        include 'email.view.error.php';
    }
    else if (empty($inputName))
    {
        $php_errormsg = "You didnt put in a name pleas try again!";
        include 'email.view.error.php';
    }elseif (empty($inputAdres))
    {
        $php_errormsg = "You didnt put in a adres pleas try again!";
        include 'email.view.error.php';
    }elseif (empty($inputTelefoonnummer))
    {
        $php_errormsg = "You didnt put in a telefoonnummer pleas try again!";
        include 'email.view.error.php';
    }
    else {
        $emailVerzonde = mail($to, $subject, $message, $headers);
        if ($emailVerzonde) {
            include_once 'email.view.success.php';
// create email headers

            $headers = 'From: '.$inputEmail."\r\n".
                "Reply-To: ".$inputEmail."\r\n" .
                "X-Mailer: PHP/" . phpversion();

            /* Prepare autoresponder subject */

            $respond_subject = "Dankje voor het contact opnemen met ons!";

            /* Prepare autoresponder message */

            $respond_message = "Dankje voor het contact opnemen met Villa te koop!

            Wij zullen zo snel mogelijk contact met u opnemen.

            Met vriendelijke groet,

            Team Villa te koop

            GLR
            ";

            mail($inputEmail, $respond_subject, $respond_message);


            mail($to, $inputName, $inputMessage, $headers);
        } else {
            include 'email.view.error.php';
            $php_errormsg = "Something went wrong pleas call us at 06 123456789!";
        }
    }

}

//sla inputvelden op in database
if (isset($_POST['submit'])) {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $vraag = $_POST['vraag'];
    $stmt = $db->prepare("INSERT INTO Contact (Naam, Email, Adres, Telefoonnummer, Vraag) VALUES (:naam, :email, :adres, :telefoonnummer, :vraag)");
    $stmt->bindValue(':naam', $naam, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':adres', $adres, SQLITE3_TEXT);
    $stmt->bindValue(':telefoonnummer', $telefoonnummer, SQLITE3_TEXT);
    $stmt->bindValue(':vraag', $vraag, SQLITE3_TEXT);
    $result = $stmt->execute();
    $count = $result->fetchArray()[0];
}
?>