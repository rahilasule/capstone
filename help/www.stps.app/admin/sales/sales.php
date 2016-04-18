<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<div id="content">
    <h1>Sales Reports </h1>
    <p>Please make sure to delete the sales and sale items after a day or week </p>
    <p> based on the storage space you have for reports or back up if necessary!  </p>
    <a href="items.php">Items list</a>
	<br/>
	<br/>
    <?php if (count($sales) > 0 ) : ?>
        <ul>
            <?php foreach($sales as $sale) :
                $sale_id = $sale['saleID'];
                $sale_date = strtotime($sale['Date']);
                $sale_date = date('M j, Y', $sale_date);
                $url = $app_path . 'admin/sales' .
                       '?action=view_sale&sale_id=' . $sale_id;
                ?>
                <li>
                    <a href="<?php echo $url; ?>">
                <img src = "../../images/Sales.jpg" width ="50" height="30"># 
                    <?php echo $sale_id; ?></a> for
                    <?php echo $sale['firstName'] . ' ' .
                               $sale['lastName']; ?> placed on
                    <?php echo $sale_date; ?>
                </li> 
                    <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>There are no sales.</p>
    <?php endif; ?>
</div>
<?php include 'view/footer.php'; ?>