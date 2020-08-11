<html>
	<head>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    	<title>Interview Project</title>
    </head>
    <style>
    	body{
			background-image:linear-gradient(white, blue);
		}
		.footer{
			margin-bottom:100px;
		}
    </style>
    <body>
    	<div class="container" style="margin-top:150px;">
        <?php
        	if($msg = $this->session->flashdata('msg')){
			$msg_class = $this->session->flashdata('msg_class')
		?>
			    <div class="alert <?php echo $msg_class ?>">
                	<?php echo $msg; ?>
                </div>
        <?php
			}
		?>
        <p class="text-center rounded text-light" style="background-image:linear-gradient(black, blue); font-family:algerian; font-size:30px;">Login Page</p>
        	<div class="row justify-content-center">
            	<div class="col-lg-8 border rounded footer">
                
                	<?php echo form_open('login/welcome'); ?>
                    <div class="form-group">
                    	<?php echo form_label("Username"); ?>
                        <?php echo form_input(array("class"=>"form-control", 'placeholder'=>'Enter Your Username', 'name'=>'username')); ?>
                        <?php echo form_error("username"); ?>
                    </div>
                    <div class="form-group">
                    	<?php echo form_label("Password"); ?>
                        <?php echo form_input(array("class"=>"form-control", 'placeholder'=>'Enter Your Password', 'name'=>'password', 'type'=>'password')); ?>
                        <?php echo form_error('password'); ?>
                    </div>
                    <a href="<?php echo base_url(); ?>login/addUser" class="text-dark">New User's ?</a>
                    <div class="form-group text-center">
                        <?php echo form_submit(array('type'=>'submit', 'name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary')); ?>
                        <a href="<?php echo base_url(); ?>Arjun/index" class="btn btn-dark">Back</a>
                    </div>
                    
                    
                    
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
<?php
	include('footer.php');
?>