<?php

abstract class GenericDAO{

    protected PDO $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public abstract function create($obj);

    public abstract function read();

    public abstract function update($obj);

    public abstract function delete($obj);

    public abstract function searchById($id);
    

}