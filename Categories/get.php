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

function setSessionValue($foodId) {
    $_SESSION['idMancare'] = $foodId;
}

$conditie = 0;
$nume = ' ';

$_SESSION['idMancare'] = 1;

for ($i = $_SESSION["index"]; $i < $_SESSION["index"]+5; $i++) {
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
        $_SESSION['idMancare'] = $data["id"];
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        if($_SESSION['nume'] == $nume || $nume == NULL)
        {
            $conditie = 1;
        }
        if ($vegetarian == 0) {
            $vegetarian = "nu";
        } else {
            $vegetarian = "da";
        }

        $variabila = $data['id'];
        if($conditie == 0){
        echo " <article id='id1'>
                    <div class='poze' style='background-image: url(\"$poza\")'>
                    </div>
                    <div class='informatii'>
                        <img title='Add to favorites' class='love_icon' src='assets/icons/favorite_icon.png' alt='add to favorites icon'>
                        <img title='Add to shoppping list' class='love_icon' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' style='width: 24px; height: 24px;'>
                        <h2>$nume</h2>
                        <p>Pret: $pret RON &nbsp &nbsp &nbsp &nbsp Aprecieri: $aprecieri &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $categorie</p>
                        <a target='_blank' href='getIdMancare.php' class='pop-up-button' onclick=' sendFoodId($variabila); setSessionValue($i) ' >Citeste mai mult...</a>
                    </div>                     
                </article>
                <div class='popup'>
                    
                    <div class='pop-up-content'>
                        <p>Some text in the Modal..</p>
                    </div>

                </div>";
        }
        $_SESSION['nume'] = $nume;
    }
}
$_SESSION["index"]+=5;
?>