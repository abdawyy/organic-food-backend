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
    $select="SELECT * FROM `products` WHERE ID=$id ";
    $allData=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($allData);


}

// DELETE

?>
<main id="main" class="main">
<div class="card">
<img src="./upload/<?= $row['image']?>" alt="" class="img-top m-5" width=500px height=500px>

<div class="card-body">
    <h6> Name :<?= $row['name']?></h6>
    <hr>
    <h6> type :<?= $row['type']?></h6>
    <hr>
    <h6> price per kg :<?= $row['price']?></h6>
    <hr>

</div>
</div>






</main>



<?php
include_once '../../shared/footer.php';
include_once '../../shared/script.php';



?>