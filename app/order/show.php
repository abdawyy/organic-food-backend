<?php
include_once 'C:/xampp/htdocs/project/shared/head.php';
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include '../../vendor/configDatabase.php';
include_once '../../vendor/functions.php';
auth();
//READ 
$message=null;
$counter=0;
if(isset($_GET['show'])){
    $id=$_GET['show'];
    $select="SELECT * FROM `orders_value` WHERE user_id=$id ";
    $allData=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($allData);
    $customerDetails="SELECT * FROM `customer_orders`where ID=$id ";
    $userRow=mysqli_query($conn,$customerDetails);


}

// DELETE

?>
<main id="main" class="main">

    
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">email</th>
                    <th scope="col">number</th>
                    <th scope="col">total price</th>
                  </tr>
                </thead>
              <tbody>
                    <?php foreach ($userRow as $items):?>
                  <tr>
                            <th scope="row"><?=$counter++ ?></th>
                    <th scope="row"><?= $items['ID'] ?></th>
                    <th scope="row"><?= $items['first_name'] ?></th>
                    <th scope="row"><?= $items['last_name'] ?></th>
                    <th scope="row"><?= $items['email'] ?></th>
                    <th scope="row"><?= $items['mobile'] ?></th>
                    <th scope="row"><?= $items['total_price'] ?></th>

                  
                  <?php endforeach?></tr>
                  <tr> <th colspan=8> #ORDER DETAILS</th> </tr>

                    <tr>
                    <th scope="col"> number </th> 
                    <th scope="col"> order_ID </th> 
                    <th scope="col"> order_date </th>
                    <th scope="col"> order_total_product</th>
                    <th scope="col">quantity</th>
                    <th scope="col">product name</th>
                    <th scope="col"> product type</th>
                    <th scope="col"> product price</th>
                    
                </tr>

                <?php foreach ($allData as $r) :?>
                    <tr>
                            <th scope="row"><?=$counter++ ?></th>
                    <th scope="row"><?= $r['order_id'] ?></th>
                    <th scope="row"><?= $r['order_date'] ?></th>
                    <th scope="row"><?= $r['quantity'] * $r['product_price'] ?></th>
                    <th scope="row"><?= $r['quantity'] ?></th>
                    <th scope="row"><?= $r['product_name'] ?></th>
                    <th scope="row"><?= $r['product_type'] ?></th>
                    <th scope="row"><?= $r['product_price'] ?></th>

                </tr> 

<?php endforeach?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->



</div>
</div>






</main>



<?php
include_once '../../shared/footer.php';
include_once '../../shared/script.php';



?> 