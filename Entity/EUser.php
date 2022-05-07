<?php

class EUser
{
    private string $email;
    public string $username;
    private string $password;
    private string $type;

    /**
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $username
     * @param string $password
     * @param string $type
     * @throws Exception
     */
    public function __construct(string $email, string $username, string $password, string $type)
    {
        if(count(explode("@",$email))!=2)throw new Exception("the email passed is invalid");
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @throws Exception
     */
    public function setEmail(string $email): void
    {
        if(count(explode("@",$email))!=2)throw new Exception("the email passed is invalid");
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = hash("sha3-256", $password);
    }

    /**
     * @return String
     */
    public function getType(): String
    {
        return $this->type;
    }

    /**
     * @param String $type
     */
    public function setType(bool $type): void
    {
        $this->admin = $type;
    }

}
