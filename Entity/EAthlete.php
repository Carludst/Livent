<?php
class EAthlete {
  private string $name;
  private string $surname;
  private string $birthdate;
  private boll $famale;
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
    public function __construct(string $name, string $surname, string $birthdate, string $famale ,string $team, string $sport, int $id)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthdate = $birthdate;
        $this->gender=$famale;
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
     * @return string
     */
      public function getBirthdate() : string
      {
          return $this->birthdate;
      }

    /**
     * @param string $birthdate
     */
      public function setBirthdata($birthdate) : void
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
     * @param boll $famle
     */
    public function setFamale(boll $famale): void
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
      public function setAssociation($newteam) : void
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
      public function setSport($newsport) : void
      {
          $this->sport = $newsport;
      }

    /**
     * @return string
     */
      public function getId() : int
      {
          return $this->id;
      }


}
?>