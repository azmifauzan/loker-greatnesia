<?php $this->load->view('secret/header'); ?> 

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
		<h3>Tambah Lowongan</h3>                
	    </div> <!-- /widget-header -->
	    
	    <div class="widget-content">
		<div class="widget-content">
		    <?php echo form_open('secret/loker/tambahp','class="form-horizontal"'); ?>
		    <fieldset>			    
			<div class="control-group">											
			    <label class="control-label" for="judul">Judul</label>
			    <div class="controls">
				    <input type="text" class="input-medium span4" name="judul" value="<?php echo set_value('judul'); ?>" />
				    <?php echo form_error('judul','<div style="color:red">','</div>'); ?>
			    </div> <!-- /controls -->
			</div>
			<div class="control-group">										
			    <label class="control-label" for="kategori">Kategori</label>
			    <div class="controls">
				    <select name="kategori" class="span2">
					<?php foreach($kategori->result() as $kt) : ?>
					<option value="<?php echo $kt->kid; ?>"><?php echo $kt->nama; ?></option>
					<?php endforeach; ?>
				    </select>
				    <?php echo form_error('kategori','<div style="color:red">','</div>'); ?>
			    </div> <!-- /controls -->
			</div>
			<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
			<script type="text/javascript">
			tinymce.init({
				selector: "textarea",
				plugins: [
					"advlist autolink lists link image charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table contextmenu paste"
				],
				toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			});
			</script>
			<div class="control-group">											
			    <label class="control-label" for="deskripsi">Deskripsi</label>
			    <div class="controls">
				    <textarea name="deskripsi" class="span4" rows="10"><?php echo set_value('deskripsi'); ?></textarea>
				    <?php echo form_error('deskripsi','<div style="color:red">','</div>'); ?>
			    </div> <!-- /controls -->
			</div>
			<div class="control-group">											
			    <label class="control-label" for="tag">Tag</label>
			    <div class="controls">
				    <input type="text" class="input-medium span4" name="tag" value="<?php echo set_value('tag'); ?>" placeholder="pisahkan dengan koma" />
				    <?php echo form_error('tag','<div style="color:red">','</div>'); ?>
			    </div> <!-- /controls -->
			</div>
			<div class="control-group">
			    <div class="controls">
				<input name="simpan" value="simpan" class="btn" type="submit">
			    </div>
			</div>
		    </fieldset>
		    <?php echo form_close(); ?>
		</div>
	    </div> <!-- /widget-header -->                                            
	</div> <!-- /widget -->		
    </div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('secret/footer'); ?>