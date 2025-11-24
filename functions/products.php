<?php
include 'connectdb.php';

function getAllProducts() {
    $conn = Connect();
    $query = "SELECT * FROM product";
    $result = $conn->query($query);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

function deleteProduct($id) {
    $conn = Connect();
    $query = "DELETE FROM product WHERE p_code = '$id'";
    return $conn->query($query);
}
