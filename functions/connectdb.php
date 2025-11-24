<?php
const HOST = 'localhost';
const USER = 'root';
const PWD  = '';
const DBNAME = 'salecodb';

function Connect() {
    $conn = new mysqli(HOST, USER, PWD, DBNAME);
    if ($conn->connect_error) {
        die("Database Connection Failed: " . $conn->connect_error);
    }
    $conn->set_charset("utf8mb4");
    return $conn;
}

/**
 * Get order summaries ordered by invoice ID
 */
function GetOrders() {
    $conn = Connect();
    $sql = "
        SELECT 
            i.inv_number AS id,
            CONCAT(c.cus_fname, ' ', c.cus_lname) AS customer,
            DATE(i.inv_date) AS date,
            i.inv_subtotal AS subtotal,
            i.inv_tax AS tax,
            i.inv_total AS total
        FROM invoice i
        JOIN customer c ON i.cus_code = c.cus_code
        ORDER BY i.inv_number ASC
    ";
    $orders = [];
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        $result->free();
    }
    $conn->close();
    return $orders;
}
