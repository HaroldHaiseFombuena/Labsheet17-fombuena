<?php
  session_start();
    $title ='customers';
    include 'functions/customers.php';

    if(isset($_POST['delete'])){
      $cuscode = $_POST['cus_code'];
      if(deleteCustomer($cuscode)){
        $_SESSION['action']='delete';
        $_SESSION['msg']='Customer deleted successfully!';
        header('location:customers.php'); //refresh to preven re-submit
        exit;
      }
    }
    if(isset($_POST['search'])){
      $search = $_POST['txtsearch'];
      $customers = findCustomer($search);
    }else{
      $customers = getAllCustomers();
    }


?>
<!doctype html>
<html lang="en">
  <?php
    include 'components/head.php';
  ?>
  <body>
  <?php
    include 'components/nav-bar.php';
  ?>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar Menu -->
    <?php
      include 'components/side-bar.php';
    ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers</h1>        
      </div>
      <form method="post">
      <div>
        <div class = "mb-3 col-sm-13">
          <input type="text" name="txtsearch" class = "form-control">
        </div>
        <div>
          <input type= "submit" name="search" class="btn btn-primary">
        </div>
      </div>
    </form>
      <a href="product-form.php" class="btn btn-success text-white mb-3 float-right"><i class="fas fa-plus-square"></i> New Customer</a>
      <?php
       if(isset($_SESSION['action'])){
      ?>
      <div class="alert alert-success mt-3 col-6">
        <?=$_SESSION['msg']?>
      </div>
      <?php
        unset($_SESSION['action']);
       }
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Code</th>
              <th>Name</th>              
              <th>Initials</th>
              <th>areacode</th>
              <th>Phone</th>
              <th>Balance</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach($customers as $customer){
          ?>
            <tr>
              <td><?=$customer['cus_code']?></td>
              <td><?=$customer['fullname']?></td>
              <td><?=$customer['cus_initial']?></td>
              <td><?=$customer['cus_areacode']?></td>
              <td><?=$customer['cus_phone']?></td>
              <td><?=$customer['cus_balance']?></td>
              <td >
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                  
                  <button class="btn btn-primary btn-sm" name="update">
                    <input type= "hidden" name="cus_code" value ="<?=$customer['cus_code']?>">
                   <a href="" class="text-white">><i class="fas fa-pen"></i></a>
                </button>
                  <form method="post">
                    <input type= "hidden" name="cus_code" value ="<?=$customer['cus_code']?>">
                  <button class="btn btn-danger btn-sm" name = "delete">
                    <i class="fas fa-trash"></i>
                </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php } ?>           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="js/dashboard.js"></script>
  </body>
</html>