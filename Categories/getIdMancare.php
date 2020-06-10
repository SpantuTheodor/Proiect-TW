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

$sql = "SELECT * FROM mancare WHERE id = :index"; //mancare
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'index' => $id
]);
$data = $cerere->fetch();

$query = "SELECT r.nume,r.locatie FROM restaurant r JOIN mancare m ON m.id_restaurant = :index"; //restaurant
$request = DB::get_connnection()->prepare($query);
$request->execute([
    'index' => $data["id_restaurant"]
]);
$data_restaurant = $request->fetch();

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
    $restaurant = $data["id_restaurant"];

    $restaurant_nume = $data_restaurant["nume"];
    $restaurant_locatie = $data_restaurant["locatie"];

    if ($vegetarian == 0) {
        $vegetarian = "nu";
    } else {
        $vegetarian = "da";
    }
    $variabila = $data['id'];

    $ingredient = explode(';', $ingrediente);


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
        <p>Restaurant: <a href=\"$restaurant_locatie\"> $restaurant_nume </a></p>
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
    <meta name="viewport" content="user-scalable=yes" />
    <meta name="description" content="Pagina cu un produs specific.">
    <?php echo "<title>$nume</title>";?>
    <link rel="shortcut icon" href="../home/assets/banana_de_nigga.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Dosis%7CRoboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="getIdMancare.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="../logout.js"></script>

</head>

<body>

    <header class="nav-bar">
        <nav>
            <a id="a1" href="../index.php"><img class="nav-icon" src="assets/icons/home.png" alt="home-icon">HOME</a>
            <a id="a2" href="forg.php"><img class="nav-icon" src="assets/icons/trending.png" alt="trending-icon">CATEGORIES</a>
            <a id="a3" href="../ContactUs/contactUs.php"><img class="nav-icon" src="assets/icons/about.png" alt="about-icon">ABOUT</a>
            <a id="a4" href="../login/login.php">SIGN UP</a>
            <a id="a5" href="../logout.php">LOGOUT</a>
            <a id="a6" href="../signup/sign_up.php">LOGIN</a>
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
    <div class="spacer">

    </div>
    <div class="footer">
        <div class="contain">
            <div class="col">
                <h1>&copy; FORG - Made &amp; Designed By Rogoza Calin Andrei, Spantu Theodor Ioan, Ursulean Ciprian</h1>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>


</body>

</html>

<?php


if (isset($_COOKIE['user'])) {  //daca avem user logat
    echo "<script>document.getElementById(\"a4\").style.display = \"none\";
                  document.getElementById(\"a6\").style.display = \"none\";
                  document.getElementById(\"a5\").style.display = \"inline\"; 
          </script>";
} else {
    echo "<script>document.getElementById('a5').style.display = \"none\";
    document.getElementById('a4').style.display = \"inline\"; 
    document.getElementById('a6').style.display = \"inline\";               
    </script>";
}

?>