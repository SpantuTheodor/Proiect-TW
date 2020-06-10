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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=6.0">
    <meta name="description" content="Pagina de categorii si cautare produse.">
    <title>Categories</title>
    <link rel="shortcut icon" href="../home/assets/banana_de_nigga.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Dosis%7CRoboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="appl.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
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

        function showResult(str) { //search
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

        function decreaseOpacity(id) {
            document.getElementById(id).style.opacity = "0.5";
        }

        function increaseOpacity(id) {
            document.getElementById(id).style.opacity = "1";
        }

        function refreshLikes() {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("MORE").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "refresh.php", true);
            xmlhttp.send();
        }

        function decrementLikes(id) {
            var a = parseInt(document.getElementById(id).innerHTML);
            document.getElementById(id).innerHTML = a - 1;
        }
    </script>
    <title>Forg</title>
</head>

<body>
    <div class="DIVmare">
        <header class="nav-bar">
            <nav>
                <a id="a1" href="../index.php"><img class="nav-icon" src="../profile/assets/icons/home.png" alt="home-icon">HOME</a>
                <a id="a3" href="../ContactUs/contactUs.php"><img class="nav-icon" src="../categories/assets/icons/about.png" alt="about-icon">ABOUT</a>
                <a id="a4" href="../signup/sign_up.php"><img class="nav-icon" src="../categories/assets/icons/signup.png" alt="login">SIGN UP</a>
                <a id="a7" href="../profile/profileDemo.php"><img class="nav-icon" src="../categories/assets/icons/profile.png" style="height:24px;width:24px;" alt="profile">MY PROFILE</a>
                <a id="a5" href="../logout.php"><img class="nav-icon" src="../categories/assets/icons/logout.png" alt="logout">LOGOUT</a>
                <a id="a6" href="../login/login.php"><img class="nav-icon" src="../categories/assets/icons/login.png" alt="login" style="height:24px;width:24px;">LOGIN</a>
            </nav>
        </header>

        <div>
            <h1> Recommended Recipes </h1>
        </div>
        <section class="recommendedcat">
            <ul style="list-style-type:none;" class="recommendedcatlist">
                <li>
                    <a style="text-decoration:none;" target="_blank" href="getIdMancare.php?id=5">
                        <figure>
                            <img src="assets/Supa-crema-de-ardei-copti-de-post.jpg" style="object-fit: cover;" alt="supa photo" height="200px" width="200px">
                            <figcaption>Supa crema de ardei copti</figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a style="text-decoration:none;" target="_blank" href="getIdMancare.php?id=10">
                        <figure>
                            <img src="assets/gyros.jpg" style="object-fit: cover;" alt="gyros photo" height="200px" width="200px">
                            <figcaption>Gyros grecesc cu pui si tzatziki</figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a style="text-decoration:none;" target="_blank" href="getIdMancare.php?id=4">
                        <figure>
                            <img src="assets/briosa-visine.jpg" style="object-fit: cover;" alt="briosa photo" height="200px" width="200px">
                            <figcaption>Briosa cu visine</figcaption>
                        </figure>
                    </a>
                </li>
            </ul>
        </section>

        <form id="srch">
            <input type="text" id="search" name="search" placeholder="Search for a recipe..." onkeyup="showResult(this.value)">
            <label for="search" style="opacity:0.5%;">C</label>
            <input id="submit-input" type="submit" name="submit-input" value="Caută!">
        </form>

        <div class="lista">
            <div class="filtre">
                <h3>Filters</h3>
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
                    <input name="show-more" id="show-more" type="button" onclick="loadDoc('<?php echo $variabila; ?>')" value="AFISEAZA MAI MULT">
                    <label for="show-more"></label>
                </form>
            </section>
        </div>
        <div style="padding:50px"></div>
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>&copy; FORG - Made &amp; Designed By Rogoza Calin Andrei, Spantu Theodor Ioan, Ursulean Ciprian</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</body>
<script src="filtering.js"></script>

</html>

<?php


if (isset($_COOKIE['user'])) {  //daca avem user logat
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