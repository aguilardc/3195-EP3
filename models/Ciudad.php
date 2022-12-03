<?php

include_once '../../config/Database.php';

include_once '../../dto/CiudadDTO.php';

class Ciudad extends Database {

    private $dbTable = 'ciudades';

    /**
     * @todo function create
     */
    public function create() {
        echo "CREATE";
    }

    /**
     * @todo function read
     */
    public function read() {

        $sqlQuery = "SELECT * FROM {$this->dbTable};";
        $query = $this->connect()->prepare($sqlQuery);
        $query->execute();
        if ($query->rowCount()) {
            return $query->fetchAll(PDO::FETCH_CLASS, 'CiudadDTO');
        }
        return null;
    }

    /**
     * @todo function update
     */
    public function update() {
        echo "UPDATE";
    }

    /**
     * @todo function delete
     */
    public function delete() {
        echo "DELETE";
    }

}
