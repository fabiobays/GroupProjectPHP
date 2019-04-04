<?php

/**
 * All credits to TheMovieDb API
 * Domain: https://developers.themoviedb.org
 * Documentation: https://developers.themoviedb.org/3/getting-started
 * It`s important to note that we are using the version 3 api.
 */

class TheMovieDbApi {
    /**
     * This api key is generated when we register on the main website.
     */
    private static $apiKey = 'bacfab80d0f2c7969a9b04993042bafb';

    /**
     * This is based on the Discover endpoint
     * Documentation: https://developers.themoviedb.org/3/discover/movie-discover
     */
    public static function getMoviesBetweenYears(int $startYear, int $endYear) {
        $movies = file_get_contents(
            sprintf('https://api.themoviedb.org/3/discover/movie?api_key=%s&primary_release_date.gte=%d&primary_release_date.lte=%d',
            self::$apiKey, $startYear, $endYear)
        );
        $jsonDecodedResponse = json_decode($movies);
        return $jsonDecodedResponse->results;
    }

    /**
     * Get the movie by the specific id.
     * Documentation: https://developers.themoviedb.org/3/movies/get-movie-details
     */
    public static function getMovieById(int $movieId) {
        $movie = file_get_contents(
            sprintf('https://api.themoviedb.org/3/movie/%d?api_key=%s',
            $movieId, self::$apiKey)
        );
        $jsonDecodedResponse = json_decode($movie);
        return $jsonDecodedResponse;
        
    }

    /**
     * This is the way to retrieve images 500x500.
     */
    public static function getW500Image(string $imageToken) : string {
        return 'https://image.tmdb.org/t/p/w500' . $imageToken;
    }

    /**
     * This is the way to retrieve the original sized images.
     */
    public static function getOriginalImage(string $imageToken) : string {
        return 'https://image.tmdb.org/t/p/original' . $imageToken;
    }

    public static function searchMovies($movies, $search) {
        if(empty($search)) return $movies;
        $filteredMovies = [];
        foreach ($movies as $movie) {
            if(stripos($movie->title, $search) !== false) {
                $filteredMovies[] = $movie;
            }
        }
        return $filteredMovies;
    }
}

?>