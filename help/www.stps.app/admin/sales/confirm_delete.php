<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<div id="content">
    <h3 class="top">Delete Sale</h3>
    <p>Sale Number: <?php echo $sale_id; ?></p>
    <p>Sale Date: <?php echo $sale_date; ?></p>
    <p>Cashier: <?php echo $name; ?></p>
    <p>Are you sure you want to delete this sale?</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="sale_id"
               value="<?php echo $sale_id; ?>" />
        <input type="submit" value="Delete sale" />
    </form>
    <form action="" method="post">
        <input type="submit" value="Cancel" />
    </form>

</div>
<?php include 'view/footer.php'; ?>