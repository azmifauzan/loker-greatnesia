<?php $this->load->view('header'); ?>

  <!-- Page heading -->
  <!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2 class="pull-left"><i class="icon-arrow-right title-icon"></i> <?php echo "$judul"; ?></h2>
          <div class="pull-right heading-meta"><span class="lightblue"><?php echo $subjudul; ?></span></div>
        </div>
      </div>
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
                <a href="<?php echo site_url('home/kategori/'.$kt->kid.'/'.url_title(strtolower($kt->nama))); ?>">
                <div class="service-box <?php echo $warna[$kt->kid]; ?>">
                    <?php echo $kt->nama; ?>
                </div>
                </a>
                <?php endforeach; ?>                  

                <div class="clearfix"></div>

              </div>
              
            </div>
            
            <div class="span6 service-list">
                <?php $icon = array('','desktop','fire','globe','credit-card','briefcase'); ?>
                <?php foreach($loker->result() as $lk) : ?>
                <div class="service-icon">
                  <i class="icon-<?php echo $icon[$lk->kid]; ?> <?php echo $warna[$lk->kid]; ?>"></i>
                </div>
                <div class="service-content">
                  <!-- Title -->                  
                  <h4 id="konten"><?php echo anchor('info/view/'.$lk->lid.'/'.url_title(strtolower($lk->judul)),$lk->judul); ?></h4>
                  <p class="konten"><?php echo word_limiter(strip_tags($lk->deskripsi),25); ?></p>
                </div>
                <hr/>
                <?php endforeach; ?>
                <p align="center"><?php echo $this->pagination->create_links(); ?></p>
                <div class="clearfix"></div>
            </div>

            <!-- Spot iklan -->
            <div class="span3">
              <div class="widget">
                <h4>Langganan Email</h4>
                <form style="border:1px solid #ccc;padding:3px;text-align:center;" action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=loker-greatnesia', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p style="line-height: normal;">Kami akan mengirimkan info lowongan terbaru ke email Anda:</p><p><input type="text" style="width:200px" name="email" placeholder="alamat email"/><br/><input type="submit" value="Berlangganan" /></p><input type="hidden" value="loker-greatnesia" name="uri"/><input type="hidden" name="loc" value="en_US"/></form>
              </div>
              <div>
            	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- loker-greatnesia -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:300px;height:600px"
                     data-ad-client="ca-pub-1468027569491883"
                     data-ad-slot="1166578458"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
              </div>
            </div>
          </div>          
      </div>
    </div>
  </div>
  <!-- Content ends -->

<?php $this->load->view('footer'); ?>