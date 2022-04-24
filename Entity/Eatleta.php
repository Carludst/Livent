<?php
class Eatleta {
  private string $name;
  private string $surname;
  private string $birthdate;
  private string $association;
  private string $sport;
  private string $id;


    /**
     * @param string $name
     * @param string $surname
     * @param string $birthdate
     * @param string $association
     * @param string $sport
     * @param string $id
     */
    public function __construct(string $name, string $surname, string $birthdate, string $association, string $sport, string $id)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthdate = $birthdate;
        $this->association = $association;
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
    public function getSurmane() : string
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
      public function setBisthdata($birthdate) : void
      {
          $this->birthdate = $birthdate;
      }

    /**
     * @return string
     */
      public function getAssociation() : string
      {
          return $this->asociation;
      }

    /**
     * @param string $newassociation
     */
      public function setAssociation($newassociation) : void
      {
          $this->association = $newassociation;
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
      public function getId() : string
      {
          return $this->id;
      }

    /**
     * @param string $newid
     */
      public function setId($newid) : void
      {
          $this->id = $newid;
      }
}
?>