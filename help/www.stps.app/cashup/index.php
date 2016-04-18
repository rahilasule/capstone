<?php include '../view/header.php'; ?>
<div id="content">

    <h1>Login Before Cash up</h1>
    <form action="cash_up.php" method="post" id="logon_form">
        <input type="hidden" name="action" value="logon" />

        <label>Password:</label>
        <input type="password" name="password" size="30" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="LogOn" />
    </form>
</div>
<?php include '../view/footer.php';?>
    