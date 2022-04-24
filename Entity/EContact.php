<?php
class EContact
{
    private String $nome;
    private String $phoneNumber;
    private String $email;

    function __construct(String $nome,String $phoneNumber , String $prefixPhoneNumber="+39" , String $email){
        if(is_numeric($phoneNumber)==false || strlen($phoneNumber)!=10)throw new Exception("phone number must be long 10 digits");
        if(count(explode("@",$email))!=2)throw new Exception("the email passed is invalid");
        if(is_numeric($prefixPhoneNumber)==false )throw new Exception("the prefix passed is invalid");
        elseif(str_starts_with("+",$prefixPhoneNumber)==false||is_numeric(substr($prefixPhoneNumber,1))==false )throw new Exception("the prefix passed is invalid");
        elseif(str_starts_with("+",$prefixPhoneNumber)==false)$prefixPhoneNumber="+".$prefixPhoneNumber;
        $this->email=$email;
        $this->phoneNumber=$prefixPhoneNumber.$phoneNumber;
        $this->nome=$nome;
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
    public function getNome(): string
    {
        return $this->nome;
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
        if(count(explode("@",$email))!=2)throw new Exception("the email passed is invalid");
        $this->email = $email;
    }

    /**
     * @param String $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @param string $phoneNumber
     * @param String $prefixPhoneNumber
     * @return void
     * @throws Exception
     */
    public function setPhoneNumber(string $phoneNumber, String $prefixPhoneNumber="+39"): void
    {
        if(is_numeric($phoneNumber)==false || strlen($phoneNumber)!=10)throw new Exception("phone number must be long 10 digits");
        if(is_numeric($prefixPhoneNumber)==false )throw new Exception("the prefix passed is invalid");
        elseif(str_starts_with("+",$prefixPhoneNumber)==false||is_numeric(substr($prefixPhoneNumber,1))==false )throw new Exception("the prefix passed is invalid");
        elseif(str_starts_with("+",$prefixPhoneNumber)==false)$prefixPhoneNumber="+".$prefixPhoneNumber;
        $this->phoneNumber=$prefixPhoneNumber.$phoneNumber;
    }
}
