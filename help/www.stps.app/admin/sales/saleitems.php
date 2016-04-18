<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Items Information</h1>
    <p>You only get a chance to delete an item if the sale is deleted.</p>
    <table id="cart_content">
            <tr id="cart_header">
                <th class="left">Num </th>
                <th class="left">SaleID</th>
                <th class="left">Name</th>
                <th class="left">Price </th>
                <th class="right">Qty</th>
                <th>&nbsp</th>
            </tr>
        <?php
        foreach ($sale_items as $item) :
            $item_id = $item['itemID'];
            $sale_id = $item['saleID'];
            $product_name = $item['productName'];
            $price = $item['itemPrice'];
            $quantity = $item['quantity'];
            ?>
            <tr><form action="" method="post" >
                <td class="left"><?php echo $item_id; ?></td>
                <td class="left"><?php echo $sale_id; ?></td>
                <td class="left"><?php echo $product_name; ?></td>
                <td class="right">
                    <?php echo sprintf('R%.2f', $price); ?>
                </td>
                <td class="right">
                    <?php echo $quantity; ?>
                </td>
                <td>
                <?php if (product_sale_count($item_id) < 1): ?>
                <input type="hidden" name="action" value="del" />
                <input type="hidden" name="item_id"
                value="<?php echo $item_id; ?>" />
                <input type="submit" value="Delete" />
                <?php endif;?>
   </form></td>
            </tr>
        <?php endforeach; ?>
     </table>
    <p align="left">
            <button onclick =" history.go(-1);">Back</button>
        </p>
</div>
<?php include 'view/footer.php'; ?>