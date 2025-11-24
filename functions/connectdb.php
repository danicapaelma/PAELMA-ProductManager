<?php
// Database connection constants
const HOST = 'localhost';
const USER = 'root';
const PWD  = '';
const DBNAME = 'salecodb';

/**
 * Establish and return a mysqli connection
 * @return mysqli
 */
function Connect() {
    $conn = new mysqli(HOST, USER, PWD, DBNAME);
    if ($conn->connect_error) {
        die("Database Connection Failed: " . $conn->connect_error);
    }
    // Optional: set charset to avoid encoding issues
    $conn->set_charset("utf8mb4");
    return $conn;
}
