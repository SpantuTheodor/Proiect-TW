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


$id = $_GET['id'];

$sql = "SELECT * FROM mancare WHERE id = :index";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'index' => $id
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
    $perisabilitate = $data["perisabilitate"];
    $valabilitate = $data["valabilitate"];
    $disponibilitate = $data["disponibilitate"];
    $ingrediente = $data["ingrediente"];
    $restrictii = $data["restrictii"];
    $restaurante = $data["restaurante"];

    if ($vegetarian == 0) {
        $vegetarian = "nu";
    } else {
        $vegetarian = "da";
    }
    $variabila = $data['id'];

    $text = " <article id='id1'>
                    <div class='poze' style='background-image: url(\"$poza\")'>
                    </div>
                    <div class='informatii'>
                        <img title='Add to favorites' class='love_icon' src='assets/icons/favorite_icon.png' alt='add to favorites icon'>
                        <img title='Add to shoppping list' class='love_icon' src='assets/icons/add_to_shopping_list.png' alt='add to shoppping list icon' style='width: 24px; height: 24px;'>
                        <h2>$nume</h2>
                        <p>Pret: $pret RON &nbsp &nbsp &nbsp &nbsp Aprecieri: $aprecieri &nbsp &nbsp &nbsp &nbsp Vegetarian: $vegetarian &nbsp &nbsp &nbsp &nbsp Categorie: $categorie</p>
                        <a target='_blank' href='getIdMancare.php?id=$id' class='pop-up-button' >Citeste mai mult...</a>
                    </div>                     
                </article>";
}
?>

<script>
    document.getElementById("info-page").innerHTML = this.responseText;
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Dosis%7CRoboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="getIdMancare.css">
    <script src="../logout.js"></script>

</head>

<body>

    <header class="nav-bar">
        <nav>
            <a id="a1" href="#"><img class="nav-icon" src="assets/icons/home.png" alt="home-icon">HOME</a>
            <a id="a2" href="#"><img class="nav-icon" src="assets/icons/trending.png" alt="trending-icon">TRENDING</a>
            <a id="a3" href="#"><img class="nav-icon" src="assets/icons/about.png" alt="about-icon">ABOUT</a>
            <a id="a4" href="#">LOGIN</a>
            <a id="a5" href="#" onclick="logout()">LOGOUT</a>
            <a id="a6" href="#">SIGN UP</a>
        </nav>
    </header>
    <div id="info-page">
<?php //echo $text; ?>
<div class='poze' style='background-image: url("assets/burger.jpeg")'> </div>
<div class='text'>

</div>
<div class ='rest'>
</div>
    </div>




</body>