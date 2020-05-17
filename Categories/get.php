<?php

session_start();
$mysqli = new mysqli("localhost", "root", "", "forg_database");
if ($mysqli->connect_error) {
    exit('Could not connect');
}
echo $_SESSION["index"];
$i2 = $_GET['i'];

for ($i = $_SESSION["index"]; $i < $_SESSION["index"]+5; $i++) {
    $sql = "SELECT nume,imagine,pret,numar_aprecieri,este_vegetarian , categorie FROM mancare WHERE id = '$i'";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($nume, $poza, $pret, $aprecieri, $vegetarian, $categorie);
    $stmt->fetch();
    echo $i;

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
                                $_SESSION["index"]+=5;
    $stmt->close();
}
?>