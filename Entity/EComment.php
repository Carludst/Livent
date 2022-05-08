<?php

require "EUser.php";

class EComment
{
    private EUser $user;
    private string $text;
    private DateTime $dateTime;


    /**
     * @param EUser $user
     * @param string $text
     * @param string $date
     * @param string $time
     */
    public function __construct(EUser $user, string $text, DateTime $dateTime)
    {
        $this->user = $user;
        $this->text = $text;
        $this->dateTime = $dateTime;

    }

    /**
     * @return EUser
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
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
        return $this->dateTime;
    }

    /**
     * @param DateTime $dateTime
     */
    public function setDateTime(DateTime $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

}
