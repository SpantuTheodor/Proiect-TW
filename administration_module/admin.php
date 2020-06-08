<?php
    if (!isset($_COOKIE['user'])) {
        // nu sunt logat 
        header("Location: ../login/login.php");
    }

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
    
    function emailAlreadyExists($email) {
        // verific daca  mailul nu exista deja la alt user inregistrat
        $sql = "SELECT phone_number FROM users WHERE email = :mail";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'mail' => $email
        ]);
        // daca exista semnalez o eroare si returnez false
        return $cerere->rowCount() >= 1;
    }

    // function phoneNumberAlreadyExists($phoneNumber) {
    //     if ($phoneNumber == '') {
    //         return false;
    //     }
    //     // verific daca numarul de telefon nu exista deja la alt user inregistrat
    //     $sql = "SELECT phone_number FROM users WHERE phone_number = :phonenumber";
    //     $cerere = DB::get_connnection()->prepare($sql);
    //     $cerere->execute([
    //         'phonenumber' => $phoneNumber
    //     ]);
    //     // daca exista numarul de telefon semnalez o eroare si returnez fals
    //     if($phonenumber != '') {
    //         if ($cerere->rowCount() >= 1) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    function userNameAlreadyExists($username) {
        // verific daca username-ul nu exista deja la alt user inregistrat
        $sql = "SELECT username FROM users WHERE username = :uname";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'uname' => $username
        ]);
        return $cerere->rowCount() >= 1;
    }

    function insertUserInDatabase($firstName, $lastName, $username, $emailAddress, $password, $phoneNumber = '', $adress = '') {
        $sql = "INSERT INTO users (first_name, last_name, username, password, email, phone_number ) VALUES( :firstname , :lastname , :uname , :pass, :mail, :phonenumber )";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'firstname'    => $firstName,
            'lastname'     => $lastName,
            'uname'        => $username,
            'pass'         => $password,
            'mail'         => $emailAddress,
            'phonenumber'  => $phoneNumber
        ]);
    }

    function createUser($firstName, $lastName, $username, $emailAddress, $password, $phoneNumber = '', $adress = '') {        
        // $phoneNumberStatus = phoneNumberAlreadyExists($phoneNumber);
        $emailStatus       = emailAlreadyExists($emailAddress);
        $usernameStatus    = userNameAlreadyExists($username);
        if ($emailStatus == true) {
            echo '<script language="javascript">';
            echo 'alert("Email address already used!")';
            echo '</script>';
            return;
        }
        if ($usernameStatus == true) {
            echo '<script language="javascript">';
            echo 'alert("Username already used!")';
            echo '</script>';
            return;
        }
        // nu pot crea userul cu datele acestea pentru ca sunt asociate altor useri
        if ($phoneNumberStatus == true || $emailStatus == true || $usernameStatus == true) {
            return;
        }
        insertUserInDatabase($firstName, $lastName, $username, $emailAddress, $password, $phoneNumber, $adress);
    }

    function deleteUser($emailAddress, $username) {
        $emailStatus = emailAlreadyExists($emailAddress);
        if ($emailStatus == false) {
            echo '<script language="javascript">';
            echo 'alert("An account with this email does not exists!")';
            echo '</script>';
            return;
        }
        $usernameStatus = userNameAlreadyExists($username);
        if ($usernameStatus == false) {
            echo '<script language="javascript">';
            echo 'alert("An account with this username does not exists!")';
            echo '</script>';
            return;
        }

        $sql = "DELETE FROM users WHERE username = :uname AND email = :mail";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'uname'        => $username,
            'mail'         => $emailAddress,
        ]);
        echo '<script language="javascript">';
        echo 'alert("Account successfully deleted!")';
        echo '</script>';
    }

    function uploadImage() {
        // iau imaginea incarcata si o introduc in folderul general unde se afla imaginile mancarilor. 
        // actualizez noua cale in fisierul general care va fi si calea finala pentru mancarea introdusa
        // returnez noua cale a imaginii in caz de upload cu sucess, altfel returnez ""
        $target_dir  = "../Categories/assets/";
        $target_file = $target_dir . $_FILES["image_path"]["name"]; 
        
        // daca imaginea e mai mare de 5mb nu o incarc
        if ($_FILES["image_path"]["size"] > 5000000) {
            echo '<script language="javascript">';
            echo 'alert("Image too big. Max file size admitted is 5mb!")';
            echo '</script>';
            return "";
        }

        // mut poza la calea dorita
        if (!move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
            echo '<script language="javascript">';
            echo 'alert("There was a problem uploading this file!")';
            echo '</script>';
        }
        return $target_file;
    }

    function createNewRecipe($name, $category, $price, $isVegetarian, $perisability, $valability, $disponibility, $ingredients) {
        $image_ = uploadImage();
        if ($image_ == "") {
            return;
        }
        $sql = "INSERT INTO mancare (nume, categorie, pret, imagine, este_vegetarian, perisabilitate, valabilitate, disponibilitate, ingrediente) VALUES (:name, :category, :price, :image, :isveg, :perisability, :valability, :disponibility, :ingredients)";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            ':name'          => $name,
            ':category'      => $category,
            ':price'         => $price,
            ':image'         => $image_,
            ':isveg'         => $isVegetarian,
            ':perisability'  => $perisability,
            ':valability'    => $valability,
            ':disponibility' => $disponibility,
            ':ingredients'   => $ingredients
        ]);
    }

    function checkFoodExists($foodId) {
        $sql = "SELECT * FROM mancare WHERE id = :id";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'id' => $foodId
        ]);
        return $cerere->rowCount() >= 1;
    }

    function deleteFood($foodId) {
        if (!checkFoodExists($foodId)) {
            echo '<script language="javascript">';
            echo 'alert("Food you want to delete does not exists!")';
            echo '</script>';
            return;
        }
        $sql = "DELETE FROM mancare WHERE id = :id";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'id' => $foodId
        ]);
    }

    function checkRestaurantExists($restaurantId) {
        $sql = "SELECT * FROM restaurant WHERE id = :id";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'id' => $restaurantId
        ]);
        return $cerere->rowCount() >= 1;
    }

    function createRestaurant($restaurantName, $restaurantLink) {
        if (checkRestaurantExists($restaurantLink)) {
            echo '<script language="javascript">';
            echo 'alert("Restaurant you want to insert already exists!")';
            echo '</script>';
            return;
        }
        $sql = "INSERT INTO restaurant (nume, locatie) VALUES (:nume, :locatie)";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'nume'    => $restaurantName,
            'locatie' => $restaurantLink
        ]);
    }

    function deleteRestaurant($restaurantId) {
        if (!checkRestaurantExists($restaurantId)) {
            echo '<script language="javascript">';
            echo 'alert("Restaurant you want to delete does not exists!")';
            echo '</script>';
            return;
        }
        $sql = "DELETE FROM restaurant WHERE id = :id";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'id' => $restaurantId
        ]);
    }

    if (isset($_POST["create-account"])) {
        // iau parametrii trimisi in formular in vederea creerii utilizatorului nou
        $firstName = $_POST["fname"];
        $lastName  = $_POST["lname"];
        $userName  = $_POST["uname"];
        $email     = $_POST["email"];
        $password  = $_POST["password"];
        $pnumber   = $_POST["phone-nr"];
        $address   = $_POST["address"];        
        createUser($firstName, $lastName, $userName, $email, $password, $pnumber, $address);
    }

    if (isset($_POST["delete-account"])) {
        $username = $_POST["uname_to_delete"];
        $email    = $_POST["email_to_delete"];
        deleteUser($email, $username);
    }

    if (isset($_POST["create_food"])) {
        $nume          = $_POST["food_name"];
        $category      = $_POST["categorie"];
        $pret          = $_POST["price"];
        // $image         = $_POST["image_path"];
        $isvegetarian  = isset($_POST["isvegetarian"]) ? 1 : 0;
        $perisability  = $_POST["perisability"];
        $valability    = $_POST["valability"];
        $disponibility = $_POST["disponibility"];
        $ingrediente   = $_POST["retete_area"];
        if (isset($_FILES["image_path"])) {
            createNewRecipe($nume, $category, $pret, $isvegetarian, $perisability, $valability, $disponibility, $ingrediente);
        } 
        else {
            echo "Add an image!";
        }
    }
    
    if (isset($_POST["delete_food"])) {
        $foodId = $_POST["food_id_to_delete"];
        deleteFood($foodId);
    }

    if (isset($_POST["create_restaurant"])) {
        $restaurantName = $_POST["restaurant_name"];
        $restaurantLink = $_POST["restaurant_link"];
        createRestaurant($restaurantName, $restaurantLink);
    }

    if (isset($_POST["delete_restaurant"])) {
        $restaurantId = $_POST["restaurant_id_to_delete"];
        deleteRestaurant($restaurantId);
    } 
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
            <a id="logout_link" href="../logout.php">LOGOUT</a>
        </header>
        <div class="main_content">
            <div class="options">
                <button id="create_user">Create user</button>
                <button id="delete_user">Delete user</button>
                <button id="create_food">Submit new food</button>
                <button id="delete_food">Delete food</button>
                <button id="create_restaurant">Create restaurant</button>
                <button id="delete_restaurant">Delete restaurant</button>
            </div>
            <div class="options_exec_area">
                <div id="create_user_area">
                    <form id="create_user_form" class="main_form" method="POST" >
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
                        <input id="submit-input-create-user" type="submit" name="create-account">
                    </form>
                </div>
                <div id="delete_user_area">
                    <form id="delete_user_form" class="main_form" method="POST">
                        <label for="uname_to_delete">Username:</label><br>
                        <input class="required" type="text" id="uname_to_delete" name="uname_to_delete" placeholder="Enter your username..." required><br><br>

                        <label for="email_to_delete">Email adress:</label><br>
                        <input class="required" type="email" id="email_to_delete" name="email_to_delete" placeholder="Enter your email..." required><br><br>

                        <input id="submit-input-delete-user" class="delete_input" type="submit" name="delete-account">
                    </form>
                </div>
                <div id="create_food_area">
                    <form id="create_food_form" class="main_form" method="POST" enctype="multipart/form-data">
                        <label for="food_name">Food name: </label><br>
                        <input class="required" type="text" id="food_name" name="food_name" placeholder="Enter food name..." required><br><br>

                        <label for="categorie">Category:</label><br>
                        <input class="required" type="text" id="categorie" name="categorie" placeholder="Enter food category..." required><br><br>

                        <label for="price">Price:</label><br>
                        <input class="required" type="text" id="price" name="price" placeholder="Enter food price..." required><br><br>

                        <label for="image_input">Food image path:</label><br>
                        <input id="image_path" class="required" type="file" name="image_path" placeholder="Enter food image ..." accept="image/*" required><br><br>
                        
                        <label for="isvegetarian">Vegetarian food:</label>
                        <input class="required" type="checkbox" id="isvegetarian" name="isvegetarian" placeholder="Check if food is vedetarian..." ><br><br><br>

                        <label for="perisability">Perisability:</label>
                        <input class="required" type="number" id="perisability" name="perisability" placeholder="Enter perisability..." ><br><br>
                        
                        <label for="valability">Valability:</label>
                        <input class="required" type="number" id="valability" name="valability" placeholder="Enter valability..." ><br><br>
                        
                        <label for="disponibility">Disponibility</label>
                        <input class="required" type="text" id="disponibility" name="disponibility" placeholder="Enter disponibility..."><br><br>
                        <br>
                        <label id="reteta_area_label" for="reteta_area">Introduceti ingredientele separate prin ';'</label>
                        <textarea id="retete_area" name="retete_area" autofocus required></textarea>

                        <input id="submit-input-create-food" type="submit" name="create_food">
                    </form>
                </div>
                <div id="delete_food_area">
                    <form id="delete_food_form" class="main_form" method="POST">
                        <label for="food_id">Food id: </label><br>
                        <input class="required" type="text" id="food_id_to_delete" name="food_id_to_delete" placeholder="Enter food id..." required><br><br>
                        <input id="submit-input-delete-food" class="delete_input" type="submit" name="delete_food">
                    </form>
                </div>
                <div id="create_restaurant_area">
                    <form id="create_restaurant_form" class="main_form" method="POST">
                        <label for="restaurant_name">Restaurant name: </label><br>
                        <input class="required" type="text" id="restaurant_name" name="restaurant_name" placeholder="Enter restaurant name..." required><br><br>

                        <label for="restaurant_name">Restaurant link: </label><br>
                        <input class="required" type="text" id="restaurant_link" name="restaurant_link" placeholder="Enter restaurant link..." required><br><br>
                        
                        <input id="submit-input-create-restaurant" type="submit" name="create_restaurant">
                    </form>
                </div>
                <div id="delete_restaurant_area">
                    <form id="delete_restaurant_form" class="main_form" method="POST">
                        <label for="restaurant_id_to_delete">Restaurant id: </label><br>
                        <input class="required" type="text" id="restaurant_id_to_delete" name="restaurant_id_to_delete" placeholder="Enter restaurant id..." required><br><br>
                        <input id="submit-input-delete-restaurant"  class="delete_input" type="submit" name="delete_restaurant">
                    </form>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>&copy; FORG - Made &amp; Designed By Rogoza Calin Andrei, Spantu Theodor Ioan, Ursulean Ciprian</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <script src="../js/administration.js"></script>
</body>
</html>