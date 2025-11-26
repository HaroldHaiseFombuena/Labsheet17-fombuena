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
function findProducts($find){
    $conn = Connect();

    $query = "SELECT * FROM product WHERE p_descript LIKE '%$find%'";
    $result = $conn->query($query); 
    $data=[]; //data set
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    $conn->close();
    return $data;
}
function deleteProducts($pcode){
    $conn = Connect();

    $query = "DELETE FROM product WHERE p_code = '$pcode'";
    $result = $conn->query($query); 
    $conn->close();
    if($result) return true;
    return $false;
}
function addProducts($pcode, $pdesc,$pqoh,$price){
    $conn = Connect();

    $query = "INSERT INTO product 
            (p_code, p_descript, p_qoh, p_price, v_code)
            VALUE
            ('$pcode', '$pdesc', $pqoh, $price, 21225)";
    $result = $conn->query($query); 
    $conn->close();
    if($result) return true;
    return $false;
}
// function updateProducts($pcode, $pdesc,$pqoh,$price){
//     $conn = Connect();

//     $query = "UPDATE product SET 
//             p_descript = '$pdesc',
//             p_qoh = $pqoh,
//             p_price = $price
//             WHERE p_code = '$pcode'";
//     $result = $conn->query($query); 
//     $conn->close();
//     if($result) return true;
//     return $false;
// }
