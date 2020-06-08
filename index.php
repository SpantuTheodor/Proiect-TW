<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORG</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="home/assets/banana_de_nigga.png">
</head>

<body>
    <div class="container1">
        <header class="nav-bar">
            <nav>
                <a id="a2" href="Categories/forg.php"><img class="nav-icon" src="home/assets/icons/trending.png" alt="trending-icon">TRENDING</a>
                <a id="a3" href="ContactUs/contactUs.php"><img class="nav-icon" src="home/assets/icons/about.png" alt="about-icon">ABOUT</a>
                <a id="a4" href="signup/sign_up.php">SIGN UP</a>
                <a id="a7" href="profile/profileDemo.php">MY PROFILE</a>
                <a id="a5" href="logout.php">LOGOUT</a>
                <a id="a6" href="login/login.php">LOGIN</a>
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
                <li><a href="ContactUs/contactUs.php"><button id="button">How it works</button></a></li>
            </ul>
        </div>

        <div>
            <h1> Recommended Categories </h1>
        </div>
        <section class="recommendedcat">
            <ul style="list-style-type:none;" class="recommendedcatlist">
                <li>
                    <a href="http://css-tricks.com">
                        <figure>
                            <img id="burger" src="home/assets/burger.jpeg" alt="burger photo" width="200px" />
                            <figcaption>Burgers</figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="http://css-tricks.com">
                        <figure>
                            <img id="pizza" src="home/assets/pizza.jpeg" alt="pizza photo" width="200px" />
                            <figcaption>Pizzas</figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="http://css-tricks.com">
                        <figure>
                            <img id="salad" src="home/assets/salad.jpeg" alt="salad photo" width="200px" />
                            <figcaption>Salads</figcaption>
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
                            <p id="expdivtitle"> Eating sushi </p>
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
                            <p id="expdivtitle"> Eating vegan </p>
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
                        <button onclick="sushiFunction()">Sushi</button>
                        <button onclick="veganFunction()">Vegan</button>
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
        </script>

        <div id="slideshow-container">

        </div>


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