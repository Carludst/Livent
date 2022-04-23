<?php

class EUser
{
    private string $email;
    public string $username;
    private string $password;
    private bool $admin;

    /**
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $username
     * @param string $password
     * @param bool $admin
     */
    public function __construct(string $email, string $username, string $password, bool $admin)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->admin = $admin;
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
     */
    public function setEmail(string $email): void
    {
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
     * @return bool
     */
    public function getAdmin(): bool
    {
        return $this->admin;
    }

    /**
     * @param bool $admin
     */
    public function setAdmin(bool $admin): void
    {
        $this->admin = $admin;
    }

}