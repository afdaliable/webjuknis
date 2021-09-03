<div class="container-fluid" style="padding:0px 20px; background: #222222;">
	<div class="row">
		<div class="col-md-12">
		  <?php if(get_option('wl_fv_plugin_wl_enable') !=1):?>
			<div class="card mb-3 card-bg-cus" style="min-width: 100%;">
			  <div class="card-header">
			    Festinger Vault white labeling feature
			  </div>
			  <div class="card-body">
			    <form method="post" action="" name="wl_form">
				<div class="row">

					<div class="col-md-4">
						
					  <div class="mb-3">
					    <label for="agency_author" class="form-label">Agency Author</label>
					    <input type="text" class="form-control search_bg_clr" value="<?= get_option('wl_fv_plugin_agency_author_wl_'); ?>" name="agency_author">
					  </div>
					  <div class="mb-3">
					    <label for="agency_author" class="form-label">Agency Author URL</label>
					    <input type="text" class="form-control search_bg_clr" value="<?= get_option('wl_fv_plugin_author_url_wl_'); ?>" name="agency_author_url">
					  </div>
					  <div class="mb-3">
					    <label for="fv_plugin_icon_url" class="form-label">Plugin Icon URL</label>
					    <input type="text" class="form-control search_bg_clr" value="<?= get_option('wl_fv_plugin_icon_url_wl_'); ?>" name="fv_plugin_icon_url">
					  </div>
					</div>

					<div class="col-md-4">
						<div class="mb-3">
						  <label for="fv_plugin_name" class="form-label">Plugin Name</label>
						  <input type="text" class="form-control search_bg_clr" value="<?= get_option('wl_fv_plugin_name_wl_'); ?>" name="fv_plugin_name">
						</div>
						<div class="mb-3">
						  <label for="fv_plugin_name" class="form-label">Plugin Slogan</label>
						  <input type="text" class="form-control search_bg_clr" value="<?= get_option('wl_fv_plugin_slogan_wl_'); ?>" name="fv_plugin_slogan">
						</div>
						<div class="mb-3">
						  <label for="fv_plugin_description" class="form-label">Plugin Description</label>
						  <textarea class="form-control search_bg_clr" style="height: 30px;" name="fv_plugin_description" rows="4"><?= get_option('wl_fv_plugin_description_wl_'); ?></textarea>
						</div>
					</div>

					<div class="col-md-4">
						
					    <label for="fv_plugin_icon_url" class="form-label">Enable White Label</label>

						<div class="form-check mt-3">
						  <input class="form-check-input custom-checkbox-color" type="checkbox" value="1" name="fv_plugin_wl_enable">
						  <label class="form-check-label" for="fv_plugin_wl_enable" style="margin-top: -19px;">
						    Enable white label
						  </label>
						</div>

						<div id="white_label_help" class="form-text">By enabling white label, The white label settings will be removed.

						If you want to access while label settings in future, simply deactivate the Festinger Vault plugin and activate it again. </div>


					</div>

					
					<div class='row'>
						<div class='col-md-2'>
										  		<?php 
				  			if($all_license_data->license_1->options->white_label == 'yes' || $all_license_data->license_2->options->white_label=='yes'):

				  		?>
				  			<input type="submit" class="mt-3 btn btn-primary btn-block non_active_button" name="fv_wl_submit" value="Submit"/>
				  		<?php else: ?>
				  			<div class="mt-3 btn btn-info btn-block non_active_button" id="white_label">Submit</div>
				  		<?php endif; ?>

						</div>
						
						<div class='col-md-10'></div>
					</div>
					
				</div>

				</form>

			  </div>
			</div>

		  <?php endif;?>
		</div>
	</div>




	<div class="row">
		<div class="col-md-12">
			<div class="card card-bg-cus mb-3" style="min-width: 100%;">
			  <div class="card-header">
			    Hide/Block admin notices
			  </div>
			  <div class="card-body">


			    <form method="post" action="" name="an_form">
					<div class="row mt-3">
						<div class="col-md-5">

							<div class="form-check">
							  <input class="form-check-input custom-checkbox-color" type="checkbox" <?php if(get_option('an_fv_dis_adm_not_hid') == 1){echo 'checked';} ?> name="an_fv_dis_adm_not_hid" value="1" id="only_dismissable">
							  <label class="form-check-label" for="only_dismissable" style="margin-top: -19px;">
							    Block only Dismissable admin notices
							  </label>
							</div>
						</div>

						<div class="col-md-5 margin-bottom-xs-20">
							<div class="form-check">
							  <input class="form-check-input custom-checkbox-color" name="an_fv_all_adm_not_hid" type="checkbox" <?php if(get_option('an_fv_all_adm_not_hid') == 1){echo 'checked';} ?>  value="1" id="all_notices">
							  <label class="form-check-label" for="all_notices" style="margin-top: -19px;">
							    Block All admin notices
							  </label>
							</div>
						</div>

						<div class="col-md-2"><input style="margin-top: -12px!important;" type="submit" class="mt-3 btn btn-success btn-block non_active_button" name="fv_admin_notice" value="Update"/></div>
					</div>

				</form>

			  </div>
			</div>

		</div>
	</div>




</div>