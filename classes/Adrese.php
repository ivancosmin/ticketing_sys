<?php

class Adrese{

    private $id;
    private $nume;
    private $id_localitate;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNume()
    {
        return $this->nume;
    }

    /**
     * @param mixed $nume
     */
    public function setNume($nume)
    {
        $this->nume = $nume;
    }

    /**
     * @return mixed
     */
    public function getIdLocalitate()
    {
        return $this->id_localitate;
    }

    /**
     * @param mixed $id_localitate
     */
    public function setIdLocalitate($id_localitate)
    {
        $this->id_localitate = $id_localitate;
    }


}

?>