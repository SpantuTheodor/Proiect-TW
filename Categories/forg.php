<?php

$conexiune = mysqli_connect("localhost", "root", "", "forg_database");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
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

                    a: for (; $i <= $i2; $i++) {
                        $sql = "SELECT nume,imagine,pret FROM mancare WHERE id='$i'";
                        
                        if($result = mysqli_query($conexiune, $sql)){
                        $row = mysqli_fetch_row($result);
                        
                        $nume=$row[0];
                        $poza = $row[1];
                        $pret = $row[2];

                        echo " <article id='id1'>
                                <div class='poze' style='background-image: url(\"$poza\")'>
                                </div>
                                <div class='informatii'>
                                    <img title='Add to favorites' class='love_icon' src='assets/icons/favorite_icon.png' alt='add to favorites icon'>
                                    <img title='Add to shoppping list' class='love_icon' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' style='width: 24px; height: 24px;'>
                                    <h2>$nume</h2>
                                    <p>Pret: $pret lei grei</p>
                                </div> 
                                <button id='pop-up-button'>Citeste mai mult...</button>
                                </article>";
                    }
                    mysqli_free_result($result);
                }

                    if (isset($_POST['show-more'])) {
                        $i = $i2 + 1;
                        $i2 = $i2 + 5;
                        unset($_POST['show-more']);
                        goto a;
                    }
                    ?>

                    <div class="informatii">
                        <img title="Add to favorites" class="love_icon" src="assets/icons/favorite_icon.png" alt="add to favorites icon">
                        <img title="Add to shoppping list" class="love_icon" src="assets/icons/add_to_shopping_list.png" alt="add to shoppping list icon" style="width: 24px; height: 24px;">
                        <h2>Somon</h2>
                        <p>Aceasta reteta este Acee Aceasta ret estta esteAceasta reteta est </p>

                        <button id="pop-up-button">Citeste mai mult...</button>

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
                <article id="id1">
                    <div class="poze">
                    </div>
                    <div class="informatii">
                        <img title="Add to favorites" class="love_icon" src="assets/icons/favorite_icon.png" alt="add to favorites icon">
                        <img title="Add to shoppping list" class="love_icon" src="assets/icons/add_to_shopping_list.png" alt="add to shoppping list icon" style="width: 24px; height: 24px;">
                        <h2>Somon</h2>
                        <p>Aceasta reteta este Acee Aceasta ret esteAceasta reteta esteAceasta reteta esteAceasta reteta
                            este e</p>
                        <a id="ca1" href="#">Citeste mai mult...</a>
                    </div>
                </article>
                <article id="id1">
                    <div class="poze">
                    </div>
                    <div class="informatii">
                        <img title="Add to favorites" class="love_icon" src="assets/icons/favorite_icon.png" alt="add to favorites icon">
                        <img title="Add to shoppping list" class="love_icon" src="assets/icons/add_to_shopping_list.png" alt="add to shoppping list icon" style="width: 24px; height: 24px;">
                        <h2>Somon</h2>
                        <p>Aceasta reteta este Acee Aceasta ret esteAceasta reteta esteAceasta reteta esteAceasta reteta
                            este</p>
                        <a id="ca1" href="#">Citeste mai mult...</a>
                    </div>
                </article>
                <article id="id1">
                    <div class="poze">
                    </div>
                    <div class="informatii">
                        <img title="Add to favorites" class="love_icon" src="assets/icons/favorite_icon.png" alt="add to favorites icon">
                        <img title="Add to shoppping list" class="love_icon" src="assets/icons/add_to_shopping_list.png" alt="add to shoppping list icon" style="width: 24px; height: 24px;">
                        <h2>Somon</h2>
                        <p>Aceasta reteta este Acee Aceasta ret esteAceasta reteta esteAceasta reteta esteAceasta reteta
                            este</p>
                        <a id="ca1" href="#">Citeste mai mult...</a>
                    </div>
                </article>
                <article id="id1">
                    <div class="poze">
                    </div>
                    <div class="informatii">
                        <img title="Add to favorites" class="love_icon" src="assets/icons/favorite_icon.png" alt="add to favorites icon">
                        <img title="Add to shoppping list" class="love_icon" src="assets/icons/add_to_shopping_list.png" alt="add to shoppping list icon" style="width: 24px; height: 24px;">
                        <h2>Somon</h2>
                        <p>Aceasta reteta este Acee Aceasta ret esteAceasta reteta esteAceasta reteta esteAceasta reteta
                            este</p>
                        <a id="ca1" href="#">Citeste mai mult...</a>
                    </div>
                </article>
                <form action="" method="POST">
                    <button id="show-more" name="show-more" type="submit">Afiseaza mai mult</button>
                    <form>
            </section>
        </div>
    </div>
</body>

</html>
<script src="categorii.js"></script>