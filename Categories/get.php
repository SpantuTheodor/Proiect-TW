<?php
session_start();
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

$conditie = 0;
$nume = ' ';

for ($i = $_SESSION["index"]; $i < $_SESSION["index"] + 5; $i++) {
    $sql = "SELECT nume,imagine,pret,numar_aprecieri,este_vegetarian , categorie, id FROM mancare WHERE id = :index";
    $cerere = DB::get_connnection()->prepare($sql);
    $cerere->execute([
        'index' => $i
    ]);
    $data = $cerere->fetch();
    if (!empty($data)) {
        $nume = $data["nume"];
        $poza = $data["imagine"];
        $pret = $data["pret"];
        $aprecieri = $data["numar_aprecieri"];
        $vegetarian = $data["este_vegetarian"];
        $categorie = $data["categorie"];
        $id = $data["id"];


        if ($_SESSION['nume'] == $nume || $nume == NULL) {
            $conditie = 1;
        }
        if ($vegetarian == 0) {
            $vegetarian = "nu";
        } else {
            $vegetarian = "da";
        }

        if (isset($_COOKIE['id'])) {
            $sql = "SELECT id_utilizator , id_mancare FROM mancare_preferata WHERE id_utilizator = :index_ut AND id_mancare = :index_mn;";
            $cerere = DB::get_connnection()->prepare($sql);
            $cerere->execute([
                'index_ut' => $_COOKIE["id"],
                'index_mn' => $i
            ]);
            $data2 = $cerere->fetch();

            $sql = "SELECT id_utilizator , id_mancare FROM lista_cumparaturi WHERE id_utilizator = :index_ut AND id_mancare = :index_mn;";
            $cerere = DB::get_connnection()->prepare($sql);
            $cerere->execute([
                'index_ut' => $_COOKIE["id"],
                'index_mn' => $i
            ]);
            $data3 = $cerere->fetch();

            $variabila = $data['id'];
            if ($conditie == 0 && !$data2 && !$data3) {
                echo " <article id='id1'>
                    <div class='poze' style='background-image: url(\"$poza\")'>
                    </div>
                    <div class='informatii'>
                        <img title='Add to favorites' class='love_icon' id='f$id' src='assets/icons/favorite_icon.png' alt='add to favorites icon' onclick=\"addToFavorites('$id') ; decreaseOpacity('f$id') ; refreshLikes()\" style='opacity:0.5;'>
                        <img title='Add to shoppping list' class='love_icon' id='s$id' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' onclick=\"addToShoppingList('$id') ; increaseOpacity('s$id') ; refreshLikes() \" style='width: 24px; height: 24px; opacity:0.5;'>
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
            } else if ($conditie == 0 && $data2 && !$data3) {
                echo " <article id='id1'>
                        <div class='poze' style='background-image: url(\"$poza\")'>
                        </div>
                        <div class='informatii'>
                            <img title='Add to favorites' class='love_icon' id='f$id' src='assets/icons/favorite_icon.png' alt='add to favorites icon' onclick=\"deleteFromFavorites('$id') ; increaseOpacity('f$id') ; refreshLikes()\">
                            <img title='Add to shoppping list' class='love_icon' id='s$id' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' onclick=\"addToShoppingList('$id') ; increaseOpacity('s$id') ; refreshLikes() \" style='width: 24px; height: 24px; opacity:0.5;'>
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
            } else if ($conditie == 0 && !$data2 && $data3) {
                echo " <article id='id1'>
                            <div class='poze' style='background-image: url(\"$poza\")'>
                            </div>
                            <div class='informatii'>
                                <img title='Add to favorites' class='love_icon' id='f$id'src='assets/icons/favorite_icon.png' alt='add to favorites icon' onclick=\"addToFavorites('$id') ; decreaseOpacity('f$id') ; refreshLikes() \" style='opacity:0.5;'>
                                <img title='Add to shoppping list' class='love_icon' id='s$id' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' onclick=\"deleteFromShoppingList('$id') ; decreaseOpacity('s$id') ; refreshLikes() \" style='width: 24px; height: 24px;'>
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
            } else if ($conditie == 0 && $data2 && $data3) {
                echo " <article id='id1'>
                        <div class='poze' style='background-image: url(\"$poza\")'>
                        </div>
                        <div class='informatii'>
                            <img title='Add to favorites' class='love_icon' id='f$id' src='assets/icons/favorite_icon.png' alt='add to favorites icon' onclick=\"deleteFromFavorites('$id') ; increaseOpacity('f$id') ; refreshLikes()\">
                            <img title='Add to shoppping list' class='love_icon' id='s$id' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' onclick=\"deleteFromShoppingList('$id') ; decreaseOpacity('s$id') ; refreshLikes() \" style='width: 24px; height: 24px;'>
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
        else{
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
        $_SESSION['nume'] = $nume;
    }
}
$_SESSION["index"] += 5;
?>

