<?php
require_once "EDistance.php";
require_once "EAthlete.php";

class ECompetition{
    private int $id;
    private string $name;
    private DateTime $dateTime;
    private string $description;
    private string $gender;
    private string $sport;
    private EDistance $distance;


    /**
     * @param String $name
     * @param DateTime $dateTime
     * @param String $gender
     * @param String $sport
     * @param EDistance $distance
     * @param String $description
     * @param int $id
     */
    public function  __construct(String $name, DateTime $dateTime, String $gender, String $sport, EDistance $distance, String $description="",int $id=-1)
    {
        $this->name = $name;
        $this->dateTime = $dateTime;
        $this->description = $description;
        $this->gender = $gender;
        $this->sport = $sport;
        $this->distance = $distance;
        $this->id=$id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id)
    {
        $this->id=$id;
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
     * @param EAthlete $athlete
     * @param EUser $iscriber
     * @return bool|null
     */
    public function addRegistration(EAthlete $athlete , EUser $iscriber) :?bool
    {
        return FDbH::addRegistrationCompetition($this,$athlete,$iscriber);
    }

    /**
     * @param EAthlete $athlete
     * @param ETime $time
     * @return bool|null
     */
    public function addResult(EAthlete $athlete , ETime $time):?bool
    {
        return FDbH::addResultCompetition($this,$athlete,$time);
    }

    /**
     * @param EAthlete $athlete
     * @return bool
     */
    public function popCompetitor(EAthlete $athlete) : bool
    {
        return FDbH::deleteCompetitorCompetition($this,$athlete);
    }

    /**
     * @return array
     */
    public function getRegistrations() : Array
    {
        return FDbH::getRegistrationsCompetition($this);
    }

    /**
     * @return array
     */
    public function getClassification() : Array
    {
        return FDbH::getClassificationCompetition($this);
    }


}
?>
