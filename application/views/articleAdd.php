<?php
	if($this->session->userdata('id') == "")
	{
		return redirect('Arjun');
	}
	
	include('header.php');
?>
<style>
     body{
		background-image:linear-gradient(white, blue);
	}
	.regis{
		background-image:linear-gradient(black, blue);
		font-size:30px;
		font-family:algerian;
		color:white;
		text-align:center;
		margin-top:50px;
	}
</style>
<div class="container">
	<p class="regis">Add Article</p>
    <div class="row justify-content-center">
    	<div class="col-lg-6 border rounded mb-5">
        	<?php echo form_open_multipart('Arjun/uploadArticle'); ?>
            <?php echo form_hidden('tdate', date('Y-m-d')); ?>
            <?php echo form_hidden('user_id', $this->session->userdata('id')); ?>
            	<div class="form-group">
                	<?php
                    	echo form_label('Article Title <span class="text-danger">*</span>');
						echo form_input(array('name'=>'articletitle', 'placeholder'=>'Article Title', 'class'=>'form-control'));
						echo form_error('articletitle');
					?>
                </div>
                <div class="form-group">
                	<?php
                    	echo form_label('Article Body <span class="text-danger">*</span>');
						echo form_textarea(array('name'=>'articlebody', 'placeholder'=>'Article Body', 'class'=>'form-control'));
						echo form_error('articlebody');
					?>
                </div>
                <div class="form-group">
                	<?php
                    	echo form_label('Article Image <span class="text-danger">*</span>');
						echo form_upload(array('name'=>'userfile', 'class'=>'form-control'));
					?>
                    <div class="text-danger">
                    	<?php if(isset($upload_error)){ echo $upload_error; } ?>
                    </div>
                </div>
                <div class="form-group text-center">
                	<?php
						echo form_submit(array('value'=>'Submit', 'class'=>'btn btn-primary w-50'));
					?>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<?php
	include('footer.php');
?>