<?php


class LoginModel implements JsonSerializable
{
    private $user;
    private $pass;

    /**
     * LoginModel constructor.
     * @param $user
     * @param $pass
     */
    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }




    //Needed if the properties of the class are private.
    //Otherwise json_encode will encode blank objects
    function jsonSerialize()
    {
        return array(
            'user' => $this->user,
            'pass' => $this->pass

        );
    }

    public function __sleep(){
        return array('user' , 'pass');
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
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }






}