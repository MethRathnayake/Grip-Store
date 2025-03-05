<?php 

    class Database{
        public static $connection;
            public static function setupConnection(){
                if (!isset(Database::$connection)){
                    Database::$connection = new mysqli("localhost" , "root" , "Meth@2007" , "grip_tech", "3306");

                }
            }

            public static function iud($q){
                Database::setupConnection();
                $result = Database::$connection->query($q);
                return $result;
            }

            public static function search($q){
                Database::setupConnection();
                $resultset = Database::$connection->query($q);
                return $resultset;
            }
    }


?>