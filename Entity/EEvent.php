<?php

class EEvent{
    private int $id;
    private String $name;
    private String $description;
    private String $place;
    private bool $public;
    private EUser $organizer;
    //comments

    public function __construct(String $name, String $place, EUser $organizer, bool $public=false, String $description="",int $id=-1)
    {
        $this->name = $name;
        $this->description = $description;
        $this->place = $place;
        $this->public = $public;
        $this->organizer = $organizer;
        $this->id=$id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id=$id;
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
        return FDbH::getCompetitions($this);
    }

    /**
     * @param array $newcompetition
     * @return void
     */
    public function setCompetitions(Array $newcompetition): void
    {
        $competitionDelete=FDbH::getCompetitions($this);
        foreach ($competitionDelete as $value){
            FDbH::deleteOne($value->getId(),$value::class);
        }
        foreach ($newcompetition as $value){
            FDbH::store($value,$this->getId());
        }
    }

    /**
     * @param int $index
     * @return ECompetition
     */
    public function getCompetition(int $index): ECompetition
    {
        $competitions=FDbH::getCompetitions($this);
        return $competitions[$index];
    }

    /**
     * @param ECompetition $competition
     * @return void
     */
    public function addCompetition(ECompetition $competition): void
    {
        FDbH::store($competition,$this->getId());
    }

    /**
     * @param ECompetition|int $competition
     * @return void
     */
    public function popCompetition(ECompetition|int $competition): void
    {
        if(is_int($competition)){
            FDbH::deleteOne($this->getCompetition($competition)->getId(),$this->getCompetition($competition)::class);
        }
        else{
            FDbH::deleteOne($competition->getId(),$competition::class);
        }
    }


    /**
     * @return array
     */
    public function getContacts(): Array
    {
        return FDbH::getContacts($this);
    }

    public function getContact(int $index): ECompetition
    {
        $contacts=FDbH::getContacts($this);
        return $contacts[$index];
    }

    /**
     * @param array $newcontact
     * @return void
     */
    public function setContacts(Array $newcontact): void
    {
        $competitionDelete=FDbH::getContacts($this);
        foreach ($competitionDelete as $value){
            FDbH::deleteOne($value->getId(),$value::class);
        }
        foreach ($newcontact as $value){
            FDbH::store($value,$this->getId());
        }

    }

    /**
     * @param EContact $contact
     * @return void
     */
    public function addContact(EContact $contact): void
    {
        FDbH::store($contact,$this->getId());
    }


    /**
     * @param EContact|int $contact
     * @return void
     */
    public function popContact(EContact|int $contact): void
    {
        if(is_int($contact)){
            FDbH::deleteOne($this->getContact($contact)->getId(),$this->getContact($contact)::class);
        }
        else{
            FDbH::deleteOne($contact->getId(),$contact::class);
        }
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


    public function getComments(): Array
    {
      return FDbH::getComments($this);
    }

    public function addComment(EComment $comment):void
    {
        FDbH::store($comment,$this->getId());
    }

    public function getComment(int $index):EComment
    {
        $comments=FDbH::getComments($this);
        return $comments[$index];
    }

    public function popComment(EComment|int $comment):void
    {
        if(is_int($comment)){
            FDbH::deleteOne($this->getComment($comment)->getId(),$this->getComment($comment)::class);
        }
        else{
            FDbH::deleteOne($comment->getId(),$comment::class);
        }

    }
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
