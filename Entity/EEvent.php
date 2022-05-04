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

    /**
     * @return string
     */
    public function getName(): string
    {
      return $this->name;
    }

    /**
     * @param String $newname
     * @return void
     */
    public function setName(String $newname): void
    {
      $this->name = $newname;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
      return $this->description;
    }

    /**
     * @param String $newdescr
     * @return void
     */
    public function setDescription(String $newdescr): void
    {
      $this->description = $newdescr;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
      return $this->place;
    }

    /**
     * @param String $newplace
     * @return void
     */
    public function setPlace(String $newplace): void
    {
      $this->place = $newplace;
    }

    /**
     * @return array
     */
    public function getCompetitions(): Array
    {
      return $this->competitions;
    }

    /**
     * @param array $newcompetition
     * @return void
     */
    public function setCompetitions(Array $newcompetition): void
    {
        $this->competition = $newcompetition;
    }

    /**
     * @param int $index
     * @return string
     */
    public function getCompetition(int $index): string
    {
      return $this->competitions[$index];
    }

    /**
     * @param ECompetition $competition
     * @return void
     */
    public function addCompetition(ECompetition $competition): void
    {
        array_push($this->competitions, $competition);
    }

    /**
     * @param ECompetition|int $competition
     * @return void
     */
    public function popCompetition(ECompetition|int $competition): void
    {
        if(is_int($competition)==false)$index=array_search($competition,$this->competitions);
        else $index=$competition;
        array_slice($this->competitions,$index,1);
    }


    /**
     * @return array
     */
    public function getContacts(): Array
    {
      return $this->contacts;
    }

    /**
     * @param array $newcontact
     * @return void
     */
    public function setContacts(Array $newcontact): void{
      $this->contacts = $newcontact;
    }

    /**
     * @param EContact $contact
     * @return void
     */
    public function addContact(EContact $contact): void
    {
        array_push($this->contacts, $contact);
    }


    /**
     * @param EContact $contacts
     * @return void
     */
    public function popContact(EContact $contacts): void
    {
        if(is_int($contacts)==false)$index=array_search($contacts,$this->contacts);
        else $index=$contacts;
        array_slice($this->contacts,$index,1);
    }


    /**
     * @return bool
     */
    public function getPublic(): bool
    {
      return $this->public;
    }

    /**
     * @param bool $newpublic
     * @return void
     */
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
    /**
     * @return EUser
     */
    public function getOrganizer(): EUser
    {
      return $this->organizer;
    }

    /**
     * @param EUser $neworganizer
     * @return void
     */
    public function setOrganizer(EUser $neworganizer): void
    {
      $this->organizer =  $neworganizer;
    }



}
?>
