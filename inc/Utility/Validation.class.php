<?php

class Validation {
    //Validate the input
    public static function validate(): Array   {
        //Initialize and empty array
        $messages = array();
        /**
         * Here we use regex to test the fields.
         * The regex were implemented using this website https://regexr.com/
         */
        if( !preg_match('/^[\w]{2,20}$/',  $_POST['username']) ) $messages[] = 'Invalid username, username should have [A-Za-z0-9_] and between 2-20 characters';
        if( !preg_match('/^[\w]{2,20}$/',  $_POST['password']) ) $messages[] = 'Invalid password, password should have [A-Za-z0-9_] and between 2-20 characters';
        return $messages;
    }
}