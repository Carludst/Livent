<?php
class EContact
{
    private int $id;
    private String $name;
    private String $phoneNumber;
    private String $email;

    function __construct(String $name,String $phoneNumber , String $email,int $id=-1){
        $this->id=$id;
        $this->email=$email;
        $this->phoneNumber=$phoneNumber;
        $this->name=$name;
    }

    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id)
    {
        $this->id=$id;
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
