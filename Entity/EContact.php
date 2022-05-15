<?php
class EContact
{
    private String $name;
    private String $phoneNumber;
    private String $email;

    function __construct(String $name,String $phoneNumber , String $email){
        $this->email=$email;
        $this->phoneNumber=$phoneNumber;
        $this->name=$name;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return String
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $email
     * @return void
     * @throws Exception
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param String $name
     */
    public function setNome(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $phoneNumber
     * @param String $prefixPhoneNumber
     * @return void
     * @throws Exception
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber=$phoneNumber;
    }
}
