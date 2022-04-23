<?php
class Atleta {
  private $name;
  private $surname;
  private $birthdate;
  private $association;
  private $sport;
  private $id;
    
  public function getName(){
      return 'name';
  }
  public function setName($newname){
      $this->$name = $newname;
  }
  public function getSurmane(){
      return 'surname';
  }
  public function setSurname($newsurname){
      $this->$surname = $newsurname;
  }
  public function getBirthdate(){
      return 'birthdate';
  }
  public function setName($newbirthdate){
      $this->$birthdate = $newbirthdate;
  }
  public function getAssociation(){
      return 'asociation';
  }
  public function setAssociation($newassociation){
      $this->$association = $newassociation;
  }
  public function getSport(){
      return 'sport';
  }
  public function setSport($newsport){
      $this->$sport = $newsport;
  }
  public function getId(){
      return 'id';
  }
  public function setId($newid){
      $this->$id = $newid;
  }
}
?>