<?php

    namespace database;

    use PDO;

    class connection{
        private static string $host ='localhost';
        private static string $dbname = 'collect_info';
        private static string $user ='root';
        private static string $pass ='';

        public static function connect(){
            $connection = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$user,self::$pass);
            $connection ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            return $connection;
        }
    }