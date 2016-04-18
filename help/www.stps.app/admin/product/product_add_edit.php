<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">
    <?php
    if (isset($product_id)) {
        $heading_text = 'Edit Product';
    } else {
        $heading_text = 'Add Product';
    }
    ?>
    <h1>Product Manager - <?php echo $heading_text; ?></h1>
    <form action="index.php" method="post" id="add_product_form">
        <?php if (isset($product_id)) : ?>
            <input type="hidden" name="action" value="update_product" />
            <input type="hidden" name="product_id"
                   value="<?php echo $product_id; ?>" />
        <?php else: ?>
            <input type="hidden" name="action" value="add_product" />
        <?php endif; ?>
            <input type="hidden" name="category_id"
                   value="<?php echo $product['categoryID']; ?>" />

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : 
            if ($category['categoryID'] == $product['categoryID']) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
        ?>
            <option value="<?php echo $category['categoryID']; ?>"<?php
                      echo $selected ?>>
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br />

        <label>Code:</label>
        <input type="input" name="productCode"
               value="<?php echo $product['productCode']; ?>" />
        <br />

        <label>Name:</label>
        <input type="input" name="productName" 
               value="<?php echo $product['productName']; ?>" size="50" />
        <br />

        <label>Color / Flavor:</label>
        <input type="input" name="colorFlavour" 
               value="<?php echo $product['colorFlavour']; ?>" />
        <br />

        <label>Price:</label>
        <input type="input" name="price" 
               value="<?php echo $product['price']; ?>" />
        <br />

        <label>Total Quantity:</label>
        <input type="input" name="totalQuantity" 
               value="<?php echo $product['totalQuantity']; ?>" />
        <br />

        <label>Size:</label>
        <input type="input" name="size" 
               value="<?php echo $product['size']; ?>" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Submit" />
        
    </form>

</div>
<?php include '../../view/footer.php'; ?>