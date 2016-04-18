<?php
function get_products_by_category($category_id) {
    global $db;
    $query = '
        SELECT *
        FROM products p
           INNER JOIN categories c
           ON p.categoryID = c.categoryID
        WHERE p.categoryID = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product($product_id) {
    global $db;
    $query = '
        SELECT *
        FROM products p
           INNER JOIN categories c
           ON p.categoryID = c.categoryID
       WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product_sale_count($product_name) {
    global $db;
    $query = '
        SELECT COUNT(*) AS saleCount
        FROM saleitems
        WHERE productName = :product_name';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_name', $product_name);
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

function add_product($category_id, $code, $name, $colorFlavor,
                           $price, $totalQuantity, $size) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, colorFlavour, 
                 price, totalQuantity, size)
              VALUES
                 (:category_id, :code, :name, :colorFlavor, :price, 
                 :totalQuantity, :size)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':colorFlavor', $colorFlavor);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':totalQuantity', $totalQuantity);
        $statement->bindValue(':size', $size);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $product_id = $db->lastInsertId();
        return $product_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_product($product_id, $code, $name, $colorFlavor,
                           $price, $totalQuantity, $size, $category_id) {
    global $db;
    $query = '
        UPDATE Products
        SET productName = :name,
            productCode = :code,
            colorFlavour = :colorFlavor,
            price = :price,
            totalQuantity = :totalQuantity,
            size = :size,
            categoryID = :category_id
        WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':colorFlavor', $colorFlavor);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':totalQuantity', $totalQuantity);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM products WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
function get_product_total_quantity($product_id){
    global $db;
    $query = 'SELECT totalQuantity FROM products
        WHERE productID = :product_id';
    try{
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message); 
    }
}

function update_product_total_quantity($product_id, $totalQuantity){
    global $db;
    $query = 'UPDATE products
            SET totalQuantity = :totalQuantity
        WHERE productID = :product_id';
    try{
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->bindValue(':totalQuantity', $totalQuantity);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message); 
    }
}
?>