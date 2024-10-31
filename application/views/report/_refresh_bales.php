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

                  <a class="btn btn-secondary">
                     Print
                  </a>

               </div>

            </div>
            <hr>

            <div class="card">
               <div class="card-body">

                  <table class="table table-striped" style="width:100%">
                     <thead>
                        <tr>
                           <th>Total Weight</th>
                           <th>Price</th>
                           <th>Barcode</th>
                           <th>Category</th>
                           <th>Decription</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        foreach ($bales as $row): ?>
                           <tr>
                              <td>
                                 <?= $row['total_weight'] ?>
                              </td>
                              <td>
                                 <?= $row['price'] ?>
                              </td>
                              <td>
                                 <?= $row['barcode'] ?>
                              </td>

                              <td>
                                 <?= $this->M_category->get_category_name($row['category_id']); ?>
                              </td>
                              <td>
                                 <?= $row['description'] ?>
                              </td>

                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>

               </div>
            </div>

</main>

<?php $this->load->view('includes/footer.php'); ?>