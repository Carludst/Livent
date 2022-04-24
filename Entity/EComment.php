<?php

require "EUser.php";

class EComment
{
    private EUser $user;
    private string $text;
    private string $date;
    private string $time;

    /**
     * @param EUser $user
     * @param string $text
     * @param string $date
     * @param string $time
     */
    public function __construct(EUser $user, string $text, string $date, string $time)
    {
        $this->user = $user;
        $this->text = $text;
        $this->date = $date;
        $this->time = $time;
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
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }
}
