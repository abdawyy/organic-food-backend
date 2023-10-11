<?php
include_once 'C:/xampp/htdocs/project/vendor/configDatabase.php';
include_once 'C:/xampp/htdocs/project/vendor/functions.php';
include_once 'C:/xampp/htdocs/project/user_panel/shared/head.php';
include_once 'C:/xampp/htdocs/project/user_panel/shared/header.php';
$final_price=$_GET['final_price'];
echo"$final_price";
$select="SELECT* FROM `users`";
$row=mysqli_query($conn,$select);

$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('Y-m-d');
$selectcart="SELECT*FROM `cart`";
$cartRow=mysqli_query($conn,$selectcart);



if(isset($_POST['submit'])){
    $userid=$_POST['id'];

   

   
    $insert="INSERT INTO `order`( `date`,`total`, `user_fk`) VALUES ('$currentDate',$final_price,$userid)";
    $qurey=mysqli_query($conn,$insert);
    $selectcart="SELECT * FROM `cart`";
    $qureyCart=mysqli_query($conn,$selectcart);
  
    $selectOrder="SELECT *FROM `order`";
    $queryOrder=mysqli_query($conn,$selectOrder);
    foreach($queryOrder as $q){
        $order_id=$q['ID'];

    }
    foreach($qureyCart as $q){
        $quantity=$q['quantity'];
        $product_id=$q['product_fk'];

        
    $insert2="INSERT INTO `orders_products`( `order_id`,`product_id`, `quantity`) VALUES ($order_id,$product_id,$quantity)";
    $queryCheckout=mysqli_query($conn,$insert2);
    }
    $deleteCart="DELETE * FROM `cart`";
    $del=mysqli_query($conn,$deleteCart);
    echo"<script>window.location.href='index.php';</script>";
 

   
}



?>
<!DOCTYPE html>
<html lang="zxx">


<body>
    


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action=""method=post>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" value="<?= $_SESSION['admin']['name']?>"name=first>
                                        <input type="text" value="<?= $_SESSION['admin']['id']?>"name=id>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" value="<?= $_SESSION['admin']['last']?>" name=last>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" value=<?= $_SESSION['admin']['country'] ?>  name=country>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address"
                                 class="checkout__input__add" value=<?= $_SESSION['admin']['address'] ?>
                                 name=address
                                 >
                                
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text"name=city value=<?= $_SESSION['admin']['city'] ?>>
                            </div>
                            <div class="checkout__input">
                                <p>region<span>*</span></p>
                                <input type="text"value=<?= $_SESSION['admin']['r'] ?> name=region >
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" value=<?= $_SESSION['admin']['p'] ?> name=postal>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text"value=<?= $_SESSION['admin']['mobile'] ?> name=mobile>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" value=<?= $_SESSION['admin']['email'] ?> name=email>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                          
                                <div class="checkout__order__total">Total <span><?= $final_price?> LE</span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <input type="hidden" name=date value=<?= $currentDate?>>
                                <button type="submit" class="site-btn" name=submit>PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

 

</body>

</html>
<?php

include_once 'C:/xampp/htdocs/project/user_panel/shared/footer.php';
include_once 'C:/xampp/htdocs/project/user_panel/shared/script.php';
?>