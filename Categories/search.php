<?php

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

session_start();
// $mysqli = new mysqli("localhost", "root", "", "forg_database");
// if ($mysqli->connect_error) {
//     exit('Could not connect');
// }

$str = $_GET['str'];

$sql = "SELECT nume,imagine,pret,numar_aprecieri, este_vegetarian , categorie FROM mancare WHERE nume LIKE :string";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'string' => "%$str%"
]);
$data = $cerere->fetchAll();

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// print_r($stmt->store_result());
// $result = mysqli_query($mysqli,$sql) or die( mysqli_error($mysqli));
// while($row = mysqli_fetch_array($result)){

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
                 <button id='pop-up-button'>Citeste mai mult...</button>
             </div>                         
         </article>";
}
?>