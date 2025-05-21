<?php
require_once __DIR__ . "/../genericDAO/GenericDAO.php";
require_once "Disco.php";

class DiscoDAO extends GenericDAO{

    public function __construct(PDO $pdo){
        parent::__construct($pdo);
    }

    public function create($obj){

        $sql = $this->pdo->prepare("INSERT INTO tbDisco (titulo,path_img) VALUES (?,?)");
        $sql->execute([$obj->getTitulo(),$obj->getPath_img()]);
        $sql->closeCursor();

    }

    public function read(){

        $sql = $this->pdo->prepare("SELECT * FROM tbDisco");
        $sql->execute();
        $query = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        return $query;

    }

    public function update($obj){

        $sql = $this->pdo->prepare("UPDATE tbDisco SET titulo = ?, path_img = ? WHERE id = ?");
        $sql->execute([$obj->getTitulo(),$obj->getPath_img(),$obj->getId()]);
        $sql->closeCursor();

    }

    public function delete($obj){

        $sql = $this->pdo->prepare("DELETE FROM tbDisco WHERE id=?");
        $sql->execute([$obj->getId()]);
        $sql->closeCursor();

    }

    public function readLastX(int $x = 10){

        $sql = $this->pdo->prepare("SELECT * FROM tbDisco ORDER BY id DESC LIMIT :limite");
        $sql->bindValue(":limite",$x,PDO::PARAM_INT);
        $sql->execute();
        $query = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        return $query;

    }

}