<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


<div class="container-fluid">

	<div class="row" style="padding-top:20px;background: #222;">


		<div class="col-md-12 plugin_updated_h4 pb-2">

			<h4>Automatic plugin update management 
				<?php 
					if(isset($pluginUpdate_get_data->result) && $pluginUpdate_get_data->result == 'domainblocked'):
				?>
					<button class="btn btn-sm float-end btn-custom-color btn-danger">DOMAIN IS BLOCKED</button>
				<?php
					else:

					  if(isset($pluginUpdate_get_data->manual_force_update) && $pluginUpdate_get_data->manual_force_update == 'yes'): 
					  	if($is_update_available == 0):
				?>
							<button class="btn btn-sm float-end btn-custom-color" id="no_update_available">FORCE UPDATE NOW</button>
						<?php else: ?>
							<form name="force_theme_update" method="POST">
								<button class="btn btn-sm float-end btn-custom-color" id="pluginforceupdate" type="submit" name="pluginforceupdate" value="plugin">FORCE UPDATE NOW</button>
							</form>
						<?php endif;?>
					<?php else: ?>
						<button class="btn btn-sm float-end btn-custom-color" id="manual_force_update_r">FORCE UPDATE NOW</button>
					<?php endif; ?>
				<?php endif; ?>
			</h4>

		</div>
	</div>
	

	<div class="row" style="padding-top:20px;background: #131313;">



	<?php if(isset($pluginUpdate_get_data->result) && ($pluginUpdate_get_data->result == 'domainblocked' || $pluginUpdate_get_data->result == 'failed')):?>
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <strong>Whoops!</strong>  <?= $pluginUpdate_get_data->result == 'domainblocked'? 'Domain Blocked:':''; ?> <?= $pluginUpdate_get_data->msg;?>
		</div>
	<?php endif;?>


	<?php if(isset($_GET['force'])): 
		if($_GET['force'] == 'success')
	?>

		<div class="alert alert-custom-clr alert-dismissible fade show" role="alert" style="background-color: #1a1a1a;">
		  <strong>Force update for plugins run successfully!</strong>
		  <a href="<?= admin_url('admin.php?page=festinger-vault-updates');?>" class="btn-close" aria-label="Close"></a>
		</div>

	<?php elseif(isset($_GET['rollback'])): 
		if($_GET['rollback'] == 'success')
	?>

		<div class="alert alert-custom-clr alert-dismissible fade show" role="alert" style="background-color: #1a1a1a;">
		  <strong>Rollback run successfully!</strong>
		  <a href="<?= admin_url('admin.php?page=festinger-vault-updates');?>" class="btn-close" aria-label="Close"></a>
		</div>

	<?php endif;?> 


		<div class="col-md-12 card-bg-cus pt-4" style="overflow-x: scroll;">

			<table class="table table-striped table-responsive update_plugin">
				<tr>
					<th class="pt-4">Name</th>
					<th class="pt-4">Description</th>
					<th style="min-width: 130px;">Current Version</th>
					<th style="min-width: 130px;">New Version</th>
					<th>Auto update</th>
					<th style="min-width: 125px;">Rollback</th>
				</tr>




				<?php 




	        foreach($allPlugins as $key => $value) {


	        	$is_toggle_checked = '';

				if ( get_option('fv_plugin_auto_update_list') == true && (array_search(get_plugin_slug_from_data($key, $value), get_option('fv_plugin_auto_update_list'))) !== false) {
					$is_toggle_checked = 'checked';
				}


			if($fetching_plugin_lists != null){

				if (in_array(get_plugin_slug_from_data($key, $value), $fetching_plugin_lists)){
	  	
					$new_version  = '';
					$chk_pkg_type = '';

							foreach($fetching_plugin_lists_full as $single_p){
								if($single_p->slug == get_plugin_slug_from_data($key, $value) && $single_p->pkg_str == 1){
									$chk_pkg_type = 'onetime';
								}

								if($single_p->slug == get_plugin_slug_from_data($key, $value) && $single_p->pkg_str == 0){
									$chk_pkg_type = 'recurring';
								}
								if($single_p->slug == get_plugin_slug_from_data($key, $value) && ($single_p->version > $value['Version'])){
									$new_version = $single_p->version;
									continue;

								}
							}




		            if(in_array($key, $activePlugins)) { // display active only
		                echo '<tr>';
		                echo "<td class='plugin_update_width_30'>
		                		{$value['Name']} <br/>
		                		<span class='badge bg-success'>Active</span> 
		                		<span class='badge btn-custom-color'>".ucfirst($chk_pkg_type)."</span> 
		                	 </td>";
		                echo "<td class='plugin_update_width_60'>". substr($value['Description'], 0, 100)."...
		                </td>";
		                echo "<td class='text-center'>{$value['Version']}</td>";

						echo "<td class='text-center'>";
							echo $new_version;
						echo '</td>';

		                echo "<td><center><input class='auto_plugin_update_switch ".get_plugin_slug_from_data($key, $value)."' type='checkbox' ".$is_toggle_checked." data-id='".get_plugin_slug_from_data($key, $value)."' data-toggle='toggle' data-size='xs'></center></td>";
						echo "<td>";
						 check_rollback_availability(get_plugin_slug_from_data($key, $value), $value['Version'], 'plugin');
						echo '</td>';

		                echo '</tr>';


		            }else{

		                echo '<tr>';
		                echo "<td class='plugin_update_width_30'>
		                		{$value['Name']} <br/>
		                		<span class='badge bg-danger'>Deactive</span> 
		                		<span class='badge btn-custom-color'>".ucfirst($chk_pkg_type)."</span> 
		                	 </td>";
		                echo "<td class='plugin_update_width_60'>". substr($value['Description'], 0, 100)."...


		                	</td>";
		                echo "<td class='text-center'>{$value['Version']}</td>";

						echo "<td class='text-center'>";
							echo $new_version;

						echo '</td>';

		                echo "<td>
		                	<center><input class='auto_plugin_update_switch ".get_plugin_slug_from_data($key, $value)."' type='checkbox' ".$is_toggle_checked." data-id='".get_plugin_slug_from_data($key, $value)."' data-toggle='toggle' data-size='xs'></center>
		                </td>";

						echo "<td>";
						 check_rollback_availability(get_plugin_slug_from_data($key, $value), $value['Version'], 'plugin');
						echo '</td>';


		                echo '</tr>';






		            }
	        	}
	    	}
	    }






				?>
			</table>

		</div>
	</div>
</div>


