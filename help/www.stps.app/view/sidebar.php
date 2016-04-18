<div id="sidebar">
    <h2>Links</h2>
    <ul>
        <li>
            <a href="<?php echo $app_path . 'cart'; ?>">
               <img src = "../images/vcart.png" width ="30" height="30">
               View Cart</a>
        </li>
            <?php
            // Check if user is logged in and
            // display appropriate account links
            $account_url = $app_path . 'account';
            $logout_url = $account_url . '?action=logout';
            $cashup_url = $app_path .'cashup';
            if (isset($_SESSION['user'])) :
            ?>
                <li><a href="<?php echo $account_url; ?>">
                        <img src = "../images/cashier.png" width ="30" height="30">My Account</a></li>
                <li><a href="<?php echo $logout_url; ?>">
               <img src = "../images/exit.png" width ="30" height="30">Logout</a>
                <li><a href="<?php echo $cashup_url; ?>">
                        <img src = "../images/cash.jpg" width ="30" height="30">Cash Up</a>
            <?php else: ?>
                <li><a href="<?php echo $account_url; ?>">
                        <img src = "../images/login_icon.png" width ="30" height="30">Login/Register</a></li>
            <?php endif; ?>
        <li>
            <a href="<?php echo $app_path; ?>">
                <img src = "../images/home.png" width ="30" height="30">
               <?php echo 'Home'; ?>
            </a>
        </li>
        
        <h2>Categories</h2>
        <!-- display links for all categories -->
        <?php
            require_once('model/database.php');
            require_once('model/category_db.php');
            
            $categories = get_categories();
            foreach($categories as $category) :
                $name = $category['categoryName'];
                $id = $category['categoryID'];
                $url = $app_path . 'catalog?category_id=' . $id;
        ?>
        <li> 
            <a href="<?php echo $url; ?>"   >
               <img src = "../images/cart.gif" width ="30" height="30">
                   <?php echo $name; ?>
            </a>
        </li>
        <?php endforeach; ?>
        
    </ul>
</div>