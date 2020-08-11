<?php
	include('header.php');
?>   
      
 <div class="carousel slide" data-ride="carousel">
 	<div class="carousel-inner">
    	<div class="carousel-item active">
        	<img class="d-block w-100" src="<?php echo base_url('image/source.gif'); ?>" alt="First Slide" height="450px" />
            <div class="carousel-caption">
            	<h3>This Website Is Designed Only For Interview Purpose</h3>
            </div> 
        </div>
        <div class="carousel-item">
        	<img class="d-block w-100" src="<?php echo base_url("image/giphy.gif"); ?>" alt="Second Slide" height="450px" />
            <div class="carousel-caption">
            	<h3>This Website Is Designed Only For Interview Purpose</h3>
            </div>
        </div>
        <div class="carousel-item">
        	<img class="d-block w-100" src="<?php echo base_url('image/fishing2.gif'); ?>" alt="Third Slide" height="450px" />
            <div class="carousel-caption">
            	<h3>This Website Is Designed Only For Interview Purpose</h3>
            </div>
        </div>
    </div>
 </div> 
 <div data-spy="scroll" data-target="#navbar">
	<div id="about" class="container">
    	<h3 class="text-center">About Us</h3>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
    </div>
    <div id="contact">
    	<h3 class="text-center"><hr>Contact Us</hr></h3>
        <div class="container">
        	<div class="row">
            	<div class="col-lg-6 border mb-2">
                <p class="text-center"><strong>Quick Contact</strong></p>
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
                	<?php echo form_open('Arjun/contact'); ?>
                    <?php echo form_hidden('tdate', date('Y-m-d')); ?>
                    <div class="form-group">
                    	<?php echo form_label('Full Name <span class="text-danger">*</span>'); ?>
                        <?php echo form_input(array('class'=>'form-control', 'name'=>'fullname', 'placeholder'=>'Enter Your Full Name')); ?>
                        <?php echo form_error('fullname'); ?>
                    </div>
                    <div class="form-group">
                    	<?php echo form_label('Mobile No. <span class="text-danger">*</span>'); ?>
                        <?php echo form_input(array('class'=>'form-control', 'name'=>'mobile', 'placeholder'=>'Enter Your Mobile Number')); ?>
                        <?php echo form_error('mobile'); ?>
                    </div>
                    <div class="form-group">
                    	<?php echo form_label('Email <span class="text-danger">*</span>'); ?>
                        <?php echo form_input(array('class'=>'form-control', 'name'=>'email', 'placeholder'=>'Enter Your Email', 'type'=>'email')); ?>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                    	<?php echo form_label('How Can We Help You? <span class="text-danger">*</span>'); ?>
                        <?php echo form_textarea(array('class'=>'form-control', 'name'=>'message', 'placeholder'=>'Enter Your Problem')); ?>
                        <?php echo form_error('message'); ?>
                    </div>
                    <div class="form-group text-center">
                    	<?php echo form_submit(array('type'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary w-50')); ?>
                    </div>
                    
                    
                    
                    <?php echo form_close(); ?>
                </div>
                <div class="col-lg-6 border mb-2 text-center">
                	<strong>Address</strong>
                    <p>Sec-c Chauraha, Malin Basti Dalla Sonebhadra UttarParadesh - 231207</p>
                    <p><strong>LandMark: </strong>In Front Of Dalla Cement Factory Sonebhadra Uttar Pradesh - 231207 India</p>
                    <p><strong>Mobile No.: </strong>9616871205</p>
                    <p><strong>Email: </strong>arjunkumar15399@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fuild">
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29054.469470463853!2d83.03003300202536!3d24.457422106633988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398ee6778fe223bb%3A0xd9062934ccb3034e!2sDalla%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1593785285675!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    
    
 </div>    
      
      
      
      
      
      
<?php
	include('footer.php');
?>