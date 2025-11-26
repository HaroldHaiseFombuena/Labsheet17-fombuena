<?php
include 'connectdb.php';

function getAllCustomers(){
    $conn = Connect();
    $query = "SELECT cus_code,
            CONCAT(cus_fname,' ',cus_lname) AS fullname,
            cus_initial,
            cus_areacode,
            cus_phone,
            cus_balance
            FROM customer";
    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}
function findCustomer($find){
    $conn = Connect();

    $query = "SELECT cus_code,
            CONCAT(cus_fname,' ',cus_lname) AS fullname,
            cus_initial,
            cus_areacode,
            cus_phone,
            cus_balance
            FROM customer
             WHERE cus_fname LIKE '%$find%'";
    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}
function deleteCustomer($cuscode){
    $conn = Connect();

    $query = "DELETE FROM customer WHERE cus_code = '$cuscode'";
    $result = $conn->query($query); 
    $conn->close();
    if($result) return true;
    return $false;
}