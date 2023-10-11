<?php
include_once 'C:/xampp/htdocs/project/shared/head.php';
include_once 'C:/xampp/htdocs/project/vendor/configDatabase.php';
include_once 'C:/xampp/htdocs/project/vendor/functions.php';
?>

<link rel="stylesheet" href="<?= url_user("/css/profile.css")?>"  type="text/css">
<div class="container rounded bg-white mt-5 mb-5">
    <a href=index.php>home</a>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?= $_SESSION['admin']['name'] ?></span><span class="text-black-50"><?= $_SESSION['admin']['email'] ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">your profile</h4><div class=""></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><div class=""><?= $_SESSION['admin']['name'] ?></div></div>
                 
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><div class=""><?= $_SESSION['admin']['mobile'] ?></div></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><div class=""><?= $_SESSION['admin']['address'] ?></div></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><div class=""><?= $_SESSION['admin']['address-2'] ?></div></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><div class=""><?= $_SESSION['admin']['p'] ?></div></div>
                    <div class="col-md-12"><label class="labels">gender</label><div class=""><?= $_SESSION['admin']['gender'] ?></div></div>
                    <div class="col-md-12"><label class="labels">birth-date</label><div class=""><?= $_SESSION['admin']['date'] ?></div></div>
                    <div class="col-md-12"><label class="labels">city</label><div class=""><?= $_SESSION['admin']['city'] ?></div></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><div class=""><?= $_SESSION['admin']['country'] ?></div></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><div class=""><?= $_SESSION['admin']['r'] ?></div></div>
                </div>
                <div class="mt-5 text-center">
                
                <a class="btn btn-primary profile-button" href="<?= url_user("/index.php")?>" type="button">Home</a></div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                
            </div>
        </div>
    </div>
</div>
</div>
</div>