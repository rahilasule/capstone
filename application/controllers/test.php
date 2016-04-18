<?php
/**
 * Created by PhpStorm.
 * User: rahilasule
 * Date: 4/18/16
 * Time: 9:56 PM
 */

session_start();

if(isset($_SESSION['cart'])) {


    print_r($_SESSION['cart']);

}
else{
    echo "not set";
}