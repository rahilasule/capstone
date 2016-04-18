<?php
require_once('../util/main.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/appliedProject/help/www.stps.app/util/secure_conn.php');

require_once('/Applications/XAMPP/xamppfiles/htdocs/appliedProject/help/www.stps.app/model/cashier_db.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/appliedProject/help/www.stps.app/model/product_db.php');

if (isset($_SESSION['admin'])) {
    display_error('You cannot login to the user section while ' .
                  'logged in as admin.');
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_SESSION['user'])) {
    $action = 'view_account';
} else {
    $action = 'view_login';
}

switch ($action) {
    case 'view_login':
        include 'account_login_register.php';
        break;
    case 'view_register':
        include 'account_register.php';
        break;
    case 'register':
        // Store user data in local variables
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        // Store data in the session
        $_SESSION['form_data'] = array();
        $_SESSION['form_data']['email'] = $email;
        $_SESSION['form_data']['first_name'] = $first_name;
        $_SESSION['form_data']['last_name'] = $last_name;

        

        // Validate user data
        // TODO: Improve this validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            display_error('The e-mail address ' . $email . ' is not valid.');
        } elseif (is_valid_cashier_email($email)) {
            display_error('The e-mail address ' . $email . ' is already in use.');
        }
        if (empty($first_name)) {
            display_error('First name is a required field.');
        }
        if (empty($last_name)) {
            display_error('Last name is a required field.');
        }
        if (empty($password_1) || empty($password_2)) {
            display_error('Password is a required field.');
        } elseif ($password_1 !== $password_2) {
            display_error('Passwords do not match.');
        } elseif (strlen($password_1) < 6) {
            display_error('Password must be at least six characters.');
        }
        
        //Add Sales person
        $cashier_id = add_cashier($email, $first_name, $last_name,
                      $password_1, $password_2);

        // Set up session data
        unset($_SESSION['form_data']);
        $_SESSION['user'] = get_cashier($cashier_id);

            redirect('.');
                
        break;
    case 'login':
        $email = $_POST['email'];
        $password = $_POST['password'];

        // If valid username/password, login
        // TODO: Improve this validation
        if (is_valid_cashier_login($email, $password)) {
            $_SESSION['user'] = get_cashier_by_email($email);
        } else {
            display_error('Login failed. Invalid email or password.');
        }

            redirect('.');
        break;
    case 'view_account':
        $cashier_name = $_SESSION['user']['firstName'] . ' ' .
                         $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['emailAddress'];

        include 'account_view.php';
        break;
    case 'view_sale':
        $sale_id = $_GET['sale_id'];
        $sale = get_sale($sale_id);
        $sale_date = strtotime($sale['saleDate']);
        $sale_date = date('M j, Y', $sale_date);
        $sale_items = get_sale_items($sale_id);

        include 'account_view_sale.php';
        break;
    case 'view_account_edit':
        $first_name = $_SESSION['user']['firstName'];
        $last_name = $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['emailAddress'];
        include 'account_edit.php';
        break;
    case 'update_account':
        // Get the cashier data
        $cashier_id = $_SESSION['user']['cashierID'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        // Get the old data for the cashier
        $old_cashier = get_cashier($cashier_id);

        // Validate the data for the cashier
        if ($email != $old_cashier['emailAddress']) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                display_error('The e-mail address ' . $email . ' is not valid.');
            } elseif (is_valid_cashier_email($email)) {
                display_error('The e-mail address ' . $email . ' is already in use.');
            }
        }
        if (empty($first_name)) {
            display_error('First name is a required field.');
        }
        if (empty($last_name)) {
            display_error('Last name is a required field.');
        }

        // Only validate the passwords if they are NOT empty
        if (!empty($password_1) && !empty($password_2)) {
            if ($password_1 !== $password_2) {
                display_error('Passwords do not match.');
            } elseif (strlen($password_1) < 6) {
                display_error('Password must be at least six characters.');
            }
        }

        // Update the cashier data
        update_cashier($cashier_id, $email, $first_name, $last_name,
            $password_1, $password_2);

        // Set the new cashier data in the session
        $_SESSION['user'] = get_cashier($cashier_id);

        redirect('.');
        break;
    case 'logout':
        unset($_SESSION['user']);
        redirect('..');
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>