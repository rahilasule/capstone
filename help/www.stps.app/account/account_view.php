<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<div id="content">
    <h1 class="top">My Account</h1>
    <p><?php echo $cashier_name . ' (' . $email . ')'; ?></p>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_account_edit" />
        <input type="submit" value="Edit Account" />
    </form>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <h1>Select a category to make a sale.</h1>
    <br/>
</div>
<?php include '../view/footer.php'; ?>
