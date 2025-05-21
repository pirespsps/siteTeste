<?php

class DatabaseAcess{

    public static ?PDO $pdo = null;

    private function __construct(){

    }

    public static function getPDO():PDO{
        
        if(self::$pdo == null){
            self::$pdo = new PDO("mysql:host=localhost;dbname=db_siteDagon","root","");
        }

        return self::$pdo;

    }

}