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

$id_utilizator = $_COOKIE['id'];
$id_mancare = $_GET['index'];

$sql = "DELETE FROM lista_cumparaturi WHERE id_utilizator = :idu AND id_mancare = :idm";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'idu' => "$id_utilizator",
    'idm' => "$id_mancare"
]);

?>
