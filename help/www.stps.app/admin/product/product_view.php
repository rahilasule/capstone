<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Product Manager - View Product</h1>
    
    <!-- display product -->
    <?php include '../../view/product.php'; ?>

    <!-- display buttons -->
    <br />
    <div id="edit_and_delete_buttons">
        <form action="" method="post" id="edit_button_form" >
            <input type="hidden" name="action" value="show_add_edit_form"/>
            <input type="hidden" name="product_id"
                   value="<?php echo $product['productID']; ?>" />
            <input type="hidden" name="category_id"
                   value="<?php echo $product['categoryID']; ?>" />
            <input type="submit" value="Edit Product" />
        </form>
          
        <form action="" method="post" id="delete_button_form" >
            <input type="hidden" name="action" value="delete_product"/>
            <input type="hidden" name="product_id"
                   value="<?php echo $product['productID']; ?>" />
            <input type="hidden" name="category_id"
                   value="<?php echo $product['categoryID']; ?>" />
            <input type="submit" value="Delete Product" />
    </div>        
</form>
        <p>Any of the below list changes must be made at the</p> 
            <p>beginning of each day or after the last daily cash up!</p>
            <li>Price</li>
            <li>Product deletion</li>
      
</div>
<?php include '../../view/footer.php'; ?>