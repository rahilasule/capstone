<?php
/**
 * author: Rahila Sule
 * description: A class to manage all item functions.
 * date: 17-03-2016
 */

include_once("adb.php");
class item extends adb
{
	//constructor for item class
//	function item()
//	{
//
//	}

	//adds item to database
	function add_item($item_name, $qty, $price,$reorder_qty,$description)
	{
		$str_query="INSERT INTO inventory SET item_name='$item_name', quantity='$qty', price='$price', reorder_qty='$reorder_qty', description='$description'";
		return $this->query($str_query);
	}

	//edits item details in database
	function edit_item($item_id,$item_name, $qty, $price,$reorder_qty,$description)
	{
		$str_query="UPDATE inventory SET item_name='$item_name', quantity='$qty', price='$price', reorder_qty='$reorder_qty', description='$description'
			WHERE item_id=$item_id";
		return $this->query($str_query);
	}

	//search database records for a item record based on item name
	function search_item($str)
	{
		$str_query="SELECT * FROM inventory WHERE item_name LIKE '%$str%'";
		return $this->query($str_query);

	}

	//allows view of a single item
	function view_item($item_id)
	{
		$str_query="SELECT * FROM inventory WHERE item_id='$item_id'";
		return $this->query($str_query);
	}

	//allows view of all item records
	function view_all_items()
	{
		$str_query="SELECT * FROM inventory";
		return $this->query($str_query);
	}

	//allows view of all items in stock
	function view_items_instock()
	{
		$str_query="SELECT * FROM inventory WHERE quantity > 0";
		return $this->query($str_query);
	}

	//allows view of all items low in stock
	function view_lowstock()
	{
		$str_query="SELECT * FROM inventory WHERE quantity < reorder_qty AND quantity !=0";
		return $this->query($str_query);
	}

	//allows view of sold out stock
	function view_soldout()
	{
		$str_query="SELECT * FROM inventory WHERE quantity = 0";
		return $this->query($str_query);
	}


	// Create an empty cart if it doesn't exist
	// if (!isset($_SESSION['cart']) ) {
	//     $_SESSION['cart'] = array();
	// }

	// Add an item to the cart
	function cart_add_item($item_id, $quantity) {
	    $_SESSION['cart'][$item_id] = round($quantity, 0);

	}

	// Update an item in the cart
	function cart_update_item($item_id, $quantity) {
	    if (isset($_SESSION['cart'][$item_id])) {
	        $_SESSION['cart'][$item_id] = round($quantity, 0);
	    }
	}

	// Remove an item from the cart
	function cart_remove_item($item_id) {
	    if (isset($_SESSION['cart'][$item_id])) {
	        unset($_SESSION['cart'][$item_id]);
	    }
	}

	// Get an array of items for the cart
	function cart_get_items() {
	    $items = array();
	    foreach ($_SESSION['cart'] as $item_id => $quantity ) {
	        // Get product data from db
	        $item = view_item($item_id);
	        $price = $item['price'];
	        $quantity = intval($quantity);
	        $totalQuantity = $item['totalQuantity'];
	        
	        // Calculate total
	        $total = round($price * $quantity, 2);

	        // Store data in items array
	        $items[$item]['name'] = $item['itemName'];
	        $items[$item]['price'] = $price;
	        $items[$item]['quantity'] = $quantity;
	        $items[$item]['total'] = $total;
	        $items[$item]['totalQuantity'] = $totalQuantity;
	        
	    }
	    return $items;
	}

	// Get the number of products in the cart
	function cart_product_count() {
	    return count($_SESSION['cart']);
	}

	// Get the number of items in the cart
	function cart_item_count () {
	    $count = 0;
	    $cart = cart_get_items();
	    foreach ($cart as $item) {
	        $count += $item['quantity'];
	    }
	    return $count;
	}

	// Get the subtotal for the cart
	function cart_balance () {
	    $balance = 0;
	    $cart = cart_get_items();
	    foreach ($cart as $item) {
	        $balance += $item['total'];
	    }
	    return $balance;
	}

	// Remove all items from the cart
	function clear_cart() {
	    $_SESSION['cart'] = array();
	}

	// Set the product for the last item added to the cart
	function set_last_item($item, $item_name) {
	    $_SESSION['last_product_id'] = $item_id;
	    $_SESSION['last_product_name'] = $item_name;
	}
	
}
?>