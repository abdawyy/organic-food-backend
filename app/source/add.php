<?php
include_once 'C:/xampp/htdocs/project/shared/head.php';
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include '../../vendor/configDatabase.php';
include_once '../../vendor/functions.php';
auth();
$message=null;
$error=[];

if (isset($_POST['send'])){
  $name=filterValidation( $_POST['name']);
  $type=filterValidation( $_POST['type']);
  $price=filterValidation( $_POST['price']);
  $stock=filterValidation($_POST['stock']);
  $desc=filterValidation($_POST['desc']);

  if(empty($name)){
    $error[]="you must enter name";
}
if(empty($type)){
    $error[]="you must enter type";
}
if(empty($price)){
    $error[]="you must enter price";
}
if(empty($stock)){
  $error[]="you must enter stock";
}
if(empty($_FILES['image'])){
    $error[]="you must enter image";
}
//image code
    $image_name=time(). rand(0,2000). $_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $location="./upload/$image_name";
    move_uploaded_file($tmp_name,$location);
 if(empty($error)){
    // insert code
    $insert="INSERT INTO `products`VALUES (NULL,'$name','$type','$price','$image_name','$desc','$stock',NULL,NULL)";
    $i=mysqli_query($conn,$insert);
    if($i){
        $message="insert success";
      }

 }
  
  
  header("location:add.php");

}


?>

<main id="main" class="main">

<section class="section">
    <?php if(!empty($error)):?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($error as $err):?>
                    <li> <?=$err?></li>
                    <?php endforeach;?>
            </ul>
        </div>
        <?php endif;?>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Products</h5>
              <?php if ($message !=null):?>
                <div class="alert alert-warning col-3 alert-dismissible fade show" role="alert">
  <strong><?=$message?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            </div>
            <?php endif?>
              <!-- General Form Elements -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">type</label>
                  <div class="col-sm-10">
                    <input type="text" name="type" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">price</label>
                  <div class="col-sm-10">
                    <input type="number" step="any" name="price" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">stock</label>
                  <div class="col-sm-10">
                    <input type="number" name="stock" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">description</label>
                  <div class="col-sm-10">
                    <input type="text" name="desc" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText"  class="col-sm-2 col-form-label">image</label>
                  <div class="col-sm-10">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>
              
            

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit " name="send"  class="btn btn-primary" >Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      
      </div>
    </section> 

<?php
include_once '../../shared/footer.php';
include_once '../../shared/script.php';



?>