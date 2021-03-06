<?php

session_start();

$_SESSION["index"] = 1;

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

$index = $_GET['index'];

$categorii = [
    "id0" => "Fast Food",
    "id1" => "Salate",
    "id2" => "Supe si ciorbe",
    "id3" => "Aperitive",
    "id4" => "Mic dejun",
    "id5" => "Garnituri",
    "id6" => "Cu carne",
    "id7" => "Muraturi",
    "id8" => "Gustari",
    "id9" => "Desert"
];

$cat_index = $categorii[$index];

$sql = "SELECT nume,imagine,pret,numar_aprecieri, este_vegetarian , categorie ,id FROM mancare WHERE categorie LIKE :index";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'index' => "%$cat_index%"
]);
$data = $cerere->fetchAll();

foreach ($data as $mancare) {
    if ($mancare[4] == 0) {
        $vegetarian = "nu";
    } else {
        $vegetarian = "da";
    }

    $nume=$mancare[0];
    $poza=$mancare[1];
    $pret=$mancare[2];
    $aprecieri=$mancare[3];
    $categorie=$mancare[5];
    $id=$mancare[6];
    

    if (isset($_COOKIE['id'])) {
        $sql = "SELECT id_utilizator , id_mancare FROM mancare_preferata WHERE id_utilizator = :index_ut AND id_mancare = :index_mn;";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'index_ut' => $_COOKIE["id"],
            'index_mn' => $id
        ]);
        $data2 = $cerere->fetch();

        $sql = "SELECT id_utilizator , id_mancare FROM lista_cumparaturi WHERE id_utilizator = :index_ut AND id_mancare = :index_mn;";
        $cerere = DB::get_connnection()->prepare($sql);
        $cerere->execute([
            'index_ut' => $_COOKIE["id"],
            'index_mn' => $id
        ]);
        $data3 = $cerere->fetch();

        if (!$data2 && !$data3) {
            echo " <article id='id1'>
                <div class='poze' style='background-image: url(\"$poza\")'>
                </div>
                <div class='informatii'>
                    <img title='Add to favorites' class='love_icon' id='f$id' src='assets/icons/favorite_icon.png' alt='add to favorites icon' onclick=\"addToFavorites('$id') ;increaseOpacity('f$id') ; filtrare('$index')\" style='opacity:0.5;'>
                    <img title='Add to shoppping list' class='love_icon' id='s$id' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' onclick=\"addToShoppingList('$id') ; increaseOpacity('s$id') ; filtrare('$index') \" style='width: 24px; height: 24px; opacity:0.5;'>
                    <h2>$nume</h2>
                    <p>Pret: $pret RON &nbsp &nbsp &nbsp &nbsp  Aprecieri: <span id='span$id'>$aprecieri</span> &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $categorie</p>
                    <a target='_blank' href='getIdMancare.php?id=$id' class='pop-up-button' style=\"display: inline-block;
                    border-radius: 5px;
                    outline-style: none;
                    cursor: pointer;
                    background-color: rgba(255, 68, 0, 0.75);
                    font-weight: bold;
                    color: white;
                    padding: 10px 15px;
                    \">Citeste mai mult...</a>
                </div>                     
            </article>";
        } else if ($data2 && !$data3) {
            echo " <article id='id1'>
                    <div class='poze' style='background-image: url(\"$poza\")'>
                    </div>
                    <div class='informatii'>
                        <img title='Add to favorites' class='love_icon' id='f$id' src='assets/icons/favorite_icon.png' alt='add to favorites icon' onclick=\"deleteFromFavorites('$id') ; increaseOpacity('f$id') ; filtrare('$index')\">
                        <img title='Add to shoppping list' class='love_icon' id='s$id' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' onclick=\"addToShoppingList('$id') ; decreaseOpacity('s$id') ; filtrare('$index') \" style='width: 24px; height: 24px; opacity:0.5;'>
                        <h2>$nume</h2>
                        <p>Pret: $pret RON &nbsp &nbsp &nbsp &nbsp Aprecieri: <span id='span$id'>$aprecieri</span> &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $categorie</p>
                        <a target='_blank' href='getIdMancare.php?id=$id' class='pop-up-button' style=\"display: inline-block;
                        border-radius: 5px;
                        outline-style: none;
                        cursor: pointer;
                        background-color: rgba(255, 68, 0, 0.75);
                        font-weight: bold;
                        color: white;
                        padding: 10px 15px;
                        \">Citeste mai mult...</a>
                    </div>                     
                </article>";
        } else if (!$data2 && $data3) {
            echo " <article id='id1'>
                        <div class='poze' style='background-image: url(\"$poza\")'>
                        </div>
                        <div class='informatii'>
                            <img title='Add to favorites' class='love_icon' id='f$id'src='assets/icons/favorite_icon.png' alt='add to favorites icon' onclick=\"addToFavorites('$id') ; decreaseOpacity('f$id') ; filtrare('$index') \" style='opacity:0.5;'>
                            <img title='Add to shoppping list' class='love_icon' id='s$id' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' onclick=\"deleteFromShoppingList('$id') ; increaseOpacity('s$id') ; filtrare('$index') \" style='width: 24px; height: 24px;'>
                            <h2>$nume</h2>
                            <p>Pret: $pret RON &nbsp &nbsp &nbsp &nbsp Aprecieri: <span id='span$id'>$aprecieri</span> &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $categorie</p>
                            <a target='_blank' href='getIdMancare.php?id=$id' class='pop-up-button' style=\"display: inline-block;
                            border-radius: 5px;
                            outline-style: none;
                            cursor: pointer;
                            background-color: rgba(255, 68, 0, 0.75);
                            font-weight: bold;
                            color: white;
                            padding: 10px 15px;
                            \">Citeste mai mult...</a>
                        </div>                     
                    </article>";
        } else if ($data2 && $data3) {
            echo " <article id='id1'>
                    <div class='poze' style='background-image: url(\"$poza\")'>
                    </div>
                    <div class='informatii'>
                        <img title='Add to favorites' class='love_icon' id='f$id' src='assets/icons/favorite_icon.png' alt='add to favorites icon' onclick=\"deleteFromFavorites('$id') ; decreaseOpacity('f$id') ; filtrare('$index')\">
                        <img title='Add to shoppping list' class='love_icon' id='s$id' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' onclick=\"deleteFromShoppingList('$id') ; decreaseOpacity('s$id') ; filtrare('$index') \" style='width: 24px; height: 24px;'>
                        <h2>$nume</h2>
                        <p>Pret: $pret RON &nbsp &nbsp &nbsp &nbsp Aprecieri: <span id='span$id'>$aprecieri</span> &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $categorie</p>
                        <a target='_blank' href='getIdMancare.php?id=$id' class='pop-up-button' style=\"display: inline-block;
                        border-radius: 5px;
                        outline-style: none;
                        cursor: pointer;
                        background-color: rgba(255, 68, 0, 0.75);
                        font-weight: bold;
                        color: white;
                        padding: 10px 15px;
                        \">Citeste mai mult...</a>
                    </div>                     
                </article>";
        }
    } else {
        echo " <article id='id1'>
                    <div class='poze' style='background-image: url(\"$poza\")'>
                    </div>
                    <div class='informatii'>
                        <h2>$nume</h2>
                        <p>Pret: $pret RON &nbsp &nbsp &nbsp &nbsp Aprecieri: <span id='span$id'>$aprecieri</span> &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $categorie</p>
                        <a target='_blank' href='getIdMancare.php?id=$id' class='pop-up-button' style=\"display: inline-block;
                        border-radius: 5px;
                        outline-style: none;
                        cursor: pointer;
                        background-color: rgba(255, 68, 0, 0.75);
                        font-weight: bold;
                        color: white;
                        padding: 10px 15px;
                        \">Citeste mai mult...</a>
                    </div>                     
                </article>";
    }
}
?>
