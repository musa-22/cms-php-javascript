<?php


/*
 *
 *    create constants to connect to the db
 */

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cmsmay";

foreach ($db as $key => $value) {

  define(strtoupper($key), $value);
}

$con =  mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if ($con) {

  //echo " connected";
}
