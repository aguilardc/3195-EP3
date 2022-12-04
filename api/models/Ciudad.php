<?php

include_once '../config/Database.php';

include_once '../dto/CiudadDTO.php';

class Ciudad extends Database
{

    private $dbTable = 'ciudades';


    /**
     * @return array|false|null
     */
    public function read()
    {

        $sqlQuery = "SELECT * FROM {$this->dbTable};";
        $query = $this->connect()->prepare($sqlQuery);
        $query->execute();
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_CLASS, 'CiudadDTO');
        }
        return null;
    }

    /**
     * @return array|false|null
     */
    public function getCities()
    {
        $sqlQuery = "SELECT DISTINCT(ciudad_nombre), ciudad_pais FROM {$this->dbTable};";
        $query = $this->connect()->prepare($sqlQuery);
        $query->execute();
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_CLASS, 'CiudadDTO');
        }
        return null;
    }

    /**
     * @param string $city
     * @return array|false|null
     */
    public function getWeather(string $city)
    {
        $sqlQuery = "SELECT * FROM {$this->dbTable} WHERE LOWER(ciudad_nombre) = ?";
        $query = $this->connect()->prepare($sqlQuery);
        $query->execute([strtolower($city)]);
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_CLASS, 'CiudadDTO');
        }
        return null;

    }


}
