<?php
class EEvent{
    private String $name;
    private String $description;
    private String $place;
    private Array $competitions;
    private Array $contacts;
    private bool $public;
    private EUser $organizer;
    //comments
    
    public function __construct(String $name, String $place, EUser $organizer, bool $public=false, String $description="",Array $competitions =array(), Array $contacts=array())
    {
        $this->name = $name;
        $this->description = $description;
        $this->place = $place;
        $this->competitions = $competitions;
        $this->contacts = $contacts;
        $this->public = $public;
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
      $this->place = $newplace;
    }


    public function getCompetitions(): Array
    {
      return $this->competitions;
    }

    public function setCompetitions(Array $newcompetition): void
    {
        $this->competition = $newcompetition;
    }


    public function getCompetition(int $index): string
    {
      return $this->competitions[$index];
    }


    public function addCompetition(ECompetition $competition): void
    {
        array_push($this->competitions, $competition);
    }


    public function popCompetition(ECompetition|int $competition): void
    {
        if(is_int($competition)==false)$index=array_search($competition,$this->competitions);
        else $index=$competition;
        array_slice($this->competitions,$index,1);
    }



    public function getContacts(): Array
    {
      return $this->contacts;
    }


    public function setContacts(Array $newcontact): void{
      $this->contacts = $newcontact;
    }


    public function addContact(EContact $contact): void
    {
        array_push($this->contacts, $contact);
    }



    public function popContact(EContact $contacts): void
    {
        if(is_int($contacts)==false)$index=array_search($contacts,$this->contacts);
        else $index=$contacts;
        array_slice($this->contacts,$index,1);
    }



    public function getPublic(): bool
    {
      return $this->public;
    }


    public function setPublic(bool $newpublic): void
    {
      $this->public = $newpublic;
    }

    /*
    public function getComments(): EComment
    {
      //prenderlo dal db
    }
    */
    public function getOrganizer(): EUser
    {
      return $this->organizer;
    }

    public function setOrganizer(EUser $neworganizer): void
    {
      $this->organizer =  $neworganizer;
    }


    
}
?>
