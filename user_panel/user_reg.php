
<?php
include_once 'C:/xampp/htdocs/project/shared/head.php';
include_once 'C:/xampp/htdocs/project/vendor/configDatabase.php';
include_once 'C:/xampp/htdocs/project/vendor/functions.php';
$error=[];
$message=null;
if(isset($_POST['send'])){
  $name=filterValidation($_POST['name']);
  $email=filterValidation($_POST['email']);
  $mobile=filterValidation($_POST['mobile']);
  $address=filterValidation($_POST['address']);
  $date=filterValidation($_POST['date']);
  $gender=filterValidation($_POST['gender']);
  $address_2=filterValidation($_POST['address_2']);
  $country=filterValidation($_POST['country']);
  $city=filterValidation($_POST['city']);
  $region=filterValidation($_POST['region']);
  $postal=filterValidation($_POST['postal_code']);
  $pass=filterValidation($_POST['pass']);
  $pass_2=filterValidation($_POST['pass_2']);

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
if(empty($gender)){
  $error[]="you must enter gender";
}
if(empty($country)){
  $error[]="you must enter country";
}
if(empty($city)){
  $error[]="you must enter city";
}
if(empty($region)){
  $error[]="you must enter region";
}
if(empty($postal)){
  $error[]="you must enter postal";
}
if($pass!=$pass_2){
  $error[]="your pass doesn't match";
}

if(empty($error)){
  $insert="INSERT INTO `users`VALUES (NULL,'$name','$email','$mobile','$address','$pass','$gender','$date','$address_2','$country','$city','$region','$postal') ";

  $i=mysqli_query($conn,$insert);
  if($i){
    $message="insert success";
  }
}










}

?>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="css/reg.css"/>
  </head>
  <body>
  <?php if(!empty($error)):?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($error as $err):?>
                    <li> <?=$err?></li>
                    <?php endforeach; ?>
            </ul>
        </div>
        
        <?php endif;?>
        <?php if ($message !=null):?>
                <div class="alert alert-warning col-3 alert-dismissible fade show" role="alert">
  <strong><?=$message?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>
    <section class="container">
      <header>Registration Form</header>
      <form action="#" class="form" method=post>
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" name=name required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" name=email required />
        </div>
        <div class="input-box">
          <label>password</label>
          <input type="password" placeholder="Enter your password" name=pass required />
        </div>
        <div class="input-box">
          <label>confirm password</label>
          <input type="password" placeholder="Enter your confirm password" name=pass_2 required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" placeholder="Enter phone number" name=mobile required />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" placeholder="Enter birth date" name=date required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" />
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input type="text" placeholder="Enter street address" name=address required />
          <input type="text" placeholder="Enter street address line 2" name=address_2  />
          <div class="column">
            <div class="select-box">
              <select name=country>
                <option hidden>Country</option>
                <option value="usa" >America</option>
                <option value="japan">Japan</option>
                <option value="india">India</option>
                <option value="neepal">Nepal</option>
              </select>
            </div>
            <input type="text" name="city" placeholder="Enter your city" required />
          </div>
          <div class="column">
            <input type="text" name="region" placeholder="Enter your region" required />
            <input type="number" name="postal_code" placeholder="Enter postal code" required />
          </div>
        </div>
        <button type=submit name=send>Submit</button>
      </form>
    </section>
  </body>
</html>