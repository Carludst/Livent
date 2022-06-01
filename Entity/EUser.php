<?php

class EUser
{
    private string $email;
    public string $username;
    private string $password;
    private string $type;

    /**
     * @param string $email
     * @param string $username
     * @param string $password
     * @param string $type
     * @throws Exception
     */
    public function __construct(string $email, string $username, string $password, string $type)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))throw new Exception("the email passed is invalid");
        $this->email = $email;
        $this->username = $username;
        $this->password = hash("sha3-256", $password);
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
     * @return void
     * @throws Exception
     */
    public function setEmail(string $email): void
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))throw new Exception("the email passed is invalid");
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
    public function setType(String $type): void
    {
        $this->type = $type;
    }

}
