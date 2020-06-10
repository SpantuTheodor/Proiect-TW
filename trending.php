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
$i = $_GET['i'];
if ($i >= 1 && $i <= 10) {
    $sql = "SELECT nume , imagine FROM mancare ORDER BY numar_aprecieri LIMIT $i , 1 ";
    $cerere = DB::get_connnection()->prepare($sql);
    $cerere->execute();
    $data = $cerere->fetch();
    if (!empty($data)) {
        $nume = $data["nume"];
        $cale_imagine = $data["imagine"];
        echo "<h1> Food trending</h1>
        <div class=\"slideshow\" style=\" background-image:url('Categories/$cale_imagine');background-size: cover; background-repeat: no-repeat; background-position: center center;\">
            <div class=\"previous\" aria-label=\"Previous trending item\" onclick=\"previousTrending($i)\"></div>
            <div class=\"text\"><span class=\"nume-mancare\"> $nume </span></div>
            <div class=\"next\" aria-label=\"Next trending item\" onclick=\"nextTrending($i)\"></div>
        </div> ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=yes" />
    <meta name="description" content="Pagina de profil a utilizatorului.">
    <title>Document</title>
</head>
<body>
    
</body>
</html>