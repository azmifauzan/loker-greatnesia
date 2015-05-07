<?php $this->load->view('admin/header'); ?> 

<div class="span9">
<?php if(isset($info)) : ?>
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Informasi : </strong><?php echo $info; ?>
    </div>
<?php endif; ?>
<?php if(isset($error)) : ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Error : </strong><?php echo $error; ?>
    </div>
<?php endif; ?>	
</div> <!-- /span9 -->
			
<div class="row">					
    <div class="span9">
	<div class="widget">
	    <div class="widget-header">
		<i class="icon-th"></i>
		<h3>Ubah Kategori</h3>                
	    </div> <!-- /widget-header -->
	    
	    <div class="widget-content">
		<div class="widget-content">
		    <?php echo form_open('admin/kategori/editp','class="form-horizontal"'); ?>
		    <fieldset>			    
			<div class="control-group">											
			    <label class="control-label" for="nama">Nama Kategori</label>
			    <div class="controls">
				    <input type="text" class="input-medium span4" name="nama" value="<?php echo $kategori->nama; ?>" />
				    <?php echo form_error('nama','<div style="color:red">','</div>'); ?>
			    </div> <!-- /controls -->
			</div>
			<div class="control-group">											
			    <label class="control-label" for="deskripsi">Deskripsi</label>
			    <div class="controls">
				    <textarea name="deskripsi" class="span4"><?php echo $kategori->deskripsi; ?></textarea>
				    <?php echo form_error('deskripsi','<div style="color:red">','</div>'); ?>
			    </div> <!-- /controls -->
			</div>			
			<div class="control-group">
			    <div class="controls">
				<input name="simpan" value="simpan" class="btn" type="submit">
			    </div>
			</div>
		    </fieldset>
		    <?php echo form_hidden('kid',$kategori->kid); ?>
		    <?php echo form_close(); ?>
		</div>
	    </div> <!-- /widget-header -->                                            
	</div> <!-- /widget -->		
    </div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('admin/footer'); ?>