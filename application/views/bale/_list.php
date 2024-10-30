<?php $this->load->view('includes/header.php'); ?>
<?php $this->load->view('includes/menu.php'); ?>
<main class="main-wrapper">
   <div class="main-content">
      <div class="card">
         <div class="card-body">
            <h5 class="card-title">
               <?= $page_title; ?>
            </h5>
            <hr>
            <div class="col">
               <div class="btn-group">

                  <a href="<?= base_url(); ?>bale/read" class="btn btn-secondary">
                     Add New
                  </a>

               </div>

            </div>
            <hr>
            <div class="col" style="margin-top:2%;">
               <?php if ($this->session->flashdata('message')) { ?>
                  <div class="alert alert-border-success alert-dismissible fade show">
                     <div class="d-flex align-items-center">
                        <div class="font-35 text-success"><span class="material-icons-outlined fs-2">check_circle</span>
                        </div>
                        <div class="ms-3">
                           <h6 class="mb-0 text-success">
                              <?= $this->session->flashdata('message'); ?>
                           </h6>
                        </div>
                     </div>
                  </div>
               <?php } ?>
            </div>
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive">

                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                           <tr>
                              <th>Client</th>
                              <th>Total Weight</th>
                              <th>Unique Number</th>
                              <th>Barcode</th>
                              <th>Category</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $count = 1;
                           foreach ($this->M_bale->get_bales() as $row): ?>
                              <tr>

                                 <td>
                                    <?= $this->M_client->get_trading_name($row['client_id']); ?>
                                 </td>
                                 <td>
                                    <?= $row['total_weight'] ?>
                                 </td>
                                 <td>
                                    <?= $row['unique_number'] ?>
                                 </td>
                                 <td>
                                    <?= $row['barcode'] ?>
                                 </td>

                                 <td>
                                    <?= $this->M_category->get_category_name($row['category_id']); ?>
                                 </td>

                                 <td>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                       <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-secondary dropdown-toggle"
                                             data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                          <ul class="dropdown-menu">

                                             <li>
                                                <a href="<?= base_url(); ?>Bale/read/<?= $row['bale_id']; ?>"
                                                   class="dropdown-item">
                                                   Edit
                                                </a>
                                             </li>

                                             <li>
                                                <a href="<?= base_url(); ?>Bale/view/<?= $row['bale_id']; ?>"
                                                   class="dropdown-item">
                                                   View
                                                </a>
                                             </li>

                                             <li>
                                                <a href="<?= base_url(); ?>Bale/delete/<?= $row['bale_id']; ?>"
                                                   class="dropdown-item">
                                                   Delete
                                                </a>
                                             </li>


                                          </ul>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>

                  </div>
               </div>
            </div>

</main>

<?php $this->load->view('includes/footer.php'); ?>
<script>
   $('#searchButton').on('click', function () {
      performSearch();
   });

   // Search functionality on input change
   $('#searchInput').on('input', function () {
      performSearch();
   });

   function performSearch() {
      var searchValue = $('#searchInput').val().toLowerCase();
      $('table tbody tr').each(function () {
         var text = $(this).text().toLowerCase();
         $(this).toggle(text.indexOf(searchValue) !== -1);
      });
   }
</script>