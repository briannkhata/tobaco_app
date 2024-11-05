<?php $this->load->view('includes/header.php'); ?>
<?php $this->load->view('includes/menu.php'); ?>
<main class="main-wrapper">
   <div class="main-content">
      <div class="card">
         <div class="card-body">
            <h5 class="card-title">
               <?= $page_title; ?>
               <a href="#" class="btn btn-secondary print" onclick="window.print()" style="float:right;">
                  Print
               </a>
            </h5>
            <hr>

            <div class="row">
               <?php foreach ($this->M_bale->get_bales() as $row): ?>
                  <div class="sticker">
                     <div class="row">
                        <div class="col-md-3">
                           <img src="<?= base_url($row['qr_code']) ?>" class="qr-code" alt="<?= $row['qr_code'] ?>">
                        </div>
                        <div class="col-md-9">
                           <small>Client : <?= $this->M_client->get_trading_name($row['client_id']); ?></small><br>
                           <small>Contact : <?= $this->M_client->get_primary_contact($row['client_id']); ?></small><br>
                           <small>Address : <?= $this->M_client->get_address($row['client_id']); ?></small>
                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>

</main>

<?php $this->load->view('includes/footer.php'); ?>