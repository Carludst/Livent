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
    
    public function __construct(String $name, String $place, EContact $array(), EComment $array(), EUser $organizer, String $description="", ECompetition $array() = $array[], bool $audience=false)
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
    public function setName(String $newname): void
    {
      $this->name = $newname;
    }
    public function getDescription(): string
    {
      return $this->description;
    }
    public function setDescription(String $newdescr): void
    {
      $this->description = $newdescr;
    }
    public function getPlace(): string
    {
      return $this->place;
    }
    public function setPlace(String $newplace): void
    {
      $this->place = $place;
    }
    public function getCompetitions(): string
    {
      return $this->competition;
    }
    public function setCompetitions(String $newcompetition): void
    {
      $this->competition = $newcompetition;
    }
    public function getContact(): EContact
    {
      return $this->contact;
    }
    public function setContact(EContact $newcontact): void{
      $this->contact = $newcontact;
    }
    public function getAudience(): bool
    {
      return $this->audience;
    }
    public function setAudience(bool $newaudience): void
    {
      $this->audience = $newaudience;
    }
    
    public function getComments(): EComment
    {
      return $this->comments;
    }
    public function setComments(EComment $newcomments): void
    {
      $this->comments = $newcomments;
    }
    public function getOrganizer(): EUser
    {
      return $this->organizer;
    }
    public function setOrganizer(EUser $neworganizer): void
    {
      $this->organizer = $neworganizer;
    }
    public function addCompetition(ECompetition $competition): void
    {
        array_push($this->competitions, $competition);
    }
    public function popCompetition(ECompetition $competition): void
    {
        unset($this->competitions[$competition->getId()]);
    }
    public function addContact(EContact $contact): void
    {
        array_push($this->contacts, $contact);
    }
    public function popContact(EContact $contacts): void
    {
        unset($this->contacts[$contact->getId()]);
    }
    public function addComment(EComment $comment): void
    {
        array_push($this->comments, $comment);
    }
    public function popComment(EComment $comment): void
    {
        unset($this->comments[$comment->getId()]);
    }   
}
?>
