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

$sql = "SELECT * FROM mancare ORDER BY numar_aprecieri";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute();
$data = $cerere->fetchAll();

header("Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>Top Mancare</title>
 <description>Mancarurile sunt aranjate in functie de popularitatea lor</description>
 <language>RO</language>";

foreach ($data as $mancare) {

    if ($mancare[5] == 0) {
        $vegetarian = "vegetarian";
    } else {
        $vegetarian = "nu este vegetarian";
    }
    echo "<item>
   <title>$mancare[1]</title>
   <category>$mancare[2]</category>
   <price>$mancare[3]</price>
   <vegetarian> $vegetarian </vegetarian>
   <perisability>$mancare[6]</perisability>
   <valability>$mancare[7]</valability>
   <disponibility>$mancare[8]</disponibility>
   <likes>$mancare[9]</likes>
   <ingredients>";
   $ingredients=explode(";",$mancare[10]); 
   foreach($ingredients as $ingredient) echo "<ingredient> $ingredient </ingredient>"; 
   echo"</ingredients>
   <restrictions>$mancare[11]</restrictions>
   </item>";
}
echo "</channel></rss>";
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