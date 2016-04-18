<?php include '../view/header.php'; ?>
<div id="content">
    <h1 class="top">Register</h1>
    <form action="" method="post" id="register_form">

        <h2>Cashier Information</h2>
        <input type="hidden" name="action" value="register" />

        <label>E-Mail:</label>
        <input type="text" name="email"
               size="30" />
        <br />

        <label>Password:</label>
        <input type="password" name="password_1" size="30" /> Must be 6 at least Characters
        <?php 'Re-enter Password!'; ?>
        <br />

        <label for="password_2">Retype Password:</label>
        <input type="password" name="password_2" size="30" />
        <br />

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name"
               size="30" />
        <br />

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name"
               size="30" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Register" />
    </form>
    
    <p align="right">
            <button onclick =" history.go(-1);">Back</button>
        </p>
</div>
<?php
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>
<?php include '../view/footer.php'; ?>