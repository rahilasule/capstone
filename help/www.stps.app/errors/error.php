<?php include 'view/header.php'; ?>
<div id="content">
    <h2>Error</h2>
    <p><?php echo $error_message; ?></p>
<?php if (isset($_SESSION['user'])) : ?>
	<img src = "../images/stopp.png" width ="100" height="100">
	<br/>
	<br/>
    <a href="<?php echo $app_path; ?>account">
    <img src = "../images/cashier.png" width ="30" height="30">My Account</a>
	
<?php elseif (isset($_SESSION['admin'])) : ?>
	<img src = "../../images/stopp.png" width ="100" height="100">
	<br/>
	<br/>
    <a href="<?php echo $app_path; ?>admin">
                <img src = "../../images/manager.png" width ="30" height="30">Admin</a>
<?php else : ?>
<a href="<?php echo $app_path; ?>">
           <?php echo 'Home'; ?></a>
<?php endif;?>
</div>
<?php include 'view/footer.php'; ?>