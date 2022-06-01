<?php
class EContact
{
    private int $id;
    private String $name;
    private String $phoneNumber;
    private String $email;

    function __construct(String $name,String $phoneNumber , String $email,int $id=-1){
        $phoneFields=array();
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))throw new Exception("the email passed is invalid");
        $this->setPhoneNumber($phoneNumber);
        $this->id=$id;
        $this->email=$email;
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
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))throw new Exception("the email passed is invalid");
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
        if(!preg_match('/^(\+\d+)?(\d{3})(\d{3})(\d{4})$/',$phoneNumber,$phoneFields))throw new Exception("the phonenumber passed is invalid");
        if(!str_contains($phoneNumber,"+"))$phoneNumber="+39";
        else $phoneNumber=$phoneFields[1];
        for($i=2;$i<count($phoneFields);$i++)$phoneNumber=$phoneNumber." ".$phoneFields[$i];
        $this->phoneNumber=$phoneNumber;
    }
}
