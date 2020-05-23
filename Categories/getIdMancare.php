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

    $ingredient = explode(';', $ingrediente); //what will do here


    $text = "<h2>$nume</h2>
    <div>
        <p>Pret: $pret RON</p>
        <p>Categorie: $categorie</p>
        <p>Vegetarian: $vegetarian</p>
        <p>Perisabilitate: $perisabilitate ore</p>
        <p>Valabilitate: $valabilitate zile</p>
        <p>Disponibilitate: $disponibilitate</p>
        <p>Numar aprecieri: $aprecieri</p>
        <p>Alergeni: $restrictii</p>
        <p>Restaurant: </p>
    </div>";
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

        <div class='poze' style='background-image: url("<?php echo $poza ?>")'> </div>
        <div class='text'>
            <?php echo $text;
            ?>

        </div>
        <div class='rest'>
            <ul>
                <?php
                foreach ($ingredient as $out) {
                    echo "<li> $out </li>";
                }
                ?>

            </ul>
        </div>
    </div>




</body>