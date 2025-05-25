<?php
require_once __DIR__ . "/../genericDAO/GenericDAO.php";
require_once __DIR__ . "/../disco/Disco.php";
require_once "Track.php";

class TrackDAO extends GenericDAO
{

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    public function create($obj)
    {

        $sql = $this->pdo->prepare("INSERT INTO tbTrack (nome,disco) VALUES (?,?)");
        $sql->execute([$obj->getNome(), $obj->getDisco()->getId()]);
        $sql->closeCursor();

    }

    public function createMultiple($objArray,int $discoId)
    {
        $params = [];
        $sqlString = "INSERT INTO tbTrack(nome,disco) VALUES ";

        for ($i = 0; $i < sizeof($objArray); $i++) {
            
            $sqlString .= ($i != sizeof($objArray)-1)? "(:track$i,:disco$i)," : "(:track$i,:disco$i)";
            $params[":track$i"] = $objArray[$i]->getNome();
            $params[":disco$i"] = $discoId;
        }

        $sql = $this->pdo->prepare($sqlString);

        foreach($params as $key=>$value){
            $sql->bindValue($key,$value,is_int($value)? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $sql->execute();

        $sql->closeCursor();
    }

    public function read()
    {

        $sql = $this->pdo->prepare("SELECT * FROM tbTrack");
        $sql->execute();
        $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        $fetchObj = [];

        foreach ($fetch as $ar) {
            array_push($fetchObj, Track::fill($ar));
        }

        return $fetchObj;

    }

    public function update($obj)
    {

        $sql = $this->pdo->prepare("UPDATE tbTrack SET nome = ?, disco = ? WHERE id = ?");
        $sql->execute([$obj->getNome(), $obj->getDisco()->getId(), $obj->getId()]);
        $sql->closeCursor();

    }

    public function delete($obj)
    {

        $sql = $this->pdo->prepare("DELETE FROM tbTrack WHERE id=?");
        $sql->execute([$obj->getId()]);
        $sql->closeCursor();

    }

    public function searchById($id)
    {

        $sql = $this->pdo->prepare("SELECT * FROM tbTrack WHERE id = ? ");
        $sql->execute([$id]);
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        $fetchObj = Track::fill($fetch);

        return $fetchObj;
    }

    public function searchFromDiscoId(Disco $disco)
    {

        $sql = $this->pdo->prepare("SELECT tbTrack.* FROM tbDisco 
	                                INNER JOIN tbTrack ON tbDisco.id = tbTrack.disco
                                    WHERE tbDisco.id = ?;");
        $sql->execute([$disco->getId()]);
        $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql->closeCursor();

        $fetchObj = [];
        foreach ($fetch as $ar) {
            array_push($fetchObj, Track::fill($ar, $disco));
        }

        return $fetchObj;
    }

}