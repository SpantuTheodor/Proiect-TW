<?php
session_start();
$conexiune = mysqli_connect("localhost", "root", "", "forg_database");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$variabila = 0;

$_SESSION['index'] = 1;
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
    <script src="../logout.js"></script>

    <script>
        index = 1; //primul pas facut de la sine
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("MORE").innerHTML += this.responseText;
            }
        };
        xmlhttp.open("GET", "get.php?i=" + index, true);
        xmlhttp.send();


        function loadDoc(index) { //urmatorii pasii
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("MORE").innerHTML += this.responseText;

                }
            };
            xmlhttp.open("GET", "get.php?i=" + index, true);
            xmlhttp.send();
        }

        function showResult(str) {
            if (str.length == 0) {
                document.getElementById("filterresults").style.display = "block";
                document.getElementById("searchresults").style.display = "none";
                document.getElementById("MORE").style.display = "block";
                document.getElementById("show-more").style.display = "block";
            } else {
                document.getElementById("filterresults").style.display = "none";
                document.getElementById("MORE").style.display = "none";
                document.getElementById("searchresults").style.display = "block";
                document.getElementById("show-more").style.display = "none";
            }

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("searchresults").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "search.php?str=" + str, true);
            xmlhttp.send();
        }

        function addToFavorites(id) {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "addToFav.php?i=" + id, true);
            xmlhttp.send();
            console.log(id);
        }

        
        function addToShoppingList(id) {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "addToList.php?i=" + id, true);
            xmlhttp.send();
            console.log(id);
        }

        function deleteFromFavorites(id) {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "deleteFromFav.php?i=" + id, true);
            xmlhttp.send();
            console.log(id);
        }

        function deleteFromShoppingList(id) {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "deleteFromList.php?i=" + id, true);
            xmlhttp.send();
            console.log(id);
        }

        function decreaseOpacity(id){
         document.getElementById(id).style.opacity="0.5";
        }

        function increaseOpacity(id){
         document.getElementById(id).style.opacity="1";
        }

    </script>
    <title>Forg</title>
</head>

<body>
    <div class="DIVmare">
        <header class="nav-bar">
            <nav>
                <a id="a1" href="../index.html"><img class="nav-icon" src="assets/icons/home.png" alt="home-icon">HOME</a>
                <a id="a3" href="../ContactUs/contactUs.php"><img class="nav-icon" src="assets/icons/about.png" alt="about-icon">ABOUT</a>
                <a id="a4" href="../signup/sign_up.php">SIGN UP</a>
                <a id="a7" href="../profile/profileDemo.php">MY PROFILE</a>
                <a id="a5" href="../logout.php">LOGOUT</a>
                <a id="a6" href="../login/login.php">LOGIN</a>
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
            <input type="text" id="search" name="search" placeholder="Search for a recipe..." onkeyup="showResult(this.value)">
            <input id="submit-input" type="submit" name="submit-input" value="Caută!">
        </div>

        <div class="lista">
            <div class="filtre">
                <h3>Filtre</h3>
                <label class="container">Fast Food
                    <input type="checkbox" id="id0" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Salate
                    <input type="checkbox" id="id1" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Supe și ciorbe
                    <input type="checkbox" id="id2" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Aperitive
                    <input type="checkbox" id="id3" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Mic Dejun
                    <input type="checkbox" id="id4" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Garnituri
                    <input type="checkbox" id="id5" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Cu carne
                    <input type="checkbox" id="id6" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Murături
                    <input type="checkbox" id="id7" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Gustări
                    <input type="checkbox" id="id8" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

                <label class="container">Desert
                    <input type="checkbox" id="id9" onclick="bifare(this.id);filtrare(this.id);">
                    <span class="checkmark"></span>
                </label>

            </div>
            <section class="content">

                <div id="filterresults"></div>

                <div id="searchresults"></div>

                <div id="MORE"></div>


                <form><?php $variabila = $_SESSION['index']; ?>
                    <input id="show-more" type="button" onclick="loadDoc('<?php echo $variabila; ?>')" value="AFISEAZA MAI MULT">
                </form>
            </section>
        </div>
    </div>
</body>
<script src="filtering.js"></script>

</html>

<?php


if (isset($_COOKIE['user'])) {  //daca avem user logat
    print_r($_COOKIE);
    echo "<script>document.getElementById(\"a4\").style.display = \"none\";
                  document.getElementById(\"a6\").style.display = \"none\";
                  document.getElementById(\"a5\").style.display = \"inline\";
                  document.getElementById(\"a7\").style.display = \"inline\";    
          </script>";
} else {
    echo "<script>document.getElementById('a5').style.display = \"none\";
    document.getElementById(\"a7\").style.display = \"none\";
    document.getElementById('a4').style.display = \"inline\"; 
    document.getElementById('a6').style.display = \"inline\";               
    </script>";
}

?>
<link rel="stylesheet" type="text/css" href="appl.css">