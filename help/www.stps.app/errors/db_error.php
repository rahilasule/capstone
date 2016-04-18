<?php include 'view/header.php'; ?>
<div id="content">
    <h1>Database Error</h1>
    <p>A database error occurred.</p>
    <p>Error message: <?php echo $error_message; ?>
    <br/>
    <img src = "images/stop.png" width ="100" height="100"></p>
    <p>&nbsp;</p>
</div><!-- end content -->
<?php if (isset($_SESSION['user'])) : ?>
    <a href="<?php echo $app_path; ?>account">
    <img src = "../images/cashier.png" width ="30" height="30">My Account</a>
<?php elseif (isset($_SESSION['admin'])) : ?>
    <a href="<?php echo $app_path; ?>admin">
                <img src = "../images/manager.png" width ="30" height="30">Admin</a>
<?php else : ?>
<a href="<?php echo $app_path; ?>">
<img src = "../images/home.png" width ="30" height="30">
           <?php echo 'Home'; ?></a>
<?php endif;?>
<?php include 'view/footer.php'; ?>