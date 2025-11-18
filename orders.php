<?php

$title ='orders';
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
        <h1 class="h2">Orders</h1>        
      </div>
            
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Customer</th>
              <th>Date</th>              
              <th>Sub total</th>
              <th>Tax</th>
              <th>Total</th>
            </tr>
          </thead>
          <?php
            include 'functions/products.php';
            $orders = getInvoice();
          ?>
          <tbody>
          <?php
            foreach($orders as $order){
          ?>
            <tr>
              <td><?=$order['inv_number']?></td>
              <td><?=$order['fullname']?></td>
              <td><?= date('d-m-y',strtotime($order['inv_date']))?></td>
              <td><?=$order['inv_subtotal']?></td>
              <td><?=$order['inv_tax']?></td>
              <td><?=$order['inv_total']?></td>
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