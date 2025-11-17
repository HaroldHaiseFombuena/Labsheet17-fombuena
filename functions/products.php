<?php

include 'connectdb.php';

 
function getAllProducts(){
    $conn = Connect();
    $query = 'SELECT * FROM product';
    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}

function getInvoice(){
     $conn = Connect();
    $query = "SELECT inv_number, CONCAT(cus_fname, ' ',cus_lname) AS fullname, inv_date,inv_subtotal,inv_tax,inv_total
            FROM invoice i
            JOIN customer c ON i.cus_code = c.cus_code";
    $result = $conn->query($query); 
    $data=[];
     while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}
