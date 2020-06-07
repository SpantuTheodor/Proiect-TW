<?php

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

$firstname = '';
$lastname ='';
$id =0;
$email ='';
$password = '';
$username ='';

if (!empty($_POST)) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phone-nr'];
    $address = $_POST['address'];
    $username = $_POST['uname'];
    $eroare = 0; 

    $sql = "SELECT phone_number FROM users WHERE phone_number = :phonenumber";
    $cerere = DB::get_connnection()->prepare($sql);
    $cerere->execute([
        'phonenumber' => $phonenumber
    ]);

    if($phonenumber != 0) {
        if ($cerere->rowCount() >= 1) {
            echo '<div class="warning">Numarul de telefon este deja folosit!</div>';
            $eroare = 1;
        }
    }

    $sql = "SELECT email FROM users WHERE email = :email";
    $cerere = DB::get_connnection()->prepare($sql);
    $cerere->execute([
        'email' => $email
    ]);
    if ($cerere->rowCount() >= 1) {
         echo '<div class="warning">Adresa de Email este deja folosita!</div>';
         $eroare = 1;
    }
    
    $sql = "SELECT username FROM users WHERE username = :uname";
    $cerere = DB::get_connnection()->prepare($sql);
    $cerere->execute([
        'uname' => $username
    ]);
    if ($cerere->rowCount() >= 1) {
         echo '<div class="warning">Username-ul este deja folosit!</div>';
         $eroare = 1;
    }

    if($eroare != 1) {
        $sql = "INSERT INTO users (first_name,last_name,username,password,email,phone_number ) VALUES( :firstname , :lastname , :uname , :pass, :mail, :phonenumber )";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'firstname'    => $firstname,
            'lastname'     => $lastname,
            'uname'        => $username,
            'pass'         => $password,
            'mail'         => $email,
            'phonenumber'  => $phonenumber
        ]);
    }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/signup/signup.css">

    <link href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Create your Forg account</title>
</head>
<body>
    <div class="container">
        <header class="nav-bar">
            <nav>
                <a id="a1" href="../index.php"><img class="nav-icon" src="../profile/assets/icons/home.png" alt="home-icon">HOME</a>
                <a id="a2" href="../Categories/forg.php"><img class="nav-icon" src="../profile/assets/icons/trending.png" alt="trending-icon">CATEGORIES</a>
                <a id="a3" href="../ContactUs/contactUs.php"><img class="nav-icon" src="../profile/assets/icons/about.png" alt="about-icon">ABOUT</a>
                <a id="a4" href="../login/login.php">LOGIN</a>
            </nav>
        </header>
        <section id="sign_up_section">
            <div class="main-content">
                <h2>Introduceti urmatoarele informatii</h2>
                <form id="main-form" method="POST">
                    <label for="fname">First name: </label><br>
                    <input class="required" type="text" id="fname" name="fname" placeholder="Enter your first name..." required><br><br>

                    <label for="lname">Last name:</label><br>
                    <input class="required" type="text" id="lname" name="lname" placeholder="Enter your last name..." required><br><br>

                    <label for="uname">Username:</label><br>
                    <input class="required" type="text" id="uname" name="uname" placeholder="Enter your username..." required><br><br>

                    <label for="email">Email adress:</label><br>
                    <input class="required" type="email" id="email" name="email" placeholder="Enter your email..." required><br><br>

                    <label for="password">Password:</label><br>
                    <input class="required" type="password" id="password" name="password" placeholder="Enter your password..." required><br><br>

                    <label for="phone-nr">Phone number:</label>
                    <input class="required" type="text" id="phone-nr" name="phone-nr" placeholder="Enter your phone number..." ><br><br>

                    <label for="address">Adress:</label>
                    <input class="required" type="text" id="address" name="address" placeholder="Enter your address..." ><br><br>
                    <input id="submit-input" type="submit" name="Create account">
                </form>
            </div>
        </section>
        <div class="spacer"></div>
        <!-- FOOTER START -->
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>&copy; FORG - Made &amp; Designed By Rogoza Calin Andrei, Spantu Theodor Ioan, Ursulean Ciprian</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
</body>
</html>