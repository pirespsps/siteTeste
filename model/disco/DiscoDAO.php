<?php
require_once __DIR__ . "/../genericDAO/GenericDAO.php";
require_once "Disco.php";

class DiscoDAO extends GenericDAO{

    public function __construct(PDO $pdo){
        parent::__construct($pdo);
    }

    public function create($obj){

        $sql = $this->pdo->prepare("INSERT INTO tbDisco (titulo,banda,ano,path_img) VALUES (?,?,?,?)");
        $sql->execute([$obj->getTitulo(),$obj->getBanda(),$obj->getAno(),$obj->getPath_img()]);
        $sql->closeCursor();

    }

    public function read(){

        $sql = $this->pdo->prepare("SELECT * FROM tbDisco");
        $sql->execute();
        $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        $fetchObj = [];
        foreach($fetch as $ar){
            array_push($fetchObj,Disco::fill($ar));
        }

        return $fetchObj;

    }

    public function update($obj){

        $sql = $this->pdo->prepare("UPDATE tbDisco SET titulo = ?,banda = ?,ano = ?, path_img = ? WHERE id = ?");
        $sql->execute([$obj->getTitulo(),$obj->getBanda(),$obj->getAno(),$obj->getPath_img(),$obj->getId()]);
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
        $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        $fetchObj = [];
        foreach($fetch as $ar){
            array_push($fetchObj,Disco::fill($ar));
        }

        return $fetchObj;

    }
    public function searchById($id){

        $sql = $this->pdo->prepare("SELECT * FROM tbDisco WHERE id = ? ");
        $sql->execute([$id]);
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        $fetchObj = Disco::fill($fetch);

        return $fetchObj;
    }

}