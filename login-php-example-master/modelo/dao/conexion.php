<?php

class conexion {

    private static $host = "127.0.0.1:3306";
    private static $user = "mmi21d03";
    private static $pwd = "6d68E8Q9_";
    private static $bd = "mmi21d03";

    public static function conectar() {
        return mysqli_connect(conexion::$host, conexion::$user, conexion::$pwd, conexion::$bd);
    }

}
?>
