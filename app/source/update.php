<?php
include_once 'C:/xampp/htdocs/project/shared/head.php';
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include '../../vendor/configDatabase.php';
include_once '../../vendor/functions.php';
auth();
$error=[];
$message=null;
$_FILES["i"];
if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $selectOneROW="SELECT*FROM `products` WHERE ID=$id";
    $oneRow=mysqli_query($conn,$selectOneROW);
    $rowData=mysqli_fetch_assoc($oneRow);

    if(isset($_POST['update'])){
        $name=filterValidation($_POST['name']);
        $type=filterValidation($_POST['type']);
        $price=filterValidation($_POST['price']);

        if(!empty($_FILES['i']['full_path'])){
            $image_name=time(). rand(0,2000). $_FILES['i']['name'];
            $tmp_name=$_FILES['i']['tmp_name'];
            $location="./upload/$image_name";
            move_uploaded_file($tmp_name,$location);

            $oldimage=$rowData['image'];
            unlink("./upload/$oldimage");
        }
        else{
        $image_name= $rowData["image"];
        }

        

        if(empty($name)){
            $error[]= "you must enter name";
        }
        if(empty($type)){
            $error[]= "you must enter type";
        }
        if(empty($price)){
            $error[]= "you must enter price";
        }
     
        if(empty($error)){
        $update="UPDATE `products` SET `name`='$name',`type`='$type',`price`='$price', `image`='$image_name' where ID=$id";
      $i=  mysqli_query($conn,$update);
        if($i){
            $message="update success";
          }
     
        
    }
}



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
              <h5 class="card-title">update product</h5>
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
                    <input type="text" name="name" value="<?= $rowData['name'] ?>" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">type</label>
                  <div class="col-sm-10">
                    <input type="text" name="type"  value="<?= $rowData['type'] ?>" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword"  class="col-sm-2 col-form-label">Price per KG</label>
                  <div class="col-sm-10">
                    <input type="number" name="price" value="<?= $rowData['price'] ?>" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                
                  <label for="inputtext"  class="col-sm-2 col-form-label">image</label>
                 
                  <div class="col-sm-10">
                  <img width="50px" height="50" src="./upload/<?= $rowData['image'] ?>">
                    <input type="file" name="i" class="form-control">
                  </div>
                </div>
              
              
            

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">update Button</label>
                  <div class="col-sm-10">
                    <button type="submit " name="update"  class="btn btn-warning" >Update Form</button>
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
