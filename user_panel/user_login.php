
<?php
include_once 'C:/xampp/htdocs/project/shared/head.php';
include_once 'C:/xampp/htdocs/project/vendor/configDatabase.php';
include_once 'C:/xampp/htdocs/project/vendor/functions.php';
$message=null;
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['pass'];
$query="SELECT * FROM users where `e-mail`='$email' and `password`='$password' ";
$q=mysqli_query($conn,$query);
$r=mysqli_fetch_assoc($q);
$num_of_r=mysqli_num_rows($q);
  if($num_of_r==1){
    $_SESSION['admin']=[
      "id"=>$r['ID'],
      "email"=>$email,
      "mobile"=>$r['mobile'],
      "gender"=>$r['gender'],
      "date"=>$r['date'],
      "address"=>$r['address'],
      "country"=>$r['country'],
      "city"=>$r['city'],
      "add-2"=>$r['address_2'],
      "r"=>$r['region'],
      "p"=>$r['postal_code'],
      "name"=>$r['name'],
      "last"=>$r['last_name']


    ];
    header("location:/project/user_panel/index.php");
  }
    else{
$message ="wrong email or password";
    }
  }

?>
    <link rel="stylesheet" href="<?= url_user("/css/log.css")?>"  type="text/css">

  <main>
    <div class="container">
    <?php if ($message !=null):?>
                <div class="alert alert-danger col-3 alert-dismissible fade show m-5" role="alert">
  <strong><?=$message?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif?>

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Organic food</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method=post>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">email</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-success w-100" type="submit" name=login>Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="<?= url_user("/user_reg.php")?>">Create an account</a></p>
                      <a href="<?= url_user("/index.php")?>">Home</a>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <?php
include_once './shared/script.php';
?>