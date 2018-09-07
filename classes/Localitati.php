<?php

    class Localitati{
        private $id;
        private $nume;
        private $id_judet;

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
        public function getIdJudet()
        {
            return $this->id_judet;
        }

        /**
         * @param mixed $id_judet
         */
        public function setIdJudet($id_judet)
        {
            $this->id_judet = $id_judet;
        }


    }

?>