<?php
function is_valid_cashier_email($email) {
    global $db;
    $query = '
        SELECT cashierID FROM cashiers
        WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function is_valid_cashier_login($email, $password) {
    global $db;
    $password = sha1($email . $password);
    $query = '
        SELECT * FROM cashiers
        WHERE emailAddress = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function get_cashier($cashier_id) {
    global $db;
    $query = 'SELECT * FROM cashiers WHERE cashierID = :cashier_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':cashier_id', $cashier_id);
    $statement->execute();
    $cashier = $statement->fetch();
    $statement->closeCursor();
    return $cashier;
}

function get_cashier_by_email($email) {
    global $db;
    $query = 'SELECT * FROM cashiers WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $cashier = $statement->fetch();
    $statement->closeCursor();
    return $cashier;
}

function cashier_change_shipping_id($cashier_id, $address_id) {
    global $db;
    $query = 'UPDATE cashiers SET shipAddressID = :address_id
              WHERE cashierID = :cashier_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->bindValue(':cashier_id', $cashier_id);
    $statement->execute();
    $statement->closeCursor();
}

function cashier_change_billing_id($cashier_id, $address_id) {
    global $db;
    $query = 'UPDATE cashiers SET billingAddressID = :address_id
              WHERE cashierID = :cashier_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->bindValue(':cashier_id', $cashier_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_cashier($email, $first_name, $last_name,
                      $password_1, $password_2) {
    global $db;
    $password = sha1($email . $password_1);
    $query = '
        INSERT INTO cashiers (emailAddress, password, firstName, lastName)
        VALUES (:email, :password, :first_name, :last_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $cashier_id = $db->lastInsertId();
    $statement->closeCursor();
    return $cashier_id;
}

function update_cashier($cashier_id, $email, $first_name, $last_name,
                      $password_1, $password_2) {
    global $db;
    $query = '
        UPDATE cashiers
        SET emailAddress = :email,
            firstName = :first_name,
            lastName = :last_name
        WHERE cashierID = :cashier_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':cashier_id', $cashier_id);
    $statement->execute();
    $statement->closeCursor();

    if (!empty($password_1) && !empty($password_2)) {
        $password = sha1($email . $password_1);
        $query = '
            UPDATE cashiers
            SET password = :password
            WHERE cashierID = :cashier_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':cashier_id', $cashier_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>