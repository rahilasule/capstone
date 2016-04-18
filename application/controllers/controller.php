<?php
/**
 * Created by PhpStorm.
 * User: rahilasule
 * Date: 4/18/16
 * Time: 6:07 PM
 */
session_start();

include_once '../../application/models/item.php';

if(isset($_REQUEST['cmd'])){
    $c = $_REQUEST['cmd'];

    switch ($c) {
        case 1:
            getDetails();
            break;

        case 2:
            add();
            break;

        default:
            # code...
            break;
    }
}

function getDetails(){

    $id = $_GET['id'];
    $i = new item ();

    $data = $i->view_item($id);
    if(!$data){
        echo '{"result":0, "message":"Error."}';
    }
    else{
        $row = $data->fetch_array(MYSQLI_ASSOC);
        echo '{"result":1,"item_id":"'.$row['item_id'].'","item_name":"'.$row['item_name'].'","price":'.$row['price'].'}';
    }

}

function add(){
    $i = new item();

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $qty = $_GET['qty'];
        $sub = $_GET['sub'];

        if (!isset($_SESSION['cart'][$id])) {
            $cc = $i->view_item($id);
            $item_sale = $cc->fetch_array(MYSQLI_ASSOC);

            $_SESSION['cart'][$id] = [
                'item_id' => $item_sale['item_id'],
                'item_name' => $item_sale['item_name'],
                'price' => $item_sale['price'],
                'quantity' => $qty,
                'subtotal' => $sub
            ];
            echo '{"result":1}';
        }
        else{
            echo '{"result":0}';
        }
    }

    //print_r($_SESSION['cart']);
//    echo echo'hello';
}