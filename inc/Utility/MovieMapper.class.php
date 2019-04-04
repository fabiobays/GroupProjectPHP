<?php

class MovieMapper{

    static private $db;


    static function inizialize($ClassName){ 
      
        self::$db  = new PDOAgent($ClassName);

    }
    static function createMovie($movie){
        $SQLCreate = "INSERT INTO Movie(MovieName, Rating) VALUES (:moviename, :rating)";

        self::$db->query($SQLCreate);

        self::$db->bind(':moviename',$movie->getMoviename());
        self::$db->bind(':rating',$movie->getRating());
      
        self::$db->execute();

    }

    static function getMovies(){
        $SQLSelect = "SELECT * FROM Movie";

        self::$db->query($SQLSelect);

        self::$db->execute();

        return self::$db->ResultSet();

    }

    static function getMovie($Movie){
        $SQLSelect = "SELECT * FROM Movie WHERE MovieName = :Moviename";

        self::$db->query($SQLSelect);

        self::$db->bind(':Moviename',$Movie->getMoviename());
      
        self::$db->execute();

        return self::$db->singleResult();
    }

}

?>