<?php

class Details{
    private $id;
    private $title;
    private $text;
    private $grade;
    private $data;
    private $id_person;
    private $id_adress;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getIdAdress()
    {
        return $this->id_adress;
    }

    /**
     * @param mixed $id_adress
     */
    public function setIdAdress($id_adress)
    {
        $this->id_adress = $id_adress;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getIdPerson()
    {
        return $this->id_person;
    }

    /**
     * @param mixed $id_person
     */
    public function setIdPerson($id_person)
    {
        $this->id_person = $id_person;
    }



}

?>

