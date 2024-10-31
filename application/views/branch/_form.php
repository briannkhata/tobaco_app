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
                  <form action="<?= base_url(); ?>Branch/save" id="form" class="row g-3" method="post">
                     <div class="col-md-12">
                        <label class="control-label">Branch Name</label>
                        <input type="text" name="branch_name" class="form-control"
                           value="<?php if (!empty($branch_name)) {
                              echo $branch_name;
                           } ?>" required="">
                     </div>

                     <div class="col-md-6">
                        <label class="control-label">Address</label>
                        <textarea name="address" class="form-control">
                           <?php if (!empty($address)) {
                              echo $address;
                           } ?>
                           </textarea> 
                     </div>

                     <div class="col-md-6">
                        <label class="control-label">Description</label>
                        <textarea name="description" class="form-control"><?php if (!empty($description)) {
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