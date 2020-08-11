<?php
	if($this->session->userdata('id') == "")
	{
		return redirect('Arjun');
	}
	include('header.php');
	if($msg = $this->session->flashdata('msg')){
	$msg_class = $this->session->flashdata('msg_class');
?>
<div class="container">
<div class="alert <?php echo $msg_class; ?>">
	<?php echo $msg; ?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
</div>
<?php
	}
	//print_r($article);
?>
<div class="container">
	<div class="row justify-content-center">
    <div class="table-responsive-lg">
    	<table class="table table-bordered table-hover text-center mt-3">
        	<tr class="bg-secondary text-light">
            	<th>Sr.No.</th>
            	<th>Date</th>
                <th>Article Title</th>
                <th>Article Body</th>
                <th>Article Image</th>
                <th>Action</th>
            </tr>
            <?php
				$number = $this->uri->segment(3);
            	foreach($article as $data){
			?>
            <tr>
            	<td><?php echo ++$number; ?></td>
            	<td><?php echo date('d-M-Y', strtotime($data->tdate)) ?></td>
                <td><?php echo $data->articletitle; ?></td>
                <td><?php echo $data->articlebody; ?></td>
                <td><img src="<?php echo $data->articleimage ?>" height="100px" width="150px" /></td>
                <?php
                	if($data->user_id == $this->session->userdata('id'))
					{
				?>
                <td><a href="<?php echo base_url("Arjun/editPost/{$data->id}"); ?>" class="btn btn-warning text-light">Edit</a> <a href="<?php echo base_url("Arjun/delArticle/{$data->id}"); ?>" class="btn btn-danger text-light" onclick="return delconfirm()">Delete</a></td>
                <?php }else{ ?>
                <td>--</td>
                <?php } ?>
            </tr>
            <?php
            	}
			?>
        </table>
        </div>
    </div>
    <a class="btn btn-success float-right" href="<?php echo base_url(); ?>Export/creatXLS">Export To Excel</a>
</div>

<?php  echo $this->pagination->create_links(); ?> 
<?php
	include('footer.php');
?>
