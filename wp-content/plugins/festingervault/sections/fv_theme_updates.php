<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<div class="container-fluid">

	<div class="row" style="padding-top:20px;background: #222;">
		<div class="col-md-12 plugin_updated_h4 pb-2">
			<h4 >Automatic theme update management 
				<?php 
					if(isset($license_histories->result) && $license_histories->result == 'domainblocked'):
				?>
					<button class="btn btn-sm float-end btn-custom-color btn-danger">DOMAIN IS BLOCKED</button>
				<?php
					  else:

					  if(isset($license_histories->manual_force_update) && $license_histories->manual_force_update == 'yes'): 
					  	if($is_update_available == 0):
				?>
								<button class="btn btn-sm float-end btn-custom-color" id="no_update_available">FORCE UPDATE NOW</button>
							<?php else: ?>
								<form name="force_theme_update" method="POST">
									<button class="btn btn-sm float-end btn-custom-color" id="themeforceupdate" type="submit" name="themeforceupdate" value="theme">FORCE UPDATE NOW</button>
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

	<?php if(isset($license_histories->result) && ($license_histories->result == 'domainblocked' || $license_histories->result == 'failed')):?>
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <strong>Whoops!</strong>  <?= $license_histories->result == 'domainblocked'? 'Domain Blocked:':''; ?> <?= $license_histories->msg;?>
		</div>
	<?php endif;?>


	<?php if(isset($_GET['force'])): 
		if($_GET['force'] == 'success')
	?>

		<div class="alert alert-custom-clr alert-dismissible fade show" role="alert" style="background-color: #1a1a1a;">
		  <strong>Force update for themes run successfully!</strong>
		  <a href="<?= admin_url('admin.php?page=festinger-vault-theme-updates');?>" class="btn-close" aria-label="Close"></a>
		</div>

	<?php elseif(isset($_GET['rollback'])): 
		if($_GET['rollback'] == 'success')
	?>

		<div class="alert alert-custom-clr alert-dismissible fade show" role="alert" style="background-color: #1a1a1a;">
		  <strong>Rollback run successfully!</strong>
		  <a href="<?= admin_url('admin.php?page=festinger-vault-theme-updates');?>" class="btn-close" aria-label="Close"></a>
		</div>

	<?php endif;?> 


		<div class="col-md-12 card-bg-cus pt-4" style="overflow-x: scroll;">
			<table class="table table-responsive table-striped update_plugin">
				<tr>
					<th class="pt-4">Name</th>
					<th class="pt-4">Description</th>
					<th class="pt-4">Plan</th>
					<th style="min-width: 130px;">Current Version</th>
					<th style="min-width: 130px;">New Version</th>
					<th>Auto update</th>
					<th style="min-width: 125px;">Rollback</th>
				</tr>




				<?php 





        // traversing $allPlugins array
        foreach($allThemes as $theme) {

        	$is_toggle_checked = '';

			if (get_option('fv_themes_auto_update_list')==true && (array_search($theme->template, get_option('fv_themes_auto_update_list'))) !== false) {
				$is_toggle_checked = 'checked';
			}

			if($fetching_theme_lists != null){


				$new_version  = '';
				$chk_pkg_type = '';


				if (in_array($theme->template, $fetching_theme_lists)){







	        		$active_theme = '';
					if($activeTheme->Name == $theme->Name){
	            		$active_theme = "<span class='badge bg-info'>Active</span>";
	            	}

	                echo '<tr>';
	                echo "<td class='plugin_update_width_30'>
	                		{$theme->name} <br/>
	                	".$active_theme."
	                </td>";
	                echo "<td class='plugin_update_width_60'>". substr($theme->Description, 0, 50)."...
	                	 </td>";
	                echo "<td><span class='badge btn-custom-color'>";


					foreach($fetching_theme_lists_full as $single_p){
						if($single_p->slug == $theme->template && $single_p->pkg_str_t == 1){
							echo 'onetime';
							continue;
						}

						if($single_p->slug == $theme->template && $single_p->pkg_str_t == 0){
							echo 'recurring';
							continue;
						}

					}



	                echo "</span> </td>";
	                echo "<td class='text-center'>{$theme->Version}</td>";
					
					echo "<td class='text-center'>";
					foreach($fetching_theme_lists_full as $single_p){
						if($single_p->slug == $theme->template && ($single_p->version > $theme['Version'])){
							echo $single_p->version;
							continue;
						}
					}
					echo '</td>';				
					
	                echo "<td>
	                	<center><input class='auto_theme_update_switch' data-id='".$theme->template."' type='checkbox' ".$is_toggle_checked." data-toggle='toggle' data-size='xs'></center>
	                </td>";

	                echo "<td>";
						check_rollback_availability($theme->template, $theme->Version, 'theme');
					echo '</td>';

	                echo '</tr>';
	            }
        	}	
            
        }

				





				?>
			</table>

		</div>
	</div>
</div>


