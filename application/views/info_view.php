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
      <div class="blog">
        <div class="row">
          <div class="span12">              
              <!-- Blog Posts -->
              <div class="row">
                 <div class="span8">
                    <div class="posts">
                    
                       <!-- Each posts should be enclosed inside "entry" class" -->
                       <!-- Post one -->
                       <div class="entry">
                          <h2><i class="icon-arrow-right title-icon"></i> <?php echo $loker->judul; ?></h2>
                          
                          <!-- Meta details -->
                          <div class="meta">
                             <i class="icon-calendar"></i> <?php echo date('d M Y',strtotime($loker->upload_time)); ?> <i class="icon-folder-open"></i> <a href="<?php echo site_url('home/kategori/'.$loker->kid.'/'.url_title(strtolower($loker->kategori))); ?>"><?php echo $loker->kategori; ?></a> <span class="pull-right"><i class="icon-comment"></i> <a href="#disqus_thread"> Comments</a></span>
                          </div>                                                   
                          <?php echo $loker->deskripsi; ?>
                       </div>
                       
                       <div class="post-foot well">
                          <!-- Social media icons -->
                          <div class="social">
                            <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                            <span class='st_facebook_hcount' displayText='Facebook'></span>
                            <span class='st_twitter_hcount' displayText='Tweet'></span>
                            <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                            <span class='st_googleplus_hcount' displayText='Google +'></span>
                            <span class='st_tumblr_hcount' displayText='Tumblr'></span>
                            <span class='st_evernote_hcount' displayText='Evernote'></span>
                          </div>
                       </div>     

                      <hr />
                      <!-- Comment section -->
                      <div id="disqus_thread"></div>
                      <script type="text/javascript">
                          /* * * CONFIGURATION VARIABLES * * */
                          var disqus_shortname = 'lokergreatnesia';
                          
                          /* * * DON'T EDIT BELOW THIS LINE * * */
                          (function() {
                              var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                              dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                          })();
                      </script>
                      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                      <!-- Comment section -->
                      
                      <div class="clearfix"></div>                       
                    </div>
                 </div>                        
                 <div class="span4">
                    <div class="sidebar">
                       <!-- Widget -->
                       <div class="widget">
                          <h4>Kategori</h4>
                          <ul>
                            <?php foreach($kategori->result() as $kt) : ?>
                              <li><?php echo anchor('home/kategori/'.$kt->kid.'/'.url_title(strtolower($kt->nama)),$kt->nama); ?></li>
                            <?php endforeach; ?>                            
                          </ul>
                       </div>
                       <div class="widget">
                          <h4>Lowongan Lainnya</h4>
                          <ul>
                            <?php foreach($lokerbaru->result() as $lb) : ?>
                              <li><?php echo anchor('info/view/'.$lb->lid.'/'.url_title(strtolower($lb->judul)),$lb->judul); ?></li>
                            <?php endforeach; ?>                            
                          </ul>
                       </div>                              
                    </div>                                                
                 </div>
              </div>
           </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content ends -->

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'lokergreatnesia';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "8e099eaf-452c-43a6-bb38-26b81b3a4532", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<?php $this->load->view('footer'); ?>