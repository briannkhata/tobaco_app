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
                  <form class="row g-3" action="<?= base_url(); ?>Client/save" method="POST">
                     <div class="col-md-12">
                        <label for="input1" class="form-label">Trading Name</label>
                        <input type="text" name="trading_name" class="form-control" value="<?php if (!empty($trading_name)) {
                           echo $trading_name;
                        } ?>" required="">
                     </div>

                     <div class="col-md-12">
                        <label for="input1" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="<?php if (!empty($address)) {
                           echo $address;
                        } ?>" required="">
                     </div>

                     <div class="col-md-6">
                        <label for="input1" class="form-label">Primary Contact</label>
                        <input type="text" name="primary_contact" class="form-control" value="<?php if (!empty($primary_contact)) {
                           echo $primary_contact;
                        } ?>">
                     </div>

                     <div class="col-md-6">
                        <label for="input1" class="form-label">Primary Contact</label>
                        <input type="text" name="other_contact" class="form-control" value="<?php if (!empty($other_contact)) {
                           echo $other_contact;
                        } ?>">
                     </div>

                     <div class="col-md-12">
                        <label for="input1" class="form-label">Branch</label>
                        <select class="form-control" name="branch_id">
                           <option selected disabled>option</option>
                           <?php foreach ($this->M_branch->get_branches() as $row) { ?>
                              <option <?php if ($branch_id == $row['branch_id'])
                                 echo 'selected'; ?>
                                 value="<?= $row['branch_id']; ?>"><?= $row['branch_name']; ?></option>
                           <?php } ?>
                        </select>
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