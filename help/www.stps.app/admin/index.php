<?php 
    require_once('../util/main.php');
    require_once('../util/secure_conn.php');
    require_once('../util/valid_admin.php');
?>
<?php 
    include 'view/header.php';
    include 'view/menu_sidebar.php';
?>

<div id="content">
    <h1 class="top">Admin Menu</h1>
    <p><a href="product">
    <img src = "../images/productm.jpg" width ="50" height="50">Product Manager</a></p>
    <p><a href="category">
    <img src = "../images/category.png" width ="50" height="50">Category Manager</a></p>
    <p><a href="sales">
    <img src = "../images/salem.jpg" width =50" height="50">Sales Manager</a></p>
    <p><a href="account">
    <img src = "../images/accountm.png" width ="50" height="50">Account Manager</a></p>

</div>

<?php include 'view/footer.php'; ?>
