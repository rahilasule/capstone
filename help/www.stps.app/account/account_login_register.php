<?php include '../view/header.php'; ?>
<div id="content">

    <h1>Login</h1>
    <form action="" method="post" id="login_form">
        <input type="hidden" name="action" value="login" />

        <label>E-Mail:</label>
        <input type="text" name="email" size="30" />
        <br />

        <label>Password:</label>
        <input type="password" name="password" size="30" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Login" />
    </form>

    <h1>Register</h1>
    <form action="" method="post">
        <input type="hidden" name="action" value="view_register" />
        <input type="submit" value="Register" />
    </form>
    <p align="right">
            <button onclick =" history.go(-1);">Back</button>
        </p>
</div>
<?php include '../view/footer.php'; ?>
