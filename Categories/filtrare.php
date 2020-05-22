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

    echo " <article id='id1'>
    <div class='poze' style='background-image: url(\"$mancare[1]\")'>
    </div>
    <div class='informatii'>
        <img title='Add to favorites' class='love_icon' src='assets/icons/favorite_icon.png' alt='add to favorites icon'>
        <img title='Add to shoppping list' class='love_icon' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' style='width: 24px; height: 24px;'>
        <h2>$mancare[0]</h2>
        <p>Pret: $mancare[2] RON &nbsp &nbsp &nbsp &nbsp Aprecieri: $mancare[3] &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $mancare[5]</p>
        <a target='_blank' href='getIdMancare.php?id=$mancare[6]' class='pop-up-button' >Citeste mai mult...</a>
    </div>                     
</article>";

}

