<?php

Class User  {
    // +----------+-------------+------+-----+---------+----------------+
    // | Field    | Type        | Null | Key | Default | Extra          |
    // +----------+-------------+------+-----+---------+----------------+
    // | id       | int(11)     | NO   | PRI | NULL    | auto_increment |
    // | username | varchar(50) | NO   |     | NULL    |                |
    // | password | varchar(50) | NO   |     | NULL    |                |
    // +----------+-------------+------+-----+---------+----------------+

    //Attributes
    private $id, $username, $password;

    //Getters
    public function getId() : int {
        return $this->id;
    }
    public function getUsername() : string {
        return $this->username;
    }
    public function getPassword() : string {
        return $this->password;
    }

    //Setters
    public function setId(int $id) {
        $this->id = $id;
    }
    public function setUsername(string $username) {
        $this->username = $username;
    }
    public function setPassword(string $newPassword)    {
        //Hash password
        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        //Write the password
       $this->password = $hashPassword; 
    }

    //Verify password
    public function verifyPassword($verifyPassword) : bool {
        //check password_verify
        return password_verify($verifyPassword, $this->password);
    }

}
