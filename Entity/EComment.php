<?php

require "EUser.php";

class EComment
{
    private int $id;
    private EUser $user;
    private string $text;


    /**
     * @param EUser $user
     * @param string $text
     * @param string $time
     */
    public function __construct(EUser $user, string $text, int $id=-1)
    {
        $this->user = $user;
        $this->text = $text;
        $this->id=$id;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return EUser
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param EUser $user
     */
    public function setUser(EUser $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return DateTime
     */
    public function getDateTime(): DateTime
    {
        return FComment::getDateTime($this);
    }

}
