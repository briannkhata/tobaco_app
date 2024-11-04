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

                  <a href="#" class="btn btn-secondary">
                     Print
                  </a>

               </div>

            </div>
            <hr>
        
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive">

                     <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                           <tr>
                              <th>Trading Name</th>
                              <th>Primary Contact</th>
                              <th>Address</th>
                              <th>Total Weight</th>
                              <th>Price</th>
                              <th>Category</th>
                              <th>Bale Decription</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($this->M_report->get_bale_details($client_id) as $row): ?>
                              <tr>

                                 <td>
                                    <?= $row['trading_name']; ?>
                                 </td>
                                 <td>
                                    <?= $row['primary_contact']; ?>
                                 </td>
                                 <td>
                                    <?= $row['address']; ?>
                                 </td>
                                 <td>
                                 <small><?=$this->M_report->get_weight_unit();?></small> <?= number_format($row['total_weight'],3) ?>
                                 </td>

                            
                                 <td>
                                 <small><?=$this->M_report->get_currency();?></small> <?= number_format($row['price'],2) ?>
                                 </td>
                                
                                 <td>
                                    <?= $row['category_name']; ?>
                                 </td>
                                 <td>
                                    <?= $row['bale_description'] ?>
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
