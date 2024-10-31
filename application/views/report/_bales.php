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
                  <form class="row g-3" action="<?= base_url(); ?>Report/refresh_bales" method="POST">

                     <div class="col-md-12">
                        <label for="input1" class="form-label">Client</label>
                        <select class="form-control" name="client_id">
                        <option value="ALL" selected>ALL</option>
                           <?php foreach ($this->M_client->get_clients() as $row) { ?>
                              <option value="<?=$row['client_id'];?>"><?=$row['trading_name']; ?></option>
                           <?php } ?>

                        </select>
                     </div>

                    

                     <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                           <button type="submit" class="btn btn-primary px-4">View Report</button>
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