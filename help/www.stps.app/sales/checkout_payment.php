<?php include '../view/header.php'; 

require_once('../util/main.php');
require_once('../util/secure_conn.php');
require_once('../util/validation.php');

require_once('../model/cart.php');
require_once('../model/product_db.php');
require_once('../model/sale_db.php');
require_once('../model/cashier_db.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['checkout'] = true;
    redirect('../account');
    exit();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'process';
}

switch ($action) {
    case 'process':
        if (cart_product_count() == 0) {
            redirect('Location: ' . $app_path . 'cart');
        }
        $cart = cart_get_items();
        
        $sale_id = add_sale();
        foreach($cart as $product_id => $item) {
            $product_name = $item['name'];
            $price = $item['price'];           
            $quantity = $item['quantity'];
            $totalQuantity = $item['totalQuantity'];
            
            add_sale_item($sale_id, $product_name,
                           $price, $quantity);
        
            get_product_total_quantity($product_id);
            $totalQuantity -= $quantity;
            
            update_product_total_quantity($product_id, $totalQuantity);
        }
      
        clear_cart();
        
        break;
    default:
        display_error('Unknown cart action: ' . $action);
        break;
}
?>
<div id="content">
    <h1>Sale recorded and Products Updated</h1>
    <h2>Please Click Exit to make Another sale</h2>
    <form action="../account" method="post" >
        <input type="submit" value="Exit" />
        
    </form>
</div>
<?php include '../view/footer.php'; ?>