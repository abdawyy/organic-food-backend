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
$select="SELECT * FROM `users_message`";
$allData=mysqli_query($conn,$select);
// DELETE
if (isset($_GET['delete'])){
    $id=filterValidation($_GET['delete']);
    $delete="DELETE FROM `blog` WHERE ID =$id";
    $d=mysqli_query($conn,$delete); //RUN
    header("location:list.php");
    path('blog/list.php');

}
?>
<main id="main" class="main">

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatable blog</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">message</th>
                 
                    <th scope="col" colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($allData as $items):?>
                  <tr>
                            <th scope="row"><?=$counter++ ?></th>
                    <th scope="row"><?= $items['name'] ?></th>
                    <th scope="row"><?= $items['email'] ?></th>
                    <th scope="row"><?= $items['description'] ?></th>
                 

                    <th scope="row">
                        <a href="<?= url("app/message/show.php?show=") . $items['email'] ?>" class="btn btn-primary"> show</a>

                    </th>
                  </tr>
                  <?php endforeach?>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section> 


</main>



<?php
include_once '../../shared/footer.php';
include_once '../../shared/script.php';



?>