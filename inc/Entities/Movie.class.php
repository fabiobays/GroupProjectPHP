<?php

class Movie{
    
    private $MovieID;
    private $MovieName;
    private $Rating;

    public function setMovieID($MovieID){
        $this->MovieID = $MovieID;
    }

    public function setRating($Rating){
        $this->Rating = $Rating;
    }

    public function setMoviename($Moviename){
        $this->Moviename = $Moviename;
    }

    public function getMovieID(){
        return $this->MovieID;
    }

    public function getRating(){
        return $this->Rating;
    }

    public function getMoviename(){
        return $this->Moviename;
    }

}
