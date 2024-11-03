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
                  <?php if ($this->session->flashdata('message')) { ?>
                     <div class="alert alert-border-success alert-dismissible fade show">
                        <div class="d-flex align-items-center">
                           <div class="font-35 text-success"><span class="material-icons-outlined fs-2">check_circle</span>
                           </div>
                           <div class="ms-3">
                              <h6 class="mb-0 text-success"><?= $this->session->flashdata('message'); ?></h6>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
                  <hr>
                  <form action="<?= base_url(); ?>Bale/save" class="row g-3" method="post">

                     <div class="col-md-6">
                        <label for="input1" class="form-label">Client</label>
                        <select class="form-control" name="client_id">
                           <option selected disabled>Option</option>
                           <?php foreach ($this->M_client->get_clients() as $row) { ?>
                              <option <?php if ($client_id == $row['client_id'])
                                 echo 'selected'; ?>
                                 value="<?= $row['client_id']; ?>"><?= $row['trading_name']; ?></option>
                           <?php } ?>
                        </select>
                     </div>

                     <div class="col-md-6">
                        <label for="input1" class="form-label">Category</label>
                        <select class="form-control" name="category_id">
                           <option selected disabled>Option</option>
                           <?php foreach ($this->M_category->get_categories() as $row) { ?>
                              <option <?php if ($category_id == $row['category_id'])
                                 echo 'selected'; ?>
                                 value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
                           <?php } ?>
                        </select>
                     </div>

                     <div class="col-md-6">
                        <label class="control-label">Weight</label>
                        <input type="text" name="total_weight" class="form-control" value="<?php if (!empty($total_weight)) {
                           echo $total_weight;
                        } ?>">
                     </div>

                     <div class="col-md-6">
                        <label class="control-label">Price</label>
                        <input type="text" name="price" class="form-control" value="<?php if (!empty($price)) {
                           echo $price;
                        } ?>">
                     </div>

                     <!-- <div class="col-md-3">
                        <label class="control-label">Unique Number</label>
                        <input type="text" name="unique_number" class="form-control" value="<?php if (!empty($unique_number)) {
                           echo $unique_number;
                        } ?>">
                     </div>

                     <div class="col-md-3">
                        <label class="control-label">Barcode</label>
                        <input type="text" name="barcode" class="form-control" value="<?php if (!empty($barcode)) {
                           echo $barcode;
                        } ?>">
                     </div> -->


                     <div class="col-md-12">
                        <label class="control-label">Description</label>
                        <textarea name="description" class="form-control">
                           <?php if (!empty($description)) {
                              echo $description;
                           } ?>
                        </textarea>
                     </div>

                     <div class="col-md-12">
                        <?php if (isset($update_id)) { ?>
                           <input type="hidden" name="update_id" id="update_id" value="<?= $update_id; ?>">
                        <?php } ?>
                        <div class="d-md-flex d-grid align-items-center gap-3">
                           <button type="submit" class="btn btn-primary px-4">Save</button>
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