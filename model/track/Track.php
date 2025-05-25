<?php
require_once(__DIR__ . "/../disco/Disco.php");
require_once(__DIR__ . "/../disco/DiscoDAO.php");
require_once(__DIR__ . "/../../config/DataBaseAccess.php");

class Track{
    private int $id;
    private string $nome;
    private Disco $disco;


    public static function fillForm($nome){
        $instance = new self();

        $instance->setNome($nome);
        return $instance;
    }
    public static function fill($ar, $disco = null){
        $instance = new self();

        isset($ar["id"]) ? $instance->setId($ar['id']) : null;
        $instance->setNome($ar['nome']);

        if($disco == null){
            $discoDao = new DiscoDAO(DatabaseAccess::getPDO());
            $disco = Disco::fill($discoDao->searchById($ar['disco']));
        }

        $instance->setDisco($disco);

        return $instance;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

    }
    public function getDisco()
    {
        return $this->disco;
    }

    public function setDisco($disco)
    {
        $this->disco = $disco;

    }

}