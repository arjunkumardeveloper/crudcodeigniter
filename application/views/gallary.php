<?php
	if($this->session->userdata('id') == "")
	{
		return redirect('Arjun');
	}
	
	include('header.php');
	//print_r($pic);
?>
<style>
	.regis{
		background-image:linear-gradient(blue, black);
		font-size:30px;
		font-family:algerian;
		color:white;
		text-align:center;
		margin-top:50px;
	}
	body{
		background-image:linear-gradient(white, blue);
	}
	.effect img:hover{
		transform: scaleX(1.5);
	}
</style>
<div class="container">
	<p class="regis">Photo Gallary</p>
	<div class="row mb-5 mt-5">
    <?php  foreach($pic as $image){ ?>
    	<div class="col-lg-4 mt-3 effect">
        	<img src="<?php echo $image->articleimage; ?>" height="250px" width="300px"  class="rounded" />
        </div>
        
    <!--<div class="col-lg-4 ">
        	<img src="<?php // echo $image->articleimage; ?>" height="250px" width="300px"  class="rounded" />
        </div>
        <div class="col-lg-4 ">
        	<img src="<?php // echo $image->articleimage; ?>" height="250px" width="300px"  class="rounded" />
        </div>-->
      
      <?php  } ?>
        
    </div>
    
</div>



<?php
	include('footer.php');
?>