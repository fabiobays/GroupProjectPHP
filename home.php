<?php
require_once("inc/config.inc.php");

require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Movie.class.php");

require_once("inc/Utility/TheMovieDbApi.class.php");
require_once("inc/Utility/Page.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserMapper.class.php");
require_once("inc/Utility/MovieMapper.class.php");
require_once("inc/Utility/LoginManager.class.php");

session_start();

if(!LoginManager::verifyLogin()) return;

$movies = TheMovieDbApi::getMoviesBetweenYears(2017, 2018);
if(!empty($_GET)) {
    $movies = TheMovieDbApi::searchMovies($movies, $_GET['search']);
}

//sets the movies into the database
// MovieMapper::inizialize("Movie");
// foreach($movies as $movie){
//     $newMovie = new Movie();
//     $newMovie->setMovieName($movie->title);
//     $newMovie->setRating(0);
//     MovieMapper::createMovie($newMovie);
// }

Page::$title = "GroupProject";
Page::header();
Page::showSearch();
Page::showMovies($movies);
//Page::welcome();
Page::footer();