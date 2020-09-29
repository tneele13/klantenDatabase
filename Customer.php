<?php


class Customer  {

    var $klantId;
    var $voornaam;
    var $achternaam = "onbekend";
    var $email = "onbekend";
    var $telefoon = 0;
    var $kenteken = "onbekend";
    var $factuur = 0;
    var $merk = "onbekend";
    var $type = "onbekend";
    var $werkzaamheden = array("");


    /**
     * Customer constructor.
     * @param $klantId
     * @param $voornaam
     * @param $achternaam
     * @param $email
     * @param $telefoon
     * @param $kenteken
     * @param $factuur
     * @param $merk
     * @param $type
     * @param $werkzaamheden
     */
    public function __construct($klantId, $voornaam, $achternaam, $email, $telefoon, $kenteken, $factuur, $merk, $type, $werkzaamheden)
    {
        $this->klantId = $klantId;
        if (!empty($voornaam)) {
            $this->voornaam = $voornaam;
        }
        if (!empty($achternaam)) {
            $this->achternaam = $achternaam;
        }
        if (!empty($email)) {
            $this->email = $email;
        }
        if (!empty($telefoon)) {
            $this->telefoon = $telefoon;
        }
        if (!empty($kenteken)) {
            $this->kenteken = $kenteken;
        }
        if (!empty($factuur)) {
            $this->factuur = $factuur;
        }
        if (!empty($merkt)) {
            $this->merk = $merk;
        }
        if (!empty($type)) {
            $this->type = $type;
        }
        if (!empty($werkzaamheden)) {
            //var_dump($this->werkzaamheden);
           // echo print_r($this->werkzaamheden);
            $array = $this->werkzaamheden;
            array_push($array, $werkzaamheden);

            $this->werkzaamheden = $array;
        }

    }

    /**
     * @return mixed
     */
    public function getKlantId()
    {
        return $this->klantId;
    }

    /**
     * @param mixed $klantId
     */
    public function setKlantId($klantId): void
    {
        $this->klantId = $klantId;
    }



    /**
     * @return mixed
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * @param mixed $voornaam
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;
    }

    /**
     * @return mixed
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * @param mixed $achternaam
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefoon()
    {
        return $this->telefoon;
    }

    /**
     * @param mixed $telefoon
     */
    public function setTelefoon($telefoon)
    {
        $this->telefoon = $telefoon;
    }

    /**
     * @return mixed
     */
    public function getKenteken()
    {
        return $this->kenteken;
    }

    /**
     * @param mixed $kenteken
     */
    public function setKenteken($kenteken)
    {
        $this->kenteken = $kenteken;
    }

    /**
     * @return mixed
     */
    public function getFactuur()
    {
        return $this->factuur;
    }

    /**
     * @param mixed $factuur
     */
    public function setFactuur($factuur)
    {
        $this->factuur = $factuur;
    }

    /**
     * @return mixed
     */
    public function getMerk()
    {
        return $this->merk;
    }

    /**
     * @param mixed $merk
     */
    public function setMerk($merk)
    {
        $this->merk = $merk;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getWerkzaamheden()
    {
        return $this->werkzaamheden;
    }

    /**
     * @param array $werkzaamheden
     */
    public function setWerkzaamheden($werkzaamheden)
    {
        $array = $this->werkzaamheden;
        array_push($array, $werkzaamheden);

        $this->werkzaamheden = $array;
    }




    public function toString(){
        echo "Voornaam: " . $this->voornaam . "<br>" . "Achternaam: " . $this->achternaam . "<br>" . "E-mail: " . $this->email . "<br>" . "Telefoonnummer: " . $this->telefoon . "<br>" .  "Kenteken: " . $this->kenteken . "<br>" . "Factuur nummer: " .  $this->factuur . "<br>" . "Merk: " .  $this->merk . "<br>" . "Type: " . $this->type;// . " " . print_r($this->getWerkzaamheden());
        //echo $this->printArray();
    }







}