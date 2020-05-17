
<?php
session_start();
$conexiune = mysqli_connect("localhost", "root", "", "forg_database");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$_SESSION["index"] = 6;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Dosis%7CRoboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="appl.css">

    <script>
        function loadDoc(index) {
            var xmlhttp = new XMLHttpRequest();
            
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("MORE").innerHTML += this.responseText;
                }
            };
            xmlhttp.open("GET", "get.php?i=" + index, true);
            xmlhttp.send();

            console.log("allllllllllllllll");
        }
    </script>

    <title>Forg</title>
</head>

<body>
    <div class="DIVmare">
        <header class="nav-bar">
            <nav>
                <a id="a1" href="#"><img class="nav-icon" src="assets/icons/home.png" alt="home-icon">HOME</a>
                <a id="a2" href="#"><img class="nav-icon" src="assets/icons/trending.png" alt="trending-icon">TRENDING</a>
                <a id="a3" href="#"><img class="nav-icon" src="assets/icons/about.png" alt="about-icon">ABOUT</a>
                <a id="a4" href="#">LOGIN</a>
            </nav>
        </header>

        <div>
            <h1> Recommended Categories </h1>
        </div>
        <section class="recommendedcat">
            <ul style="list-style-type:none;" class="recommendedcatlist">
                <li>
                    <a href="http://css-tricks.com/%22%3E">
                        <figure>
                            <img id="burger" src="assets/burger.jpeg" alt="burger photo" width="200px">
                            <figcaption>Burgers</figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="http://css-tricks.com/%22%3E">
                        <figure>
                            <img id="pizza" src="assets/pizza.jpeg" alt="pizza photo" width="200px">
                            <figcaption>Pizzas</figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="http://css-tricks.com/%22%3E">
                        <figure>
                            <img id="salad" src="assets/salad.jpeg" alt="salad photo" width="200px">
                            <figcaption>Salads</figcaption>
                        </figure>
                    </a>
                </li>
            </ul>
        </section>

        <div id="srch">
            <input type="text" id="search" name="search" placeholder="Search for a recipe...">
            <input id="submit-input" type="submit" name="submit-input" value="Caută!">
        </div>

        <div class="lista">
            <div class="filtre">
                <h3>Filtre</h3>
                <label class="container">Fast Food
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Salate
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Supe și ciorbe
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Aperitive
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Mic Dejun
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Garnituri
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Cu carne
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Murături
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Gustări
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Desert
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </div>
            <section class="content">

                <?php

                $i = 1;
                $i2 = 5;

                for (; $i <= $i2; $i++) {
                    $sql = "SELECT nume,imagine,pret,numar_aprecieri,este_vegetarian , categorie FROM mancare WHERE id='$i'";

                    if ($result = mysqli_query($conexiune, $sql)) {
                        $row = mysqli_fetch_row($result);

                        $nume = $row[0];
                        $poza = $row[1];
                        $pret = $row[2];
                        $aprecieri = $row[3];
                        $vegetarian = $row[4];
                        $categorie = $row[5];

                        if ($vegetarian == 0) {
                            $vegetarian = "nu";
                        } else {
                            $vegetarian = "da";
                        }

                        echo " <article id='id1'>
                                <div class='poze' style='background-image: url(\"$poza\")'>
                                </div>
                                <div class='informatii'>
                                    <img title='Add to favorites' class='love_icon' src='assets/icons/favorite_icon.png' alt='add to favorites icon'>
                                    <img title='Add to shoppping list' class='love_icon' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' style='width: 24px; height: 24px;'>
                                    <h2>$nume</h2>
                                    <p>Pret: $pret RON &nbsp &nbsp &nbsp &nbsp Aprecieri: $aprecieri &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $categorie</p>
                                    <button id='pop-up-button'>Citeste mai mult...</button>
                                </div> 
                                
                                </article>";
                    }
                    mysqli_free_result($result);
                }

                ?>
                <div id="MORE"></div>

                <!-- pop up -->
                <div id="pop-up" class="popup">

                    <!-- pop up content -->
                    <div class="pop-up-content">
                        <span class="close">&times;</span>
                        <p>Some text in the Modal..</p>
                    </div>

                </div>
        </div>
        </article>
        <form>
            <input id="show-more" type="button" onclick='loadDoc('<?php echo $_SESSION["index"] ?>' )' value="AFISEAZA">
        </form>
        </section>
    </div>
    </div>
</body>

</html>
<script src="categorii.js"></script>