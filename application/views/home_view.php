<?php $this->load->view('header'); ?>

  <!-- Page heading -->
  <!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
  <div class="page-heading blightblue">
  </div>
</div> 
  <!-- Page heading ends -->

  <!-- Content starts -->
  <div class="content">
    <div class="container">

      <div class="service-home">
          <div class="row">

            <!-- Social -->
            <div class="span3">
            <?php $warna = array('','blightblue','bred', 'bgreen', 'borange', 'bviolet', 'bblue'); ?>
              <div class="service-social bblack">
                <!-- Big number -->
                <div class="service-big">Kategori</div>
                
                <hr />
                <!-- Social media -->
                <?php foreach($kategori->result() as $kt) : ?>
                <div class="service-box <?php echo $warna[$kt->kid]; ?>">
                    <a href="#"><?php echo $kt->nama; ?></a>
                </div>
                <?php endforeach; ?>                  

                <div class="clearfix"></div>

              </div>

            </div>
            
            <div class="span7 service-list">
                <?php $icon = array('','desktop','fire','globe','credit-card','briefcase'); ?>
                <?php foreach($loker->result() as $lk) : ?>
                <div class="service-icon">
                  <i class="icon-<?php echo $icon[$lk->kid]; ?> <?php echo $warna[$lk->kid]; ?>"></i>
                </div>
                <div class="service-content">
                  <!-- Title -->                  
                  <h4 id="konten"><?php echo $lk->judul; ?></h4>
                  <p class="konten"><?php echo word_limiter(strip_tags($lk->deskripsi),25); ?></p>
                </div>
                <hr/>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>

            <!-- Spot iklan -->
            <div class="span2">
              
            </div>
          </div>          
      </div>
    </div>
  </div>
  <!-- Content ends -->

<?php $this->load->view('footer'); ?>