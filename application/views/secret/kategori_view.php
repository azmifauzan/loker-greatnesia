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
                <i class="icon-list"></i>
                <h3>Kategori</h3>
                <span style="float: right; padding-right: 10px;"><a title="Tambah Kategori" href="<?php echo site_url('secret/kategori/tambah'); ?>" class="btn btn-small"><i class="icon-plus" style="margin-left: 0px; margin-right: 3px;"></i> Tambah</a></span>
            </div> <!-- /widget-header -->
            
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th width="40%">Deskripsi</th>                         
                            <th width="15%">&nbsp;</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php if($kategori->num_rows() > 0) : ?>
                    <?php foreach($kategori->result() as $kt) : ?>                    
                    <tr>
                        <td><?php echo $kt->nama; ?></td>
                        <td><?php echo $kt->deskripsi; ?></td>                       
                        <td class="action-td">                            
                            <a title="edit" href="<?php echo site_url('secret/kategori/edit/'.$kt->kid); ?>" class="btn btn-small"><i class="icon-edit"></i></a>
                            <a title="delete" href="<?php echo site_url('secret/kategori/delete/'.$kt->kid); ?>" class="btn btn-small btn-warning"><i class="icon-remove"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                <p align="center"><?php echo $this->pagination->create_links(); ?></p>
            </div> <!-- /widget-header -->                                            
        </div> <!-- /widget -->		
    </div> <!-- /span9 -->	
</div> <!-- /row -->
			
<?php $this->load->view('secret/footer'); ?>