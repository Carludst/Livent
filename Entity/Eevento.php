<?php
class Evento{
    private $name;
    private $description;
    private $place;
    private $competitions;
    private $contacts;
    private $audience;
    private $comments;
    private $organizer;
    
    public __construct($name, $description, $place, $competitions, $contacts, $audience, $comments, $organizer)
    {
        $this->name = $name;
        $this->description = $description;
        $this->place = $place;
        $this->cometitions = $competitions;
        $this->contacts = $contacts;
        $this->audience = $audience;
        $this->comments = $comments;
        $this->organizer = $organizer;
    }
    
    public function getName(){
      return 'name';
    }
    public function setName($newname){
      $this->name = $newname;
    }
    public function getDescription(){
      return 'description';
    }
    public function setDescription($newdescr){
      $this->description = $newdescr;
    }
    public function getPlace(){
      return 'place';
    }
    public function setPlace($newplace){
      $this->place = $place;
    }
    public function getCompetitions(){
      return 'competition';
    }
    public function setCompetitions($newcompetition){
      $this->competition = $newcompetition;
    }
    public function getContact(){
      return 'contact';
    }
    public function setContact($newcontact){
      $this->contact = $newcontact;
    }
    public function getAudience(){
      return 'audience';
    }
    public function setAudience($newaudience){
      $this->audience = $newaudience;
    }
    
    public function getComments(){
      return 'comments';
    }
    public function setComments($newcomments){
      $this->comments = $newcomments;
    }
    public function getOrganizer(){
      return 'organizer';
    }
    public function setOrganizer($neworganizer){
      $this->organizer = $neworganizer;
    }
    public function addCompetition($competition){
        array_push($this->competitions, $competition);
    }
    public function popCompetition($competition){
        unset($this->competitions[$competition->getId()]);
    }
    public function addCompetition($contact){
        array_push($this->contacts, $contact);
    }
    public function popCompetition($contacts){
        unset($this->contacts[$contact->getId()]);
    }
    public function addComment($comment){
        array_push($this->comments, $comment);
    }
    public function popCompetition($comment){
        unset($this->comments[$comment->getId()]);
    }   
}
?>