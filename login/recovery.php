<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../ContactUs/vendor/autoload.php';

class DB
{
    private static $db = NULL;
    public static function get_connnection()
    {
        if (is_null(self::$db)) {
            self::$db = new PDO('mysql:host=localhost;dbname=forg_database', 'root', '');
        }
        return self::$db;
    }
}

function generareNewPassword() {
    $encoding = '*&^%$#@!?.,-+)([]:{}0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    $length = strlen($encoding);
    for ($i = 0; $i < 32; $i++) {
        $password .= $encoding[rand(0, $length - 1)];
    }
    return $password;
}

function getUserName($email) {
    $sql = "SELECT username FROM users WHERE email=:mail";
    $cerere = DB::get_connnection()->prepare($sql);
    $cerere->execute([
        'mail' => $email
    ]);
    $row = $cerere->fetch();
    if ($cerere->rowCount() == 1) {
        // exista emailul, cat si userul, deci ii trimit un email cu noua parola
        return $row["username"];
    } else {
        echo "Nu avem utilizator cu astfel de email";
    }
    return NULL;
}

function updateUserPassword($email, $password) {
    $sql = "UPDATE users SET password = :pass WHERE email = :mail";
    $cerere = DB::get_connnection()->prepare($sql);
    $cerere->execute([
        'pass' => $password,
        'mail' => $email
    ]);
    $cerere->fetch();
}

function sendMailWithNewPassword($email, $username, $password) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'ssl://smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'suportforg69@gmail.com';
        $mail->Password   = 'nuitispunemcipi';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 465;

        $mail->setFrom('suportforg69@gmail.com', '[The Forg]');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = '[Suport Forg]';
        $mail->Body    = "<h1>".$username."</h1><h2>Here is your new password: </h2><h2>".$password."</h2>";
        $mail->AltBody = 'A aparut o problema!';

        $mail->send();
        $sent = 1;

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


if (isset($_POST["email"])) {
    // echo $_POST["email"];
    // trimit un email catre adresa selectata cu noua parola
    $username = getUserName($_POST["email"]);
    $password = generareNewPassword();
    if ($username != NULL) {
        updateUserPassword($_POST["email"], $password);
        sendMailWithNewPassword($_POST["email"], $username, $password);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account recovery</title>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/login/login.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>
<body>
    <header class="nav-bar">
        <nav>
            <a id="a1" href="#"><img class="nav-icon" src="../profile/assets/icons/home.png" alt="home-icon">HOME</a>
            <a id="a2" href="#"><img class="nav-icon" src="../profile/assets/icons/trending.png" alt="trending-icon">TRENDING</a>
            <a id="a3" href="#"><img class="nav-icon" src="../profile/assets/icons/about.png" alt="about-icon">ABOUT</a>
            <a id="a4" href="#">LOGIN</a>
        </nav>
    </header>
    <div class="container">
        <section>
            <div id="recovery_box" class="main-content main-content-login">
                <h2>Please enter your username and password</h2>
                <form id="main-form" action="" method="POST">
                    <label for="email">Email:</label><br>
                    <input class="required" type="email" id="email" name="email" placeholder="Enter your username..." required><br><br>
                    <input id="submit-input" type="submit" name="submit">
                </form>
            </div>
        </section>
    </div>
    <div class="spacer"></div>
    <!-- FOOTER START -->
    <footer class="footer">
        <div class="contain">
            <div class="col">
                <h1>Company</h1>
            </div>
            <div class="col">
                <h1>Products</h1>
            </div>

            <div class="col">
                <h1>Accounts</h1>
            </div>

            <div class="col">
                <h1>Resources</h1>
                <ul>
                    <li>Webmail</li>
                    <li>Redeem code</li>
                    <li>WHOIS lookup</li>
                    <li>Site map</li>
                    <li>Web templates</li>
                    <li>Email templates</li>
                </ul>
            </div>

            <div class="col">
                <h1>Support</h1>
                <ul>
                    <li>Contact us</li>
                    <li>Web chat</li>
                    <li>Open ticket</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </footer>
</body>
</html>