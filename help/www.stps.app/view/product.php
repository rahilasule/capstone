<?php
    // Parse data
    $category_id = $product['categoryID'];
    $code = $product['productCode'];
    $name = $product['productName'];
    $colorFlavor = $product['colorFlavour'];
    $price = $product['price'];
    $totalQuantity = $product['totalQuantity'];
    $size = $product['size'];
    
    

?>

<h1><?php echo $name; ?></h1>

<div id="right_column">
    <p><b>Code:</b>
        <?php echo $code; ?></p>
    <p><b>color/Flavor:</b>
        <?php echo $colorFlavor; ?></p>
    <p><b>Price:</b>
        <?php echo 'R' . $price; ?></p>
    <p><b>Total Quantity:</b>
        <?php echo $totalQuantity; ?></p>
    <p><b>Size:</b>
        <?php echo  $size; ?></p>
    
 <?php if (isset($_SESSION['user'])) :?>
    <form action="<?php echo $app_path . 'cart' ?>" method="get" id="add_to_cart_form">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="product_id"
               value="<?php echo $product_id; ?>" />
        <b>Quantity:</b>&nbsp;
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to Cart" />
    </form>
<?php endif; ?>    
</div>