<?php
// Person superclass
abstract class Person {
    protected $username;
    protected $password;
    protected $phone;
    protected $email;
    protected $id;
    protected $country;
    protected $city;
    //Remove: phone,email,id,country,city
    // this will affect constructor..

    // Constructor
    public function __construct($username, $password, $phone, $email, $country, $city) {
        $this->username = $username;
        $this->password = $password;
        $this->phone = $phone;
        $this->email = $email;
        $this->country = $country;
        $this->city = $city;
    }

    // Abstract methods
    abstract public function setName($name);
    abstract public function setPassword($password);
    abstract public function setId($id);
    abstract public function checkName($name);
    abstract public function checkPassword($password);
    abstract public function checkId($id);
    abstract public function incorrectNamePass();
    //abstract public function forgetPass();
    // remove set id,checkid
}
?>
