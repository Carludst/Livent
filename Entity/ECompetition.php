<?php
require_once "EDistance.php";

class ECompetition{
    private string $name;
    private DateTime $dateTime;
    private string $description;
    private string $gender;
    //private string $competitors;
    private string $sport;
    private EDistance $distance;


    /**
     * @return string
     */
    public function  __construct(String $name, DateTime $dateTime, String $gender, String $sport, EDistance $distance, String $description="")
    {
        $this->name = $name;
        $this->dateTime = $dateTime;
        $this->description = $description;
        $this->gender = $gender;
        $this->sport = $sport;
        $this->distance = $distance;
    }
        
    public function getName() : string
    {
      return $this->name;
    }

    /**
     * @param string $newname
     */
    public function setName(string $newname) : void
    {
      $this->name = $newname;
    }

    /**
     * @return DateTime
     */
    public function getDateTime() : DateTime
    {
      return $this->dateTime;
    }

    /**
     * @param DateTime $newDateTime
     */
    public function setDate(DateTime $newDateTime) : void
    {
      $this->dateTime = $newDateTime;
    }

    /**
     * @return string
     */
     public function getDescription() : string
     {
      return $this->description;
    }

    /**
     * @param string $newdescription
     */
    public function setDescription(string $newdescription) : void
    {
      $this->description = $newdescription;
    }

    /**
     * @return string
     */
     public function getGender() : string
     {
      return $this->gender;
     }

    /**
     * @param string $newgenere
     */
    public function setGender(string $newgender) : void
    {
      $this->gender = $newgender;
    }

    /*
     public function getCompetitors() : string
     {
      return $this->competitors;
     }
    */

    /*
    public function setConpetitors(string $newcompetitors) : void
    {
      $this->competitors = $newcompetitors;
    }
    */

    /**
     * @return string
     */
     public function getSport() : string
     {
      return $this->sport;
     }

    /**
     * @param string $newsport
     */
    public function setSport(string $newsport) : void
    {
      $this->sport = $newsport;
    }

    /**
     * @return EDistance
     */
     public function getDistance() : EDistance
     {
      return $this->distance;
     }

    /**
     * @param EDistance $newdistance
     */
    public function setDistance(EDistance $newdistance) : void
    {
      $this->distance = $newdistance;
    }

    /**
    public function addCompetitors(EAtleta $atleta, EAtleta $atleti) : EAtleta
    {
        array_push($atleti, $atleta);
    }

    public function popCompetitors(EAtleta $atleta, EAtleta $atleti) : void
    {
        unset($atleti[$atleta->getId()]);
    }
    */
}
?>
