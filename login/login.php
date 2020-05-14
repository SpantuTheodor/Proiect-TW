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
$username = '';
$password = '';
if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $cerere = DB::get_connnection()->prepare($sql);

    $cerere->execute();
    $row = $cerere->fetch();

    if ($cerere->rowCount() == 1) {
        header("Location: profileDemo.html");
    } else {
        echo "Nu merge";
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
    <link rel="stylesheet" type="text/css" href="../css/login/login.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login to FORG</title>
</head>

<body>
    <header class="nav-bar">
        <nav>
            <a id="a1" href="#"><img class="nav-icon" src="../profile/assets/icons/home.png" alt="home-icon">HOME</a>
            <a id="a2" href="#"><img class="nav-icon" src="../profile/assets/icons/trending.png" alt="trending-icon">TRENDING</a>
            <a id="a3" href="#"><img class="nav-icon" src="../profile/assets/icons/about.png" alt="about-icon">ABOUT</a>
            <a id="a4" href="#">SIGN UP</a>
        </nav>
    </header>
    <div class="container">
        <section>
            <div class="main-content main-content-login">
                <h2>Please enter email and password</h2>
                <form id="main-form" action="" method="POST">
                    <label for="email">Email adress:</label><br>
                    <input class="required" type="text" id="username" name="username" placeholder="Enter your username..." required><br><br>

                    <label for="password">Password:</label><br>
                    <input class="required" type="password" id="password" name="password" placeholder="Enter your password..." required><br><br>

                    <a id="change_password" href="#">Forgot/Change password?</a><br>
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