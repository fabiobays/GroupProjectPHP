<?php

class AddressMapper{

    static private $db;


    static function inizialize($ClassID){ 
      
        self::$db  = new PDOAgent($ClassID);

    }

    static function createAddress($Address){
        $SQLInsert = "INSERT INTO Address(UserID, State, Street, City) VALUES (:userid, :state, :street, :city)";

        self::$db->query($SQLInsert);

        self::$db->bind(':userid',$Address->getUserID());
        self::$db->bind(':state',$Address->getState());
        self::$db->bind(':street',$Address->getStreet());
        self::$db->bind(':city',$Address->getCity());
      
        self::$db->execute();

        return self::$db->lastInsertedID();

    }

    static function getAddress($Address){
        $SQLSelect = "SELECT * FROM Address WHERE UserID = :userid";

        self::$db->query($SQLSelect);

        self::$db->bind(':userid',$Address->getUserID());
      
        self::$db->execute();

        return self::$db->singleResult();
    }

}

?>