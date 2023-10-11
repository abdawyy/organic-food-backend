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
$select="SELECT * FROM `products` ";
$allData=mysqli_query($conn,$select);
// DELETE
if (isset($_GET['delete'])){
    $id=filterValidation($_GET['delete']);
    $delete="DELETE FROM `products` WHERE ID =$id";
    $d=mysqli_query($conn,$delete); //RUN
    header("location:list.php");
    path('category/list.php');

}
?>
<main id="main" class="main">

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatable product</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">type</th>
                    <th scope="col">price per kg</th>
                 
                    <th scope="col" colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($allData as $items):?>
                  <tr>
                            <th scope="row"><?=$counter++ ?></th>
                    <th scope="row"><?= $items['ID'] ?></th>
                    <th scope="row"><?= $items['name'] ?></th>
                    <th scope="row"><?= $items['type'] ?></th>
                    <th scope="row"><?= $items['price'] ?></th>

                    <th scope="row">
                        <a href="?delete=<?= $items['ID']?>" class="btn btn-danger">delete</a>
                        <a href="<?= url("app/source/update.php?edit=") . $items['ID'] ?>" class="btn btn-warning"> edit</a>
                        <a href="<?= url("app/source/show.php?show=") . $items['ID'] ?>" class="btn btn-primary"> show</a>

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