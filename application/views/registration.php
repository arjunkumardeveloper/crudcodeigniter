<html>
	<head>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    	<title>
        	Interview Project
        </title>
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
        <body>
        	<div class="container">
            	<p class="regis">Registration Page</p>
                <div class="row justify-content-center">
                	<div class="col-lg-6 border mb-5">
                    	<?php echo form_open('login/registration'); ?>
                        <?php echo form_hidden('tdate', date('Y-m-d')); ?>
                        <div class="form-group">
                        	<?php echo form_label("Full Name"); ?>
                        	<?php echo form_input(array('name'=>'fullname', 'class'=>'form-control', 'placeholder'=>'Enter Your Full Name')); ?>
                            <?php echo form_error('fullname'); ?>
                        </div>
                        <div class="form-group">
                        	<?php echo form_label("UserName"); ?>
                        	<?php echo form_input(array('name'=>'username', 'class'=>'form-control', 'placeholder'=>'Enter Your UserName')); ?>
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="form-group">
                        	<?php echo form_label("Password"); ?>
                        	<?php echo form_input(array('name'=>'password', 'type'=>'password' , 'class'=>'form-control', 'placeholder'=>'Enter Your Password')); ?>
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="form-group">
                        	<?php echo form_label("Gender"); ?>
                        	<?php echo form_dropdown(array('name'=>'gender', 'class'=>'form-control'), array('Select Gender', 'Male'=>'Male', 'Female'=>'Female')); ?>
                            <?php echo form_error('gender'); ?>
                        </div>
                        <div class="form-group">
                        	<?php echo form_label('DOB'); ?>
                            <?php echo form_input(array('type'=>'date', 'class'=>'form-control', 'name'=>'dob')); ?>
                            <?php echo form_error('dob'); ?>
                        </div>
                        <div class="form-group">
                        	<?php echo form_label('Mobile'); ?>
                            <?php echo form_input(array('class'=>'form-control', 'name'=>'mobile', 'placeholder'=>'Enter Your Mobile Number', 'onkeypress'=>'return checkNum()')); ?>
                        	<?php echo form_error('mobile'); ?>
                        </div>
                        <div class="form-group text-center">
                        	<?php echo form_submit(array('type'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary')); ?>
                            <a class="btn btn-dark" href="<?php echo base_url(); ?>login/welcome">Back</a>
                        </div>
                        
                        
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            
            <script>
            	function checkNum()
				{
					if((event.keyCode > 47) && (event.keyCode < 58))
					{
						return true;
					}
					else
					{
						alert('Only Numeric Value Allowed');
						return false;
					}
				}
            </script>
<?php
	include('footer.php');
?>