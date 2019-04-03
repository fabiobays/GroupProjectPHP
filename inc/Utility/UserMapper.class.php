<?php

class UserMapper    {
    
    //A place to store our DB connection
    private static $db;

    //This function to initiialize the PDO Agent with the user class
    static function initialize() {
        self::$db = new PDOAgent('User');
    }

    //This function gets the user by username
    static function getUserbyName(string $username) {
        $query = "select * from user where username = :username;";
        self::$db->query($query);
        self::$db->bind(':username', $username);
        $user = self::$db->singleResult();
        if($user) return $user;
        else return null;
    }

    static function registerUser(User $newUser) : bool {
        //SQL Query
        try {
            $query = "insert into user (username, password) values (:username, :password);";
            self::$db->query($query);
            self::$db->bind(':username', $newUser->getUsername());
            self::$db->bind(':password', $newUser->getPassword());
            $user = self::$db->execute();
            $rowsAffected = self::$db->rowsAffected();
            if($rowsAffected > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }

}

?>