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
	<p class="regis">Edit Article</p>
    <div class="row justify-content-center">
    	<div class="col-lg-6 border rounded mb-5">
        	<?php  echo form_open_multipart("Arjun/updateArt/{$articledata->id}"); ?>
            <?php  echo form_hidden('articleimage', $articledata->articleimage); ?>
            <?php // echo form_hidden('user_id', $this->session->userdata('id')); ?>
            	<div class="form-group">
                	<?php
                    	echo form_label('Article Title <span class="text-danger">*</span>');
						echo form_input(array('name'=>'articletitle', 'placeholder'=>'Article Title', 'class'=>'form-control', 'value'=>"$articledata->articletitle"));
						echo form_error('articletitle');
					?>
                </div>
                <div class="form-group">
                	<?php
                    	echo form_label('Article Body <span class="text-danger">*</span>');
						echo form_textarea(array('name'=>'articlebody', 'placeholder'=>'Article Body', 'class'=>'form-control', 'value'=>"$articledata->articlebody"));
						echo form_error('articlebody');
					?>
                </div>
                <div class="form-group">
                	<?php
                    	echo form_label('Article Image <span class="text-danger">*</span>');
					?>
                    <div><img src="<?php echo $articledata->articleimage ?>" height="100px" width="150px" /></div>
                    <?php
						echo form_upload(array('name'=>'userfile', 'class'=>'form-control'));
					?>
                    <div class="text-danger">
                    	<?php if(isset($upload_error)){ echo $upload_error; } ?>
                    </div>
                </div>
                <div class="form-group text-center">
                	<?php
						echo form_submit(array('value'=>'Update', 'class'=>'btn btn-primary w-50'));
					?>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<?php
	include('footer.php');
?>