<?php
require_once('../util/main.php');
require_once('util/secure_conn.php');

require_once('model/cashier_db.php');
require_once('model/sale_db.php');
require_once('model/product_db.php');

if ( isset($_POST['action']) ) {
    $action = $_POST['action'];
} elseif ( isset($_GET['action']) ) {
    $action = $_GET['action']; 
}elseif (isset($_SESSION['user'])) {
    $action = 'logon';
} else {
    $action = 'view_login';
}

switch ($action) {
    case 'view_login':
        include 'index.php';
        break;
    case 'logon':
        $password = $_POST['password'];
        
        //validity
        if($_REQUEST['password'] == 'admin'){
        } else {
            display_error ('Wrong password');
            redirect('.');
        }
        $cashier_id = $_SESSION['user']['cashierID'];
        $sale_date = date('Y-m-d');
        
        $sales = get_sales_by_cashier_id($cashier_id, $sale_date);
        include 'invoice.php';
        break;
        display_error("Unknown cashup action: " . $action);
        break;

}

        $cashier_name = $_SESSION['user']['firstName'] . ' ' .
                         $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['emailAddress'];
?>

