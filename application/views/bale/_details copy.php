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
                     <?php foreach ($this->M_bale->get_bale_details($bale_id) as $row): ?>

                        <div class="col-md-12">

                           <img src="<?= base_url($row['qr_code']) ?>" style="width: 150px; height: auto;"
                              alt="<?= $row['qr_code'] ?>">

                           <hr>
                        </div>
                        <div class="col-md-12">
                           <label for="barcode" class="form-label">Client</label><br>
                           <?= $row['trading_name']; ?> <br>
                           <small>Contact : <?=$row['primary_contact'];?></small><br>
                           <small>Address : <?=$row['address'];?></small>
                           <hr>
                        </div>



                        <div class="col-md-12">
                           <label for="category_id" class="form-label">Category</label><br>
                           <?= $row['category_name']; ?> | <?=$row['category_description'];?>
                           <hr>
                        </div>

                        <div class="col-md-12">
                           <label for="total_weight" class="form-label">Total Weight</label><br>
                           <small><?= $this->M_report->get_weight_unit(); ?></small> <?= number_format($row['total_weight'],2); ?>
                           <hr>
                        </div>

                        <div class="col-md-12">
                           <label for="unique_number" class="form-label">Price</label><br>
                           <small><?= $this->M_report->get_currency(); ?></small> <?= number_format($row['price'], 2); ?>
                           <hr>
                        </div>



                        <div class="col-md-12">
                           <label for="description" class="form-label">Description</label><br>
                           <?= $row['bale_description']; ?>
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