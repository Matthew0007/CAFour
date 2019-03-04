<?php
function get_customers() {
    global $db;
    $query = 'SELECT * FROM customer
              ORDER BY customer_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_customer_name($customer_id) {
    global $db;
    $query = 'SELECT * FROM customer
              WHERE customer_id = :customerID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customer_id);
    $statement->execute();    
    $customer = $statement->fetch();
    $statement->closeCursor();    
    $customer_name = $customer['customer_name'];
    return $customer_name;
}

function add_customers($name, $product_id) {
    global $db;
    $query = 'INSERT INTO customer (customer_name, productID)
              VALUES (:name, :id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':id', $product_id);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_customer($customer_id) {
    global $db;
    $query = 'DELETE FROM customer
              WHERE customer_id = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}
?>