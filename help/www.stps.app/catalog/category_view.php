<?php include '../view/header.php';
include '../view/sidebar.php';
?>

<div id="main">
    <h1><?php echo $category_name; ?></h1>
    <?php if (count($products) == 0) : ?>
        <p>There are no products in this category.</p>
    <?php else: ?>
<h2><b>Select your product by clicking on the Code Link</b></h2>
    <table border ="1">
            <tr>
                <th>Code</th>
                <th>Name</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr><td><a href="<?php echo '?product_id=' . $product['productID']; ?>">
                <?php echo $product['productCode']; ?></a></td>
                <td><?php echo $product['productName']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>       
    <?php endif; ?>
</div>
<?php include '../view/footer.php'; ?>