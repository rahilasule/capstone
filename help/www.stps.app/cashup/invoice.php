<?php include '../view/header.php'; ?>
<div id="content">
    <?php 
    $cashier_name = $_SESSION['user']['firstName'] . ' ' .
                         $_SESSION['user']['lastName'];
    if (count($sales) > 0 ) : ?>
    <h1>Cash up Report </h1>
    <p>Cashier name: <?php echo $cashier_name; ?></p>
    <table id="cart_content">
        <tr id="cart_header">
                <th class="left">SaleID</th>
                <th class="left">CashierID</th>
                <th class="leftt">Date</th>
                <th class="right">TotAmount</th>
            </tr>
    
             <?php $daily_amount = 0;
             foreach($sales as $sale) :
                $sale_id = $sale['saleID'];
                $sale_date = strtotime($sale['Date']);
                $sale_date = date('Y-m-d', $sale_date);
                $cashier_id = $sale['cashierID'];
                $total_amount = $sale['totalAmount'];
                $daily_amount += $total_amount;
                ?>
                <tr>
                <td><?php echo  $sale_id;?></td>
                <td><?php echo  $cashier_id;?></td>
                <td><?php echo  $sale_date;?></td>
                <td class="right"><?php echo sprintf('R%.2f', $total_amount);?>
                </td></tr>
    
           <?php endforeach; ?>
           <br/>
           <tr id="cart_footer" >
               <td colspan="3" class="right" ><b>Daily Amount</b></td>
               <td class="right"><?php echo sprintf('R%.2f',$daily_amount); ?>
           </td></tr> </table>
    <div class ="noprint">
        <button onclick =" javascript:window.print();">Print</button>
    <form action="../account" method="post" >
        <input type="submit" value="Exit" />
    </form>
    </div>
    <?php else: ?>
        <p>There are no sales.</p>
        <form action="../account" method="post" >
        <input type="submit" value="Exit" />
        </form>
    <?php endif; ?>
</div>
<?php include '../view/footer.php'; ?>