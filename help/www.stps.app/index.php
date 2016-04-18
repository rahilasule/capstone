<?php
include 'view/header.php'; 
require_once('util/main.php');
require('./model/database.php');
require('./model/category_db.php');
require('./model/product_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

    if ($action == 'list_products') {
        $category_id = "";
     if (isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
     }
     if (empty($category_id)) {
            $category_id = 1;
    }

    
    // Get item and category data
    $current_category = get_categories($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
}
 ?>  
        
    <table border ="0">
        <td>
        <img src = "images/a.jpg" name = "banner" height = "50" width = "145" />
        </td>
        <td style="color:white">
        ......................
        </td>
        <td>
        <img src = "images/a.jpg" name = "banner" height = "50" width = "145" />
        </td>
        <td style="color:white">
        ......................
        </td>
        <td>
        <img src = "images/a.jpg" name = "banner" height = "50" width = "145" />
        </td>
        <td style="color:white">
        ......................
        </td>
        <td>
        <img src = "images/a.jpg" name = "banner" height = "50" width = "145" />
        </td>
        
    </table>  
    <div id="sidebar">
        <!-- display a list of categories -->
        <h2>Categories</h2>
         <!-- display links for all categories -->
          <ul>
             <?php foreach ($categories as $category) : ?>
            <li>
            <a href="?category_id=<?php echo $category['categoryID']; ?>">
                <img src = "images/category.png" width ="30" height="30">
                <?php echo $category['categoryName']; ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
<div id="content">
    
    <h1>WELCOME, PLEASE LOGIN TO INTERACT WITH THE SYSTEM</h1>
        
        <table>
            <tr>
                <th>
                    <a href="account/index.php"><img src = "images/cashier.png" width ="80" height="80"></th>
                <th>&nbsp;</a></th>
                <th>
                    <a href="admin/account/index.php"><img src = "images/manager.png" width ="80" height="80"></a></th>
            </tr>
            <tr>
                <td><form action="account/index.php" method="post" >
                    <input type="submit" value="Cashier/Sales_Person" />
                    </form></td>
                    <td style="color:white">
                    <b><--------------------------------></b></td>
                <td><form action="admin/account/index.php" method="post" >
                    <input type="submit" value="Admin/Manager" />
                    </form></td>
            </tr>
        </table><br/>
        <h2><?php echo 'List of products based on categories'; ?></h2>
        <?php if (count($products) == 0) : ?>
        <p>There are no products in this category.</p>
        <?php else: ?>
        <!-- display a table of items -->
        <table border ="1">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Color / Flavor</th>
                <th class="right">Price</th>
                <th>Total Quantity</th>
                <th>Size</th>
                
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr><td>
                <?php echo $product['productCode']; ?></td>
                <td><?php echo $product['productName']; ?>
                </td>
                <td><?php echo $product['colorFlavour']; ?></td>
                <td class="right"><?php echo $product['price']; ?>
                </td>
                <td><?php echo $product['totalQuantity']; ?></td>
                <td><?php echo $product['size']; ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
<script type ="text/javascript">
<!--Hide from old browsers
var rotateBanner;
var banner = new Array(12);
var curBanner = 0;
    banner[0] = "images/prod.jpg"; banner [1] = "images/a.jpg"; banner [2] = "images/b.gif";
    banner [3] = "images/d.jpg"; banner [4] = "images/e.jpg"; banner [5] = "images/f.jpg";
    banner [6] = "images/h.jpg"; banner [7] = "images/i.jpg"; banner [8] = "images/j.jpg";
    banner [9] = "images/k.jpg"; banner [10] = "images/l.jpg"; banner [11] ="images/m.jpg";
                
function rotate(){
    if(curBanner == 11)
        curBanner = 0;
    else
        ++curBanner;
    document.images[0].src = banner[curBanner];
    document.images[1].src = banner[curBanner];
    document.images[2].src = banner[curBanner];
    document.images[3].src = banner[curBanner];
}
function startRotating(){
    rotateBanner = setInterval("rotate()", 1000);
}
//--></script>
    </div>
<?php include 'view/footer.php'; ?>
