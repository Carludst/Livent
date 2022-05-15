<?php
class EAthlete {
  private string $name;
  private string $surname;
  private DateTime $birthdate;
  private bool $famale;
  private string $team;
  private string $sport;
  private int $id;


    /**
     * @param string $name
     * @param string $surname
     * @param string $birthdate
     * @param string $team
     * @param string $sport
     * @param int $id
     */
    public function __construct(string $name, string $surname, DateTime $birthdate, string $famale ,string $team="", string $sport="", int $id=-1)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthdate = $birthdate;
        $this->famale=$famale;
        $this->team = $team;
        $this->sport = $sport;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname() : string
    {
      return $this->surname;
    }

    /**
     * @param  string $suname
     */
      public function setSurname($surname) : void
      {
          $this->$surname = $surname;
      }

    /**
     * @return DateTime
     */
      public function getBirthdate() : DateTime
      {
          return $this->birthdate;
      }

    /**
     * @param DateTime $birthdate
     */
      public function setBirthdata(DateTime $birthdate) : void
      {
          $this->birthdate = $birthdate;
      }

    /**
     * @return string
     */
    public function getFamale(): bool
    {
        return $this->famale;
    }

    /**
     * @param bool $famle
     */
    public function setFamale(bool $famale): void
    {
        $this->famle = $famale;
    }

    /**
     * @return string
     */
      public function getTeam() : string
      {
          return $this->team;
      }

    /**
     * @param string $newteam
     */
      public function setTeam(String $newteam) : void
      {
          $this->team = $newteam;
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
      public function setSport(String $newsport) : void
      {
          $this->sport = $newsport;
      }

    /**
     * @return int
     */
      public function getId() : int
      {
          return $this->id;
      }


}
?>