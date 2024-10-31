<?php $this->load->view('includes/header.php'); ?>
<?php $this->load->view('includes/menu.php'); ?>
<!--start main wrapper-->
<main class="main-wrapper">
   <div class="main-content">
      <!--breadcrumb-->
      <!--end breadcrumb-->
      <div class="row">
         <div class="col-12 col-xl-12">
            <div class="card">
               <div class="card-body p-4">
                  <h5 class="mb-4">
                     <?= $page_title; ?>
                  </h5>

                  <hr>
                  <form class="row g-3" method="post">
   <?php foreach($this->M_bale->get_bale_by_id($bale_id) as $row): ?>

      <div class="col-md-12">
         <label for="barcode" class="form-label">Client</label><br>
         <?= $this->M_client->get_trading_name($row['client_id']); ?>
         <hr>
      </div>

      <div class="col-md-12">
         <label for="barcode" class="form-label">Barcode</label><br>
         <?= $row['barcode']; ?>
         <hr>
      </div>

      <div class="col-md-12">
         <label for="category_id" class="form-label">Category</label><br>
         <?= $this->M_category->get_category_name($row['category_id']); ?>
         <hr>
      </div>

      <div class="col-md-12">
         <label for="total_weight" class="form-label">Total Weight</label><br>
         <?= $row['total_weight']; ?>
         <hr>
      </div>

      <div class="col-md-12">
         <label for="unique_number" class="form-label">Price</label><br>
         <?= number_format($row['price'],2); ?>
         <hr>
      </div>

     

      <div class="col-md-12">
         <label for="description" class="form-label">Description</label><br>
         <?= $row['description']; ?>
         <hr>
      </div>
   <?php endforeach; ?>

   <div class="col-md-12">
      <div class="d-md-flex d-grid align-items-center gap-3">
         <button type="submit" class="btn btn-primary px-4">Print</button>
      </div>
   </div>
</form>


               </div>
            </div>
         </div>
      </div>
      <!--end row-->
   </div>
</main>
<!--end main wrapper-->
<?php $this->load->view('includes/footer.php'); ?>