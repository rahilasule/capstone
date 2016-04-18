<?php

function add_sale() {
    global $db;
    $cashier_id = $_SESSION['user']['cashierID'];
    $sale_date = date("Y-m-d H:i:s");
    $total_amount = cart_balance();
    

    $query = '
         INSERT INTO sales (cashierID, Date, totalAmount)
         VALUES (:cashier_id, :sale_date, :total_amount)';
    $statement = $db->prepare($query);
    $statement->bindValue(':cashier_id', $cashier_id);
    $statement->bindValue(':sale_date', $sale_date);
    $statement->bindValue(':total_amount', $total_amount);
    $statement->execute();
    $sale_id = $db->lastInsertId();
    $statement->closeCursor();
    return $sale_id;
}

function add_sale_item($sale_id,$product_name,
                           $price, $quantity) {
    global $db;
    $query = '
        INSERT INTO saleitems (saleID, productName,
                                 itemPrice, quantity)
        VALUES (:sale_id, :product_name, :price, :quantity)';
    $statement = $db->prepare($query);
    $statement->bindValue(':sale_id', $sale_id);
    $statement->bindValue(':product_name', $product_name);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}

function get_sale($sale_id) {
    global $db;
    $query = 'SELECT * FROM sales WHERE saleID = :sale_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':sale_id', $sale_id);
    $statement->execute();
    $sale = $statement->fetch();
    $statement->closeCursor();
    return $sale;
}

function get_sale_items($sale_id) {
    global $db;
    $query = 'SELECT * FROM saleitems WHERE saleID = :sale_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':sale_id', $sale_id);
    $statement->execute();
    $sale_items = $statement->fetchAll();
    $statement->closeCursor();
    return $sale_items;
}

function get_item($item_id) {
    global $db;
    $query = 'SELECT * FROM saleitems WHERE itemID = :item_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_id', $item_id);
    $statement->execute();
    $sale = $statement->fetch();
    $statement->closeCursor();
    return $sale;
}

function get_items() {
    global $db;
    $query = 'SELECT * FROM saleitems
        ORDER BY itemID, saleID';
    $statement = $db->prepare($query);
    $statement->execute();
    $sale_items = $statement->fetchAll();
    $statement->closeCursor();
    return $sale_items;
}

function get_sales_by_cashier_id($cashier_id) {
    global $db;
    $query = 'SELECT * FROM sales 
              INNER JOIN cashiers
              ON cashiers.cashierID = sales.cashierID  
              WHERE sales.Date = CURDATE()
              ORDER BY saleID' ;
    $statement = $db->prepare($query);
    $statement->bindValue(':cashier_id', $cashier_id);
    $statement->execute();
    $sales = $statement->fetchAll();
    $statement->closeCursor();
    return $sales;
}

function get_sales() {
    global $db;
    $query = 'SELECT * FROM sales
              INNER JOIN cashiers
              ON cashiers.cashierID = sales.cashierID
              ORDER BY Date, SaleID';
    $statement = $db->prepare($query);
    $statement->execute();
    $sales = $statement->fetchAll();
    $statement->closeCursor();
    return $sales;  
}

function delete_sale($sale_id) {
    global $db;
    $query = 'DELETE FROM sales
        WHERE saleID = :sale_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':sale_id', $sale_id);
    $statement->execute();
    $statement->closeCursor();
}

function product_sale_count($item_id) {
    global $db;
    $query = '
        SELECT COUNT(*) AS saleCount
        FROM saleitems i
        INNER JOIN sales s
        ON i.saleID = s.saleID
        WHERE itemID = :item_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':item_id', $item_id);
        $statement->execute();
        $product = $statement->fetch();
        $sale_count = $product['saleCount'];
        $statement->closeCursor();
        return $sale_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}


function delete_item($item_id) {
    global $db;
    $query = 'DELETE FROM saleitems 
                WHERE itemID = :item_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_id', $item_id);
    $statement->execute();
    $statement->closeCursor();
}
?>