<?php

/**
 * Conf to run on local
 */
/*
$HOST = '127.0.0.1';
$DB = 'restaurant';
$USER = 'root';
$PWD = '';
*/

/*Conf to run via heroku*/
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$HOST = $dbparts['host'];
$USER = $dbparts['user'];
$PWD = $dbparts['pass'];
$DB = ltrim($dbparts['path'],'/');