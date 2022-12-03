<?php

class Database {

    const HOST = 'localhost';
    const DBNAME = 'climas';
    const USER = 'root';
    const PASSWORD = '1234';

    private $connection = null;

    protected function connect() {
        try {
            if (is_null($this->connection)) {
                $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::USER, self::PASSWORD);
            }
        } catch (PDOException $e) {
            echo "No se pudo establecer una conexion con la base de datos {$e->getMessage()}";
            die();
        }
        return $this->connection;
    }

}
