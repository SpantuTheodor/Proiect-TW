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
                <a href="#">Vizualizare profil</a>
                <a href="#">Modificare profil</a>
                <a href="#" onclick="logout()">Deconectare</a>
            </div>
            <div id="main_menu">
                <img id="close" src="assets/icons/close.png" alt="close menu">
                <a href="#">Acasa</a>
                <a href="#">Catalog</a>
                <a href="#">Lista preferate</a>
                <a href="#">Contact</a>
            </div>
        </header>
        <div id="profile_section">
            <div id="picture_section">
                <img id="profile_picture" src="assets/default-avatar.png" alt="default avatar image">
            </div>
            <div id="profile_content">
                <section id="about_user_section">
                    <h3><img src="assets/icons/user_icon.png" alt="user icon">Ciprian Ursulean</h3>
                    <h3><img src="assets/icons/email_icon.png" alt="email icon">ciprian.ursulean5@gmail.com</h3>
                    <h3><img src="assets/icons/location_icon.png" alt="location icon">Romania</h3>
                </section>
                <section id="about_user_biography">
                    <h3>Bibliography</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </section>
                <section id="about_user_favorite_categories">
                    <h3>Favorite food categories</h3>
                    <div class="items">
                        <a class="food_category" href="#">Grains, Beans and Nuts</a><br>
                        <a class="food_category" href="#">Fruits</a>
                        <a class="food_category" href="#">Vegetables</a><br>
                        <a class="food_category" href="#">Meat and Poultry</a>
                        <a class="food_category" href="#">Fish and Seafood</a>
                        <a class="food_category" href="#">Dairy Foods</a>
                    </div>
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
    <script src="../js/menu_logic.js"></script>
    <script src="../js/profileDemo.js"></script>
</body>
</html>