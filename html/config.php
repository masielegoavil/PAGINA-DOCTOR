<?php

/**
  * Configuration for database connection
  *
  */

$host       = "mysql-server";
$username   = "root";
$password   = "secret";
$dbname     = "database1"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
