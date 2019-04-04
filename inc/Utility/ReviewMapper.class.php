<?php

class ReviewMapper{

    private static $db;


    static function inizialize($ClassName){ 
      
        self::$db  = new PDOAgent($ClassName);

    }

    static function createReview($Review){
        $SQLInsert = "INSERT INTO Review(UserID, MovieID, ReviewDesc, Rating) VALUES (:userid, :movieid, :reviewdesc, :rating)";

        self::$db->query($SQLInsert);

        self::$db->bind(':userid',$Review->getUserID());
        self::$db->bind(':movieid',$Review->getMovieID());
        self::$db->bind(':Reviewdesc',$Review->getReviewDesc());
        self::$db->bind(':rating',$Review->getRating());
      
        self::$db->execute();

        return self::$db->lastInsertedID();

    }

    static function getReview($MovieID, $UserID){
        $SQLSelect = "SELECT * FROM Review WHERE UserID = :userid AND MovieID = :movieid";

        self::$db->query($SQLSelect);

        self::$db->bind(':movieid',$MovieID);
        self::$db->bind(':userid',$UserID);

        self::$db->execute();

        return self::$db->singleResult();
    }

    static function getReviews($MovieID){
        $SQLSelect = "SELECT * FROM Review WHERE  MovieID = :movieid";

        self::$db->query($SQLSelect);

        self::$db->bind(':movieid',$MovieID);
      
        self::$db->execute();

        return self::$db->singleResult();
    }
}

?>