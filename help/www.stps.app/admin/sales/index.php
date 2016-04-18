<?php
require_once('../../util/main.php');
require_once('util/secure_conn.php');
require_once('util/valid_admin.php');

require_once('model/cashier_db.php');
require_once('model/sale_db.php');
require_once('model/product_db.php');

if ( isset($_POST['action']) ) {
    $action = $_POST['action'];
} elseif ( isset($_GET['action']) ) {
    $action = $_GET['action'];
} else {
    $action = 'view_sales';
}

switch($action) {
    case 'view_sales':
        $sales = get_sales();
        include 'sales.php';
        break;
    case 'view_sale':
        $sale_id = $_GET['sale_id'];

        // Get sale data
        $sale = get_sale($sale_id);
        $sale_date = date('M j, Y', strtotime($sale['Date']));
        $sale_items = get_sale_items($sale_id);

        // Get cashier data
        $cashier = get_cashier($sale['cashierID']);
        $name = $cashier['lastName'] . ', ' . $cashier['firstName'];

        include 'sale.php';
        break;
    case 'confirm_delete':
        // Get sale data
        $sale_id = intval($_POST['sale_id']);
        $sale = get_sale($sale_id);
        $sale_date = date('M j, Y', strtotime($sale['Date']));

        // Get cashier data
        $cashier = get_cashier($sale['cashierID']);
        $name = $cashier['lastName'] . ', ' . $cashier['firstName'];

        include 'confirm_delete.php';
        break;
    case 'delete':
        $sale_id = intval($_POST['sale_id']);
        delete_sale($sale_id);
        redirect('.');
        break;
    default:
        display_error("Unknown sale action: " . $action);
        break;
}
?>