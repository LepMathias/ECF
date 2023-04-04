<?php
if(!isset($_ENV['JAWSDB_URL'])){
    /**
     * Conf to run on local
     */
    $HOST = 'localhost';
    $DB = 'restaurant';
    $USER = 'mathias';
    $PWD = 'E.300619';
} else {
    /**
     * Conf to run via heroku
     */
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $HOST = $dbparts['host'];
    $USER = $dbparts['user'];
    $PWD = $dbparts['pass'];
    $DB = ltrim($dbparts['path'], '/');
}