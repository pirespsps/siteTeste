<?php
class Disco{
    private int $id;
    private string $titulo;
    private string $banda;
    private int $ano;
    private string $path_img;
    
    public static function fill($ar){
        $instance = new self();

        isset($ar["id"]) ? $instance->setId($ar['id']) : null;
        $instance->setTitulo($ar['titulo']);
        $instance->setBanda($ar['banda']);
        $instance->setAno($ar['ano']);

        $instance->setPath_img($ar['path_img']);
    
        return $instance;
    }

    public function getBanda()
    {
        return $this->banda;
    }

    public function setBanda($banda)
    {
        $this->banda = $banda;

    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

    }

    public function getPath_img()
    {
        return $this->path_img;
    }

    public function setPath_img($path_img)
    {
        $this->path_img = $path_img;

    }
}