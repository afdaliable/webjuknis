
<div id="overlay">
	<div class="loading-container">
	    <div class="loading"></div>
	    <div id="loading-text">loading</div>

	</div>
</div>

<div class="container-fluid" id="fv_nav_main" style="padding:0px; background: #222222;">

<nav class="navbar fv_nav_bg">
  <div class="container-fluid" style="justify-content:flex-end!important; display: block;">
    <div class="navbar-brand float-start margin-bottom-xs" style="margin-top: 10px;">
    	


    	<img src="<?= get_adm_men_img();?> " style="margin-top: -4px;margin-right: 3px;">

    	<?= get_adm_men_name();?> <br/>
    	<small class="d-none d-sm-block" style="margin-left: 24px;font-size: 14px;">
    		<?= get_adm_men_slogan();?>
    	</small>


    </div>


		<div class="modal fade" id="messages" tabindex="-1" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-body" style="color: black;"></div>
		    </div>
		  </div>
		</div>




		<div class="modal fade" id="empModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: rgba(0,0,0,0.8);">
		  <div class="modal-dialog modal-dialog-centered modal-lg">
		    <div class="modal-content">
		      <div class="modal-body" style="color: black;"></div>
		 
		    </div>
		  </div>
		</div>


<?php
  date_default_timezone_set("UTC");
  $datetime = new DateTime('tomorrow');
  $next_day_start = $datetime->format('Y-m-d H:i:s');
  $get_now = date('Y-m-d H:i:s');
  $hourdiff = round((strtotime($next_day_start) - strtotime($get_now))/3600, 1);
  $reset_in_next_hours =  $hourdiff.' hour(s)';
?>


<?php if($all_license_data->validation->license_1 != 'notfound'): ?>




    <div class="float-end margin-bottom-xs" style="margin-right: 3%; border-left: 1px solid #515151; padding-left: 10px;">
    	<p style="margin-top:15px;color:#fff;">

    		<i class="fas fa-bullhorn"></i> 
    		<b>Plan:</b> <?php echo($all_license_data->license_1->license_data->license_plan_name);?> 

			  <?php if($all_license_data->license_1->license_data->license_status == 'valid'): ?>
                <span style="color:#fff;" class="badge bg-success">Activated</span>
              <?php elseif($all_license_data->license_1->license_data->license_status == 'invalid'): ?>
                <span style="color:#fff;" class="badge bg-danger">Suspended</span>
              <?php else: ?>
                <span style="color:#fff;" class="badge bg-danger"><?= ucfirst($all_license_data->license_1->license_data->license_status); ?></span>
              <?php endif; ?>


          <br/>



          <span id="<?= $all_license_data->license_1->license_data->license_key;?>">




    		<i class="fas fa-coins"></i>&nbsp; <b>Credit Limit: </b> 

    			<span id="limit_available_id"> </span> <span id="current_limit_id"> <?= $all_license_data->license_1->license_data->plan_credit_available;?>  / <?= $all_license_data->license_1->license_data->plan_credit_limit;?> </span>
    			  
    			<?= ucfirst($all_license_data->license_1->license_data->license_type);?><br/>

    		<i class="fas fa-sync-alt"></i>&nbsp; 
    			
    			
    			<?php if($all_license_data->license_1->license_data->license_type == 'onetime'){
    					echo "<b>Need more credits?</b> <a style='font-size:12px;' target='_blank' href='https://festingervault.com/pay-as-you-go/'>Purchase</a>";
    				  }else{
    				  	echo "<b>Reset:</b> Credit limit reset in ".$reset_in_next_hours;
    				  }
    			?>

    	  </span>
    	</p>

    </div>




<?php endif;?>



<?php if($all_license_data->validation->license_2 != 'notfound'): ?>



    <div class="float-end" style="margin-right: 3%; border-left: 1px solid #515151; padding-left: 10px;">
    	<p style="margin-top:15px;color:#fff;">

    		<i class="fas fa-bullhorn"></i> 
    		<b>Plan:</b> <?php echo($all_license_data->license_2->license_data->license_plan_name);?> 

			  <?php if($all_license_data->license_2->license_data->license_status == 'valid'): ?>
                <span style="color:#fff;" class="badge bg-success">Activated</span>
              <?php elseif($all_license_data->license_2->license_data->license_status == 'invalid'): ?>
                <span style="color:#fff;" class="badge bg-danger">Suspended</span>
              <?php else: ?>
                <span style="color:#fff;" class="badge bg-danger"><?= ucfirst($all_license_data->license_2->license_data->license_status); ?></span>
              <?php endif; ?>


          <br/>

          <span id="<?= $all_license_data->license_2->license_data->license_key;?>">




    		<i class="fas fa-coins"></i>&nbsp; <b>Credit Limit: </b> 

    			<span id="limit_available_id">  </span> <span id="current_limit_id"> <?= $all_license_data->license_2->license_data->plan_credit_available;?> / <?= $all_license_data->license_2->license_data->plan_credit_limit;?> </span>
    			 
    			<?= ucfirst($all_license_data->license_2->license_data->license_type);?><br/>

    		<i class="fas fa-sync-alt"></i>&nbsp; 
    			
    			 
    			<?php if($all_license_data->license_2->license_data->license_type == 'onetime'){
    					echo "<b>Need more credits?</b> <a style='font-size:12px;' target='_blank' href='https://festingervault.com/pay-as-you-go/'>Purchase</a>";
    				  }else{
    				  	echo "<b>Reset:</b> New credits available in ".$reset_in_next_hours;
    				  }
    			?>
    	  </span>
    	</p>

    </div>



<?php endif;?>




<?php 
	if($all_license_data->validation->result == 'domainblocked'):
?>


    		<div class="float-end" style="margin-right: 3%; border-left: 1px solid #fff; padding-left: 10px;">

	<div style="margin-left: 20px; min-height: auto!important; padding:4px!important;" class="btn btn-danger btn-sm btn-block">
		WARNING: Domain is Blocked
		<hr/>

		<?= $all_license_data->validation->msg; ?>
	</div>


	</div>

	<?php else: ?>





    	<?php if($all_license_data->validation->license_1 =='notfound' && $all_license_data->validation->license_2 =='notfound'): ?>
    		<div class="float-end" style="margin-right: 3%; border-left: 1px solid #fff; padding-left: 10px;">

	          	<a style="margin-left: 20px; min-height: auto!important; padding:4px!important;" href="<?= admin_url('admin.php?page=festinger-vault-activation'); ?>" class="btn non_active_button btn-sm btn-block">ACTIVATE YOUR LICENSE</a>
	          	<br/>
	          	<a style="margin-left: 20px; background: #fe2c9c;" href="https://festingervault.com/get-started/" target="_blank" class="btn btn-sm btn-block">PURCHASE LICENSE</a>
			</div>
    	<?php endif; ?>

	<?php endif; ?>




  </div>
</nav>

	

</div>


<div class="container-fluid">
	
<?php if(isset($_GET['installation']) && isset($_GET['slug']) ): 
	if($_GET['installation'] == 'success')
?>

	<div class="alert alert-custom-clr alert-dismissible fade show mt-3" role="alert">
	  <strong>Congratulations</strong> <?= remove_under_middle_score($_GET['slug']) ?> is installed successfully.
	  <a href="<?= admin_url('admin.php?page=festinger-vault');?>" class="btn-close" aria-label="Close"></a>
	</div>

<?php endif;?> 
<?php if($all_license_data->validation->result == 'failed' || $all_license_data->validation->result == 'notfound' || $all_license_data->validation->result == 'invalid' ):?>

	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-body">
					<h3 class="text-center">Warning !</h3>
					<hr/>
					<h4 class="text-center text-danger">
						<?= $all_license_data->validation->msg; ?>
					</h4>
				</div>
			</div>
		</div>
	</div>

<?php else: 

?>

	<div class="row mt-4" style="background: #222;padding: 20px 0px;">


		<div class="col-md-4">
			<button type="button" class="btn btn-primary non_active_button margin-bottom-xs active_button" id="popular" value="popular">Popular</button>
			<button type="button" class="btn btn-primary non_active_button margin-bottom-xs" id="recent" value="recent">Recent</button>
			<button type="button" class="btn btn-primary non_active_button margin-bottom-xs" id="featured" value="featured">Featured</button>
			<button type="button" class="btn btn-primary non_active_button margin-bottom-xs" id="mylist" value="mylist">Favorites</button>
		</div>
		<div class="col-md-2">
		
			<select class="form-select home_con_select btn-block margin-bottom-xs" id="filter_type" aria-label="Default select example">
			  <option selected value="all">Filter type</option>
        <option value="wordpress-plugins">WordPress Plugins</option>
        <option value="wordpress-themes">WordPress Themes</option>
        <option value="wordpress-requests">WordPress Requests</option>
			</select>

		</div>
		<div class="col-md-2">


			<select class="form-select home_con_select btn-block margin-bottom-xs" id="filter_category" aria-label="Default select example">
			  <option selected value="all">Filter Category</option>
        <?php 
          foreach(json_decode($all_license_data->category_list) as $category):
        ?>
			   <option data-type="<?= $category->type_slug; ?>" class="filter_type_cate_val" value="<?= $category->category_slug; ?>"><?= ucwords(str_replace('-', ' ', $category->category_slug)); ?></option>
			  <?php endforeach;?>
			</select>

		</div>
		<div class="col-md-3">
			<div class="input-group">
			  <input type="text" class="form-control search_bg_clr btn-block margin-bottom-xs" style="text-align: left;" id='ajax_search' placeholder="Search here... (e.g. Elementor Pro)" name="ajax_search">
			</div>
		</div>

		<div class="col-md-1">
			<button type="button" class="btn btn-primary btn-block non_active_button" id="reset_filter" value="reset_filter" style="height: 37px;">Reset</button>
		</div>
	</div>

		<div class="row mt-2">
	    	<div id="list">
	    		<div class="wrapper"></div>
	    	</div>
		</div>
	</div>

<?php endif; ?>
<?= ($all_license_data->cat_func);?>











