<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=soundstore_bd",
                "root",
                "root"
            );

            return $conn;
        }
    }