<?php
include('../view/header.php');

require_once('../util/main.php');
require_once('../util/secure_conn.php');
require_once('util/validation.php');

require_once('model/cart.php');
require_once('model/product_db.php');
require_once('model/sale_db.php');
require_once('model/cashier_db.php');

?>
<html> 
    <body background picture ="images/Payments.jpg">
<div id="content">
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } ?>
        <form action="cash_sale.php" method="post" id="payment_form">
            <h2> Enter the cash amount and Submit.</h2>
        <div id="data">
            <label>Cash Amount:</label>
            <input type="text" name="cash"/>
            <br />
            <br/>
            <br/>
        </div>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"/><br />
        
            <label>&nbsp;</label>
            <button onclick =" history.go(-1);">Back</button>
        </div>
        </form>
</div>
    </body>
      <?php include('../view/footer.php');?></html>