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
    $action = 'view_saleitems';
}

switch($action) {
    case 'view_saleitems':
        $sale_items = get_items();
        include 'saleitems.php';
        break;
    case 'del':
        $item_id = intval($_POST['item_id']);
        delete_item($item_id);
        redirect('items.php');
        break;
    default:
        display_error("Unknown item action: " . $action);
        break;
}
?>