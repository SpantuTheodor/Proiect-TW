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

$sql = "SELECT first_name,last_name,username,email,phone_number,cale_imagine FROM users WHERE id = :index";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'index' => "$id"
]);
$data = $cerere->fetch();
$image_path = '';
if(!empty($data)){
    $nume = $data["first_name"];
    $prenume = $data["last_name"];
    $username = $data["username"];
    $email = $data["email"];
    $nr_telefon = $data["phone_number"];
    $image_path = $data["cale_imagine"];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Demo</title>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/profile/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../logout.js"></script>
</head>
<body>
    <div id="app_content" class="container">
        <header class="nav-bar">
            <nav>
                <img id="menu" class="nav-icon" src="assets/icons/menu.png" alt="home-icon">
                <p id="greeting">Forg</p>
                <img id="login_menu_icon" src="assets/icons/down.png" alt="drop-down menu">
            </nav>
            <div id="login_menu">
                <a href="editProfile.php">Modificare profil</a>
                <a href="#" onclick="logout()">Deconectare</a>
            </div>
            <div id="main_menu">
                <img id="close" src="assets/icons/close.png" alt="close menu">
                <a href="../index.php">Acasa</a>
                <a href="../Categories/forg.php">Catalog</a>
                <a href="../ContactUs/contactUs.php">Contact</a>
            </div>
        </header>
        <div id="profile_section">
            <div id="picture_section">
                <?php echo "<img id='profile_picture' src='$image_path' alt='default avatar image'>" ?>
            </div>
            <div id="profile_content">
                <section id="about_user_section">
                    <?php echo '<h3><img src="assets/icons/user_icon.png" alt="user icon">'.$nume.' '.$prenume.'</h3>'?>
                    <?php echo '<h3><img src="assets/icons/user_icon.png" alt="user icon">'.$username.'</h3>'?>
                    <?php echo '<h3><img src="assets/icons/email_icon.png" alt="email icon">'.$email.'</h3>'?>
                    <?php echo '<h3><img src="assets/icons/location_icon.png" alt="location icon">'.$nr_telefon.'</h3>'?>
                </section>
                
                <section id="about_user_shopping_list">
                    <h3><img id="list_icon" class="favorite_icon" src="assets/icons/shopping_list_icon.png" alt="shopping list icon">Your shopping lists <img class="goto_icon" id="goto_food" src="assets/icons/goto_icon.png" alt="goto_icon"></h3>
                </section>
                <section id="about_user_favorite_food">
                    <h3><img id="food_icon" class="favorite_icon" src="assets/icons/favorite_food_icon.png" alt="favorite food icon">Your favorite food <img class="goto_icon" id="goto_food" src="assets/icons/goto_icon.png" alt="goto_icon"></h3>
                </section>
                <section id="about_user_favorite_restaurants">
                    <h3><img id="restaurant_icon" class="favorite_icon" src="assets/icons/restaurant_icon.png" alt="favorite restaurant icon"> Your favorite restaurants <img class="goto_icon" id="goto_restaurant" src="assets/icons/goto_icon.png" alt="goto_icon"></h3>
                </section>
                <section id="about_user_statistics">
                    <h3><img id="statistics_icon" class="favorite_icon" src="assets/icons/chart.png" alt="statistics icon"> Your statstics <img class="goto_icon" id="goto_statistics" src="assets/icons/goto_icon.png" alt="goto_icon"></h3>
                </section>
            </div>
        </div>
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
    </div>
    <script src="../js/menu_logic.js"></script>
    <script src="../js/profileDemo.js"></script>
</body>
</html>