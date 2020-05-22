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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Forg Godfathers</title>
    <link rel="stylesheet" type="text/css" href="../css/administration/administration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div class="container">
        <header>
            <img id="godfather_icon" src="assets/godfather_24px.png" alt="Gothfather icon">
            <h3>The Forg Godfathers</h3>
        </header>
        <div class="main_content">
            <div class="options">
                <button id="create_user">Create user</button>
                <button id="delete_user">Delete user</button>
                <button id="create_food">Submit new food</button>
                <button id="delete_food">Delete food</button>
            </div>
            <div class="options_exec_area">
                <div id="create_user_area">
                    <form id="create_user_form" class="main_form" method="POST">
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
                <div id="delete_user_area">
                    <form id="delete_user_form" class="main_form" method="POST">
                        <label for="uname_to_delete">Username:</label><br>
                        <input class="required" type="text" id="uname_to_delete" name="uname_to_delete" placeholder="Enter your username..." required><br><br>

                        <label for="email_to_delete">Email adress:</label><br>
                        <input class="required" type="email" id="email_to_delete" name="email_to_delete" placeholder="Enter your email..." required><br><br>

                        <input id="submit-input" class="delete_input" type="submit" name="Delete account">
                    </form>
                </div>
                <div id="create_food_area">
                    <form id="create_food_form" class="main_form" method="POST">
                        <label for="food_name">Food name: </label><br>
                        <input class="required" type="text" id="food_name" name="food_name" placeholder="Enter food name..." required><br><br>

                        <label for="categorie">Category:</label><br>
                        <input class="required" type="text" id="categorie" name="categorie" placeholder="Enter food category..." required><br><br>

                        <label for="price">Price:</label><br>
                        <input class="required" type="text" id="price" name="price" placeholder="Enter food price..." required><br><br>

                        <label id="image_input_label" for="image">Food image:</label><br>
                        <input class="required" type="file" id="image_input" name="image" placeholder="Enter food image..." accept="image/*" required><br><br>
                        
                        <label for="isvegetarian">Vegetarian food:</label>
                        <input class="required" type="checkbox" id="isvegetarian" name="isvegetarian" placeholder="Check if food is vedetarian..." ><br><br><br>

                        <label for="perisability">Perisability:</label>
                        <input class="required" type="number" id="perisability" name="perisability" placeholder="Enter perisability..." ><br><br>
                        
                        <label for="perisability">Valability:</label>
                        <input class="required" type="number" id="valability" name="valability" placeholder="Enter valability..." ><br><br>
                        
                        <input id="submit-input" type="submit" name="Create Food">
                    </form>
                </div>
                <div id="delete_food_area">
                    <form id="delete_food_form" class="main_form" method="POST">
                        <label for="food_name_to_delete">Food name: </label><br>
                        <input class="required" type="text" id="food_name_to_delete" name="food_name_to_delete" placeholder="Enter food name..." required><br><br>

                        <label for="categorie">Category:</label><br>
                        <input class="required" type="text" id="categorie_to_delete" name="categorie_to_delete" placeholder="Enter food category..." required><br><br>

                        <label for="price">Price:</label><br>
                        <input class="required" type="text" id="price_to_delete" name="price_to_delete" placeholder="Enter food price..." required><br><br>
                        <input id="submit-input" class="delete_input" type="submit" name="Delete food">
                    </form>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
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
    <script src="../js/administration.js"></script>
</body>
</html>