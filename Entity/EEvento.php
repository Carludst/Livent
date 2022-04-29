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
    
    public __construct(String $name, String $place, Contatto[] $contacts, Commento[] $comments, Utente $organizer, String $description="",Competizione[] $competitions=[], bool $audience=false)
    {
        $this->name = $name;
        $this->description = $description;
        $this->place = $place;
        $this->competitions = $competitions;
        $this->contacts = $contacts;
        $this->audience = $audience;
        $this->comments = $comments;
        $this->organizer = $organizer;
    }
    
    public function getName(): string
    {
      return $this->name;
    }
    public function setName($newname): void
    {
      $this->name = $newname;
    }
    public function getDescription(): string
    {
      return $this->description;
    }
    public function setDescription($newdescr): void
    {
      $this->description = $newdescr;
    }
    public function getPlace(): string
    {
      return $this->place;
    }
    public function setPlace($newplace): void
    {
      $this->place = $place;
    }
    public function getCompetitions(): string
    {
      return $this->competition;
    }
    public function setCompetitions($newcompetition): void
    {
      $this->competition = $newcompetition;
    }
    public function getContact(): Contatto
    {
      return $this->contact;
    }
    public function setContact($newcontact): void{
      $this->contact = $newcontact;
    }
    public function getAudience(): bool
    {
      return $this->audience;
    }
    public function setAudience($newaudience): void
    {
      $this->audience = $newaudience;
    }
    
    public function getComments(): Commento
    {
      return $this->comments;
    }
    public function setComments($newcomments): void
    {
      $this->comments = $newcomments;
    }
    public function getOrganizer(): Utente
    {
      return $this->organizer;
    }
    public function setOrganizer($neworganizer): void
    {
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
