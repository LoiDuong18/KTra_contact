<?php
class User
{
    var $userName;
    var $passWord;
    var $fullName;
    function User($userName, $passWord, $fullName)
    {
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->fullName = $fullName;
    }
    static function authentication($userName, $pw)
    {
        if ($userName == "Loi1234" && $pw == "123")
            return new User($userName, $pw, "Boon");
        return null;
    }
}
