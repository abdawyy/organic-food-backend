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
  $pass=filterValidation($_POST['pass']);
  $mobile=filterValidation($_POST['number']);
  $address=filterValidation($_POST['address']);
  $email=filterValidation($_POST['email']);
  if(empty($name)){
    $error[]="you must enter name";
}
if(empty($pass)){
    $error[]="you must enter password";
}
if(empty($mobile)){
    $error[]="you must enter mobile";
}
if(empty($address)){
  $error[]="you must enter address";
}
if(empty($email)){
  $error[]="you must enter email";
}
if(empty($error)){
  $insert="INSERT INTO `admins`VALUES (NULL,'$name','$email','$pass','$mobile','$address') ";
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
              <h5 class="card-title">Add admin</h5>
              <?php if ($message !=null):?>
                <div class="alert alert-warning col-3 alert-dismissible fade show" role="alert">
  <strong><?=$message?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            </div>
            <?php endif?>
              <!-- General Form Elements -->
              <form method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword"  class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="pass" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">phone</label>
                  <div class="col-sm-10">
                    <input type="number" name="number" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control">
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