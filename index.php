<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=yes" />
    <meta name="description" content="Pagina principala a aplicatiei.">
    <title>Home Page</title>
    <link rel="shortcut icon" href="home/assets/banana_de_nigga.png">

    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container1">
        <header class="nav-bar">
            <nav>
                <a id="a2" href="Categories/forg.php"><img class="nav-icon" src="categories/assets/icons/categories.png" alt="categories-icon">CATEGORIES</a>
                <a id="a3" href="ContactUs/contactUs.php"><img class="nav-icon" src="categories/assets/icons/about.png" alt="about-icon">ABOUT</a>
                <a id="a4" href="signup/sign_up.php"><img class="nav-icon" src="categories/assets/icons/signup.png" alt="login">SIGN UP</a>
                <a id="a7" href="profile/profileDemo.php"><img class="nav-icon" src="categories/assets/icons/profile.png" style="height:24px;width:24px;" alt="profile">MY PROFILE</a>
                <a id="a5" href="logout.php"><img class="nav-icon" src="categories/assets/icons/logout.png" alt="logout">LOGOUT</a>
                <a id="a6" href="login/login.php"><img class="nav-icon" src="categories/assets/icons/login.png" alt="login" style="height:24px;width:24px;">LOGIN</a>
            </nav>
        </header>
        <div class="container2">
            <p id="helper"> helper </p>

            <ul class="li1">

                <li>
                    <p id="LOGO">FORG</p>
                </li>
                <li>
                    <p> There is no love sincerer </p>
                </li>
                <li>
                    <p> than the love for food.</p>
                </li>
                <li><a href="ContactUs/contactUs.php"><button id="button" aria-label="Go to About page">How it works</button></a></li>
            </ul>
        </div>

        <div>
            <h1> Recommended Recipes </h1>
        </div>
        <section class="recommendedcat">
            <ul style="list-style-type:none;" class="recommendedcatlist">
                <li>
                    <a style="text-decoration:none;" target = "_blank" href="Categories/getIdMancare.php?id=5">
                        <figure>
                            <img src="Categories/assets/Supa-crema-de-ardei-copti-de-post.jpg" style="object-fit: cover;" alt="supa photo" height="200px" width="200px">
                            <figcaption>Supa crema de ardei copti</figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a style="text-decoration:none;" target = "_blank" href="Categories/getIdMancare.php?id=10">
                        <figure>
                            <img src="Categories/assets/gyros.jpg" alt="gyros photo" style="object-fit: cover;" height="200px" width="200px">
                            <figcaption>Gyros grecesc cu pui si tzatziki</figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a style="text-decoration:none;" target = "_blank" href="Categories/getIdMancare.php?id=4">
                        <figure>
                            <img src="Categories/assets/briosa-visine.jpg" alt="briosa photo" style="object-fit: cover;" height="200px" width="200px">
                            <figcaption>Briosa cu visine</figcaption>
                        </figure>
                    </a>
                </li>
            </ul>
        </section>

        <div id="container3">
            <h1>Food experiences you should try in a lifetime</h1>
            <br>
            <br>
            <br>
            <ul class="foodexp" style="list-style-type:none;">
                <li>
                    <div id="expdiv1">

                        <div class="expdivtext">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p id="expdivtitle1"> Eating sushi </p>
                            <br>
                            <div class="expdivrest">
                                <p> Sushi is a popular Japanese dish made from seasoned rice with fish, egg, or vegetables.
                                </p>
                                <br>
                                <p>Most describe eating it as a tradition crossover.</p>

                            </div>
                        </div>

                    </div>


                    <div id="expdiv2">
                        <div class="expdivtext">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p id="expdivtitle2"> Eating vegan </p>
                            <br>
                            <div class="expdivrest">
                                <p> Veganism is a type of vegetarian diet that excludes meat, eggs, dairy products, and all other animal-derived ingredients.
                                </p>
                                <p>Some people never come back to meat.</p>
                            </div>
                        </div>
                    </div>
                </li>


                <li><img src="home/assets/sushi.jpg" alt="sushi image" height="400px" width="550px" id="expimg1"></li>
                <li><img src="home/assets/salad.jpg" alt="salad image" height="400px" width="550px" id="expimg2"></li>

                <li>
                    <div class="buttons">
                        <button aria-label="Eat Sushi" onclick="sushiFunction()">Sushi</button>
                        <button aria-label="Eat Vegan" onclick="veganFunction()">Vegan</button>
                    </div>
                </li>
            </ul>
            <div id="break">

            </div>
        </div>

        <script>
            var pozitie_actuala = 1;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("slideshow-container").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "trending.php?i=" + pozitie_actuala, true);
            xmlhttp.send();

            function nextTrending(pozitie_actuala) {
                var xmlhttp = new XMLHttpRequest();
                pozitie_actuala = pozitie_actuala + 1;
                if (pozitie_actuala == 11) {
                    pozitie_actuala = 1;
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("slideshow-container").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "trending.php?i=" + pozitie_actuala, true);
                xmlhttp.send();
            }

            function previousTrending(pozitie_actuala) {
                var xmlhttp = new XMLHttpRequest();
                pozitie_actuala = pozitie_actuala - 1;
                if (pozitie_actuala == 0) {
                    pozitie_actuala = 10;
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("slideshow-container").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "trending.php?i=" + pozitie_actuala, true);
                xmlhttp.send();
            }

            function exportJS() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "exportRSS.php", true);
                xmlhttp.send();
            }
        </script>

        <div id="slideshow-container"> </div>
        <a href="exportRSS.php" target="_blank" style="text-decoration:none;">
            <div id="exportRSS" aria-label="Export clasament" style="
                        width:200px;
                        border-radius: 5px;
                        outline-style: none;
                        cursor: pointer;
                        background-color: rgba(255, 68, 0, 0.75);
                        font-weight: bold;
                        color: white;
                        padding: 10px 15px;
                        margin:auto; 
                        text-align:center;   
                        margin-bottom:100px;
                        font-family: 'Montserrat';
                        font-weight:200;
                        font-size:20px;" onclick="exportJS()">
                Export clasament
            </div>
        </a>
        <!-- FOOTER START -->
        <div class="footer">
            <div class="contain">
                <div class="col">
                    <h1>&copy; FORG - Made &amp; Designed By Rogoza Calin Andrei, Spantu Theodor Ioan, Ursulean Ciprian</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <script src="js/index.js"></script>
</body>

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