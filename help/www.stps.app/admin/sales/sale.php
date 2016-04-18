<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Sale Information</h1>
    <h2>By deleting this sale you will also be able to delete items related to this sale!</h2>
    <p>Sale Number: <?php echo $sale_id; ?></p>
    <p>Sale Date: <?php echo $sale_date; ?></p>
    <p>Cashier: <?php echo $name; ?></p>
        <p>
            <form action="" method="post" >
                <input type="hidden" name="action" value="confirm_delete" />
                <input type="hidden" name="sale_id"
                       value="<?php echo $sale_id; ?>" />
                <input type="submit" value="Delete Sale" />
            </form>
        </p>
    <h2>Sale Items</h2>
    <table id="cart">
        <tr id="cart_header">
                <th class="left">Item</th>
                <th class="right">Price</th>
                <th class="right">Quantity</th>
                <th class="right">Total</th>
            </tr>
        <?php
        $total = 0;
        $balance = 0;
        foreach ($sale_items as $item) :
            $product_id = $item['itemID'];
            $product = get_product($product_id);
            $product_name = $item['productName'];
            $price = $item['itemPrice'];
            $quantity = $item['quantity'];
            $total = $price * $quantity;
            $balance += $total;
            ?>
            <tr>
                <td><?php echo $product_name; ?></td>
                <td class="right">
                    <?php echo sprintf('R%.2f', $price); ?>
                </td>
                <td class="right">
                    <?php echo $quantity; ?>
                </td>
                <td class="right">
                    <?php echo sprintf('R%.2f', $total); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr id="cart_footer" >
                <td colspan="3" class="right" ><b>Balance</b></td>
                <td class="right">
                    <?php echo sprintf('R%.2f', $balance); ?>
                </td></tr>
     </table>
    <p align="left">
            <button onclick =" history.go(-1);">Back</button>
        </p>
</div>
<?php include 'view/footer.php'; ?>