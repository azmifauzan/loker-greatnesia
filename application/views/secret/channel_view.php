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
                <h3>Channel</h3>
                <span style="float: right; padding-right: 10px;"><a title="Tambah Channel" href="<?php echo site_url('admin/channel/tambah'); ?>" class="btn btn-small"><i class="icon-plus" style="margin-left: 0px; margin-right: 3px;"></i> Tambah</a></span>
            </div> <!-- /widget-header -->
            
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th width="40%">Deskripsi</th>
                            <th>Website</th>                            
                            <th width="15%">&nbsp;</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php if($channel->num_rows() > 0) : ?>
                    <?php foreach($channel->result() as $ch) : ?>                    
                    <tr>
                        <td><?php echo $ch->nama; ?></td>
                        <td><?php echo $ch->deskripsi; ?></td>
                        <td><?php echo $ch->website; ?></td>                        
                        <td class="action-td">                            
                            <a title="edit" href="<?php echo site_url('admin/channel/edit/'.$ch->cid); ?>" class="btn btn-small"><i class="icon-edit"></i></a>
                            <a title="delete" href="<?php echo site_url('admin/channel/delete/'.$ch->cid); ?>" class="btn btn-small btn-warning"><i class="icon-remove"></i></a>
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
			
<?php $this->load->view('admin/footer'); ?>