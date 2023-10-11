<?php
include_once 'C:/xampp/htdocs/project/vendor/configDatabase.php';
include_once 'C:/xampp/htdocs/project/vendor/functions.php';
include_once 'C:/xampp/htdocs/project/user_panel/shared/head.php';
include_once 'C:/xampp/htdocs/project/user_panel/shared/header.php';
$z=array();
$counter=0;
$messge=null;
// request
if(isset($_GET['checkout'])){
$id=$_GET['id'];
$total_price=$_GET['total_price'];
$final=$_GET['final_price'];
$u="UPDATE `cart` SET product_price``='$total_price' WHERE id=$id ";
mysqli_query($conn,$u);
}
$select="SELECT * FROM `cart` ";
$row=mysqli_query($conn,$select);
$r=mysqli_num_rows($row);

// total price of product
function totalPrice($quantity,$price){
$x=$quantity*$price;
return $x;
};

if($r==0){
    $messge="your cart is empty";
}
// update button
if (isset($_POST['update'])){
    $quan=$_POST['quantity'];
    $id=$_POST['id'];
    $update="UPDATE `cart` SET `quantity`='$quan' WHERE id=$id ";
    mysqli_query($conn,$update);
    echo"<script>window.location.href='shoping-cart.php';</script>";

}


if (isset($_get['checkout']))


?>
<!DOCTYPE html>
<html lang="zxx">



<body>
    <!-- Page Preloder -->




    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <?php if($r>0) :?>
                            <tbody>
                                <?php foreach($row as $r):?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="../app/source/upload/<?= $r['image']?>" alt="" width=200 height=200 >
                                        <h5></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    <?= $r['price']?> LE
                                    </td>
                                    <td class="shoping__cart__price">
                                    <?= $r['name']?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <form method=post>
                                        <div class="">
                                            <div class="">
                                                <input type="text" name=quantity[] value=" <?= $r['quantity']?>" min=1>
                                                <input type=hidden name=id value="<?= $r['id']?>">
                                                <input type=hidden name=id value="<?= $r['id']?>">
                                                <a href="?id=<?= $r['id']?> " id="someID" style="visibility: hidden">Check</a>
                                            </div>
                                        </div>
                                        <button name=update class="btn btn-primary m-5">update</button>
                                    <td class="shoping__cart__price">
                                        <?= $z[]=totalPrice($r['quantity'],$r['price']);
  
                                        
                                        
                                        ?> LE



                                    <input type=hidden value=<?= $z[$counter]?>name=total_price>
                                    <a href="?total_price=<?= $z[$counter]?>" id="someID" style="">Check</a>
                                    </div>

                                    <?php 
                                   
                                
                                    



                                    $counter++;
                                    ?>
                                    </td>
                                        

                                        
                                </form>
                                    </td>
                                    <td class="shoping__cart__total">
                                        
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                               <?php endforeach?>
                            </tbody>
                            <?php else:?>
                                <div class="container m-5">
                                    <h1><?= $messge ?>

                                </div>
                                <?php endif?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                        <form  action=checkout.php method=get>
                            <li>Subtotal <span><?=$finalPrice=array_sum($z);?> LE</span></li>
                            <li>Total <span><?= $finalPrice=array_sum($z); ?> LE</span></li>
                        </ul>
                        <input type=hidden name=final_price value=<?= $finalPrice ?>>
                        <button class="primary-btn" name=checkout >PROCEED TO CHECKOUT</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->





</body>

</html>
<?php

include_once 'C:/xampp/htdocs/project/user_panel/shared/footer.php';
include_once 'C:/xampp/htdocs/project/user_panel/shared/script.php';
?>