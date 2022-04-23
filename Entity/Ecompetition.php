<?php
class Competizione{
    private $name;
    private $date;
    private $time;
    private $description;
    private $genere;
    private $competitors;
    private $sport;
    private $distance;
    
    public function getName(){
      return 'name';
    }
    public function setName($newname){
      $this->$name = $newname;
    }
    public function getDate(){
      return 'date';
    }
    public function setDate($newdate){
      $this->$date = $newdate;
    }
     public function getTime(){
      return 'time';
    }
    public function setTime($newtime){
      $this->$time = $newtime;
    }
     public function getDescription(){
      return 'description';
    }
    public function setDescription($newdescription){
      $this->$description = $newdescription;
    }
     public function getGenere(){
      return 'genere';
    }
    public function setGenere($newgenere){
      $this->$genere = $newgeneres;
    }
     public function getCompetitors(){
      return 'competitors';
    }
    public function setConpetitors($newcompetitors){
      $this->$competitors = $newcompetitors;
    }
     public function getSport(){
      return 'sport';
    }
    public function setSport($newsport){
      $this->$sport = $newsport;
    }
     public function getDistance(){
      return 'distance';
    }
    public function setDistance($newdistance){
      $this->$distance = $newdistance;
    }
    public function addCompetitors($atleta,$atleti){
        array_push($atleti, $atleta);
    }
    public function popCompetitors($atleta, $atleti){
        unset($atleti[$atleta->getId()]);
    }
}
?>