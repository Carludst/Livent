<?php
require_once "EDistance.php";

class ECompetition{
    private string $name;
    private string $date;
    private string $time;
    private string $description;
    private string $gender;
    //private string $competitors;
    private string $sport;
    private EDistance $distance;


    /**
     * @return string
     */
    public function  __construct(String $name, String $date, String $time, String $gender, String $sport, EDistance $distance, String $description=" ")
    {
        $this->name = $name;
        $this->date = $date;
        $this->time = $time;
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
     * @return string
     */
    public function getDate() : string
    {
      return $this->date;
    }

    /**
     * @param string $newdate
     */
    public function setDate(string $newdate) : void
    {
      $this->date = $newdate;
    }

    /**
     * @return string
     */
     public function getTime() : string
     {
      return $this->time;
    }

    /**
     * @param string $newtime
     */
    public function setTime(string $newtime) : void
    {
      $this->time = $newtime;
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
     * @return string
     */
     public function getDistance() : string
     {
      return $this->distance;
     }

    /**
     * @param string $newdistance
     */
    public function setDistance(string $newdistance) : void
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
