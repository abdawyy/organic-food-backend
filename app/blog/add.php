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
  $name=filterValidation($_POST['name']);
  $title=filterValidation($_POST['title']);
  $desc=filterValidation($_POST['desc']);
  $date=filterValidation($_POST['date']);
  $image=filterValidation($_POST['image']);

  $image_name=time(). rand(0,2000). $_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$location="./upload/$image_name";
move_uploaded_file($tmp_name,$location);

  if(empty($name)){
    $error[]="you must enter name";
}
if(empty($title)){
    $error[]="you must enter title";
}
if(empty($desc)){
    $error[]="you must enter description";
}
if(empty($date)){
  $error[]="you must enter date";
}
if(empty($_FILES['image']['name'])){
  $error[]="you must enter image";
}

if(empty($error)){
  $insert="INSERT INTO `blog`VALUES (NULL,'$name','$title','$desc','$date','$image_name') ";
  $i=mysqli_query($conn,$insert);
  if($i){
    $message="insert success";
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
                    <?php endforeach; ?>
            </ul>
        </div>
        <?php endif;?>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add blog</h5>
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
                  <label for="inputText" class="col-sm-2 col-form-label">title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword"  class="col-sm-2 col-form-label">date of relases</label>
                  <div class="col-sm-10">
                    <input type="date" name="date" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">description</label>
                  <div class="col-sm-10">
                    <textarea  name="desc" class="form-control"> </textarea>
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