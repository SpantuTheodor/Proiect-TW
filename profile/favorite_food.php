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

$id = $_COOKIE['id'];

$sql = "SELECT m.nume,m.imagine,m.categorie FROM mancare_preferata p JOIN mancare m ON p.id_mancare = m.id WHERE p.id_utilizator = :index";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'index' => "$id"
]);
$data = $cerere->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite food</title>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/favorite_food/favorite_food.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../logout.js"></script>
</head>
<body>
    <div id="app_content" class="container">
        <header class="nav-bar">
            <?php $us = $_COOKIE['user']; echo "<h3 id='greeting'> $us's favorite foods</h3>";?>
            <a id="logout" onclick="logout()">LOGOUT</a>
        </header>
        <div class="main_content">
            <div class="food_wrapper">
            <?php
                foreach($data as $mancare){
                    echo "<div class='favorite_food'>
                    <img class='remove_favorite_icon' src='assets/icons/favorite_icon.png' alt='remove from favorite icon'>
                    <img class='food_pic' src='../Categories/$mancare[1]' alt='food pic'>
                    <p class='food_title'>$mancare[0]</p>
                    <p class='food_basic_info'>$mancare[2]</p>
                    </div>";
                }
            ?>    
            </div>
        </div>
        <div class="spacer"></div>
        <!-- FOOTER START -->
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>Company</h1>
                    <ul>
                        <li>About</li>
                        <li>Mission</li>
                        <li>Services</li>
                        <li>Social</li>
                        <li>Get in touch</li>
                    </ul>
                </div>
                <div class="col">
                    <h1>Products</h1>
                    <ul>
                        <li>About</li>
                        <li>Mission</li>
                        <li>Services</li>
                        <li>Social</li>
                        <li>Get in touch</li>
                    </ul>
                </div>
                <div class="col">
                    <h1>Accounts</h1>
                    <ul>
                        <li>About</li>
                        <li>Mission</li>
                        <li>Services</li>
                        <li>Social</li>
                        <li>Get in touch</li>
                    </ul>
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
        </div>
      </div>
    </div>
    <script src="../js/favorite_foods.js" async></script>
</body>
</html>