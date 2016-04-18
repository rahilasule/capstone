<?php
require_once('../util/main.php');
require_once('../util/secure_conn.php');
require_once('../util/validation.php');

require_once('../model/cart.php');
require_once('../model/product_db.php');
require_once('../model/sale_db.php');
require_once('../model/cashier_db.php');

    if (!isset($_SESSION['user'])) {
    $_SESSION['checkout'] = true;
    exit();
    }
// get the data from the form
    $cash = $_POST['cash'];

    // validate cash entry
    if ( empty($cash) ) {
        $error_message = 'Cash is a required field.'; 
    } else if ( !is_numeric($cash) )  {
        $error_message = 'Cash must be a valid number.'; 
    } else if ( $cash <= 0 ) {
        $error_message = 'Cash must be greater than zero.'; 
    } else if ( $cash < cart_balance() ) {
        $error_message = 'Cash must be equal or greater than Balance.'; 
    }else {
        $error_message = '';
    }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('./index.php');
        exit();
    }
    $change = ($cash - cart_balance());
    $change = 'R'.number_format($change, 2);
    $cash = 'R'.  number_format($cash, 2);
    
    $cashier_name = $_SESSION['user']['firstName'] . ' ' .
                         $_SESSION['user']['lastName'];
?>
    <?php include '../view/header.php';?>

<div id="content">
    <h2> MS Market</h2>
    <div id="cart_content">
    <p>Address: <?php echo '1240 ';?> <br/>
    <?php echo 'Pretoria'; ?></p>
    <p>Cashier name: <?php echo $cashier_name; ?></p>
    <p>Date-Time: <?php  echo strftime('%c');?></p><br/>
    <?php $cart = cart_get_items();
     if (cart_product_count() == 0) : ?>
    <?php else: ?>
        <form action="." method="post">
            <input type="hidden" name="action" value="update" />
            <table id="cart_content">
            <tr id="cart_header">
                <th class="left">Item</th>
                <th class="right">Price</th>
                <th class="right">Qty</th>
                <th class="right">Total</th>
            </tr>
            <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td class="right">
                    <?php echo sprintf('R%.2f', $item['price']); ?>
                </td>
                <td class="right">
                           
                               <?php echo $item['quantity']; ?>
                </td>
                <td class="right">
                    <?php echo sprintf('R%.2f', $item['total']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr id="cart_footer" >
                <td colspan="3" class="right" ><b>Balance</b></td>
                <td class="right">
                    <?php echo sprintf('R%.2f', cart_balance()); ?>
                </td></tr>
                <tr>
                <td colspan="3" class="right" ><b>Cash Forward</b></td>
                <td class="right">
                    <?php echo $cash;?> 
                </td></tr>
                <tr>
                    <td colspan="3" class="right" ><b>Change</b></td>
                    <td class="right"><?php echo $change;?>
                </td></tr>
                
     </table>
   </form>

    <p><?php echo 'Thank You and Come Again Next Time!'; ?></p>
    </div>
   <?php endif; ?> 
    <p>
    <div class ="noprint">
        <form action="checkout_payment.php" method="post">
        <input type="hidden" name="action" value="process" />
        <button onclick =" javascript:window.print();">Print</button>Click once!</p>
        </form>
        <p>
            <button onclick =" history.go(-1);">Back</button>
        </p>
</div>
</div>
    <?php include '../view/footer.php'; ?>
  