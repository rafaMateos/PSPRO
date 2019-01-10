<?php


class LoginModel implements JsonSerializable
{
    private $user;
    private $password;

    /**
     * LoginModel constructor.
     * @param $user
     * @param $password
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }




    //Needed if the properties of the class are private.
    //Otherwise json_encode will encode blank objects
    function jsonSerialize()
    {
        return array(
            'user' => $this->user,
            'password' => $this->password

        );
    }

    public function __sleep(){
        return array('user' , 'password');
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->password;
    }

    /**
     * @param mixed password
     */
    public function setPass($password)
    {
        $this->password = $password;
    }






}