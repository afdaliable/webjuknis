<div style="display: none;" id="overlaybef">
<div id="overlay">
  <div class="loading-container">
      <div class="loading"></div>
      <div id="loading-text">loading</div>

  </div>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">

    <?php 
      if($all_license_data->validation->license_1 != 'notfound'):
    ?>

      <div class="card card-bg-cus" style="min-width:100%;">
        <div class="card-header">
          <b>License Key:</b> <?php 
			
				$license_key_view = $all_license_data->license_1->license_data->license_key; 
				echo substr($license_key_view,0,5) . '**********************' . substr($license_key_view,-5);

			
			?>
          <span class="float-end">
              
              <?php if($all_license_data->license_1->license_data->license_status == 'valid'): ?>
                <span style="color:#fff;" class="badge bg-success">Activated</span>
              <?php else: ?>
                <span style="color:#fff;" class="badge bg-danger">Suspended</span>
              <?php endif; ?>

              <?php if($all_license_data->license_1->license_data->license_type == 'onetime'): ?>

              <!-- Button trigger modal -->
              <button type="button" class="badge non_active_button" style="min-height: 20px!important; font-size: 12px!important; font-weight: bold; padding: 4px!important;background: #ff2a9c!important" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Refil Download Credit
              </button>

              <!-- Modal  modal fade-->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header" style="background:#1a1a1a;">
                      <h6 class="modal-title" id="exampleModalLabel" style="font-size: 14px;">
                        <b>Plan:</b><?= $all_license_data->license_1->license_data->license_plan_name;?>
                        <br/><b>License Key:</b> <?= $all_license_data->license_1->license_data->license_key; ?>
                        </h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form" id="ajax-license-refill-form" action="#">

                      <div class="modal-body">
                        <div class="mb-3">
                          <input type="hidden" id="license_key" name="license_key" value="<?= $all_license_data->license_1->license_data->license_key; ?>" required>
                          <label for="refill_key" class="form-label refill_button">Enter your unused ONETIME Plan license Key </label>
                          <input type="text" class="form-control refill_button" id="refill_key" name="refill_key" placeholder="Please enter your unused one time license key..." required>
                        </div>

                        <div id="credit_refill_msg"></div>

                        <p><b>Note:</b> You can use your onetime purchased license key as refill key if that is not previously used or activated as license. Once you redeem, it will add balance with current key. </p>

                      </div>
                      <div class="modal-footer">
                        <button style="height: 32px; margin-top: 5px;margin-right: 4px;" type="button" class="btn btn-grey-color" data-bs-dismiss="modal">Close</button>

                        <a href="https://festingervault.com/pay-as-you-go/" class="btn btn-primary float-start refill_button btn-grey-color" target="_blank">Purchase Credit</a>
                        <a href="" class="btn btn-primary float-start refresh_button btn-grey-color" style="display: none;">Refresh</a>
                        <button type="submit" class="btn btn-primary btn-md refill_button" style="height:29px; margin-top:4px;font-size:16px!important;">Redeem & Refill Now</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>

              <?php endif;?>

          </span>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered table-striped">
            <tr>
              <th>Plan Name: </th>
              <th> <?= $all_license_data->license_1->license_data->license_plan_name;?> </th>
            </tr>
            <tr>
              <th>Plan Type: </th>
              <th> <?= ucfirst($all_license_data->license_1->license_data->license_type);?> </th>
            </tr>
            <tr>
              <th>Plan Credit Limit: </th>
              <th> 

                <span id="plan_limit_id"> <?= $all_license_data->license_1->license_data->plan_credit_limit;?> </span>
                / 
                <?= ucfirst($all_license_data->license_1->license_data->license_type);?>
              </th>
            </tr>

            <tr>
              <th>Credit Available: </th>
              <th> 

                <span id="limit_available_id"> <?= $all_license_data->license_1->license_data->plan_credit_available;?> </span>
                / 
                <?= ucfirst($all_license_data->license_1->license_data->license_type);?>
              </th>
            </tr>

            <tr>
              <th>Expiration Date: </th>
              <th> 
                <?= $all_license_data->license_1->license_data->expiration_date;?>  
              </th>
            </tr>

            <?php if($all_license_data->license_1->license_data->license_type == 'recurring'): ?>
              <tr>
                <th>Credit Limit Reset In</th>
                <th> 
                <?php
                  date_default_timezone_set("UTC");
                  $datetime = new DateTime('tomorrow');
                  $next_day_start = $datetime->format('Y-m-d H:i:s');
                  $get_now = date('Y-m-d H:i:s');
                  $hourdiff = round((strtotime($next_day_start) - strtotime($get_now))/3600, 1);
                  echo $hourdiff;
                ?>
                 Hour(s)</th>
              </tr>
            <?php endif; ?>

          </table>

        </div>

        <div class="card-footer text-center">




          <?php 

            if($all_license_data->validation->license_1 != 'notfound'):
              $get_license_own_db = '';
              if(get_option( '_data_ls_key_no_id_vf' ) == $all_license_data->license_1->license_data->license_key):
                $get_license_own_db = get_option( '_data_ls_key_no_id_vf' );
              ?>
                <form class="ajax-license-deactivation-form" action="#">
                    <input type="hidden" required id="license_key" name="license_key" value="<?= $get_license_own_db ;?>">
                    <input type="hidden" required id="license_d" name="license_d" value="<?php echo get_option( '_ls_domain_sp_id_vf' );?>">
                  <button type="submit" class="btn btn-warning btn-sm non_active_button">Click here </button>  to remove license from this domain.
                </form>
              <?php 


              endif;
             
          ?>




          <?php endif;?>


          <div class="row">
            <div class='deactivation_result'></div>
          </div>


        </div>

      </div>









    <?php endif; ?>


    <?php 
      if($all_license_data->validation->license_2 != 'notfound'):
    ?>

      <div class="card card-bg-cus" style="min-width:100%;">
        <div class="card-header">
          <b>License Key:</b> <?php
								   
				$license_key_view = $all_license_data->license_2->license_data->license_key; 
				echo substr($license_key_view,0,5) . '**********************' . substr($license_key_view,-5);
								   
			?>
          <span class="float-end">
              
              <?php if($all_license_data->license_2->license_data->license_status == 'valid'): ?>
                <span style="color:#fff;" class="badge bg-success">Activated</span>
              <?php else: ?>
                <span style="color:#fff;" class="badge bg-danger">Suspended</span>
              <?php endif; ?>



              <?php if($all_license_data->license_2->license_data->license_type == 'onetime'): ?>


              <!-- Button trigger modal -->
              <button type="button" class="badge non_active_button" style="min-height: 20px!important; font-size: 12px!important; font-weight: bold; padding: 4px!important;background: #ff2a9c!important" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Refil Download Credit
              </button>

              <!-- Modal  modal fade-->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header" style="background:#1a1a1a;">
                      <h6 class="modal-title" id="exampleModalLabel" style="font-size: 14px;">
                        <b>Plan:</b><?= $all_license_data->license_2->license_data->license_plan_name;?>
                        <br/><b>License Key:</b> <?= $all_license_data->license_2->license_data->license_key; ?>
                        </h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form" id="ajax-license-refill-form2" action="#">

                      <div class="modal-body">
                        <div class="mb-3">
                          <input type="hidden" id="license_key2" name="license_key" value="<?= $all_license_data->license_2->license_data->license_key; ?>" required>
                          <label for="refill_key" class="form-label refill_button">Enter your unused ONETIME Plan license Key </label>
                          <input type="text" class="form-control refill_button" id="refill_key2" name="refill_key" placeholder="Please enter your unused one time license key..." required>
                        </div>

                        <div id="credit_refill_msg"></div>

                        <p><b>Note:</b> You can use your onetime purchased license key as refill key if that is not previously used or activated as license. Once you redeem, it will add balance with current key. </p>

                      </div>
                      <div class="modal-footer">
                        <button style="height: 32px; margin-top: 5px;margin-right: 4px;" type="button" class="btn btn-grey-color" data-bs-dismiss="modal">Close</button>

                        <a href="https://festingervault.com/pay-as-you-go/" class="btn btn-primary float-start refill_button btn-grey-color" target="_blank">Purchase Credit</a>
                        <a href="" class="btn btn-primary float-start refresh_button btn-grey-color" style="display: none;">Refresh</a>
                        <button type="submit" class="btn btn-primary btn-md refill_button" style="height:29px; margin-top:4px;font-size:16px!important;">Redeem & Refill Now</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>

              <?php endif;?>

          </span>
        </div>
        <div class="card-body">
          
          <table class="table table-bordered table-striped">
            <tr>
              <th>Plan Name: </th>
              <th> <?= $all_license_data->license_2->license_data->license_plan_name;?> </th>
            </tr>
            <tr>
              <th>Plan Type: </th>
              <th> <?= ucfirst($all_license_data->license_2->license_data->license_type);?> </th>
            </tr>
            <tr>
              <th>Plan Credit Limit: </th>
              <th> 

                <span id="plan_limit_id"> <?= $all_license_data->license_2->license_data->plan_credit_limit;?> </span>
                / 
                <?= ucfirst($all_license_data->license_2->license_data->license_type);?>
              </th>
            </tr>

            <tr>
              <th>Credit Available: </th>
              <th> 

                <span id="limit_available_id"> <?= $all_license_data->license_2->license_data->plan_credit_available;?> </span>
                / 
                <?= ucfirst($all_license_data->license_2->license_data->license_type);?>
              </th>
            </tr>

            <tr>
              <th>Expiration Date: </th>
              <th> 
                <?= $all_license_data->license_2->license_data->expiration_date;?>  
              </th>
            </tr>
            <?php if($all_license_data->license_2->license_data->license_type == 'recurring'): ?>
              <tr>
                <th>Credit Limit Reset In</th>
                <th> 
                <?php
                  date_default_timezone_set("UTC");
                  $datetime = new DateTime('tomorrow');
                  $next_day_start = $datetime->format('Y-m-d H:i:s');
                  $get_now = date('Y-m-d H:i:s');
                  $hourdiff = round((strtotime($next_day_start) - strtotime($get_now))/3600, 1);
                  echo $hourdiff;
                ?>
                 Hour(s)</th>
              </tr>
            <?php endif; ?>
          </table>

        </div>

        <div class="card-footer text-center">




          <?php 

            if($all_license_data->validation->license_2 != 'notfound'):
              $get_license_own_db = '';

             
              if(get_option( '_data_ls_key_no_id_vf_2' ) == $all_license_data->license_2->license_data->license_key):
                $get_license_own_db_2 = get_option( '_data_ls_key_no_id_vf_2' );
              ?>

                  <form class="ajax-license-deactivation-form-2" action="#">
                    <input type="hidden" required id="license_key_2" name="license_key_2" value="<?= $get_license_own_db_2 ;?>">
                    <input type="hidden" required id="license_d_2" name="license_d_2" value="<?php echo get_option( '_ls_domain_sp_id_vf_2' );?>">
                  <button type="submit" class="btn btn-warning btn-sm non_active_button">Click here </button>  to remove license from this domain.
                </form>
              <?php endif;?>

          <?php endif;?>


          <div class="row">
            <div class='deactivation_result2'></div>
          </div>


        </div>

      </div>




    <?php endif; //end license 2action  ?>






     <div class="card card-bg-cus" style="min-width:100%;">
        <div class="card-body">
          <h5 class="card-title">License Activation</h5>


          <?php 

          if($all_license_data->validation->license_1 == 'notfound' || $all_license_data->validation->license_2 == 'notfound'):?>


            <p class="card-text">Please enter your activation license key to activate and enjoy our service. Don't have a license key? Buy now, only $9/month and get access to all of our 5000+ plugins directory.</p>



            <form class="form" id="ajax-license-activation-form" action="#">


              <div class="mb-3">
                <label for="licenseKeyInput" class="form-label">Please enter your license key</label>
                <input type="text" required class="form-control search_bg_clr" id="licenseKeyInput" name="licenseKeyInput" aria-describedby="licenseKeyHelp" placeholder="Please enter your license key here...">
                <div id="licenseKeyHelp" class="form-text">Don't share your license key with anyone else.</div>
              </div>

              <button type="submit" class="btn non_active_button">Activate now</button>
            </form>

          <?php endif;?>

          <div class="row">
            <div id='activation_result'></div>
          </div>


        </div>

        <div class="card-footer">
          <small class="text-muted">
          <?php if($all_license_data->validation->license_1 == 'valid' || $all_license_data->validation->license_2 == 'valid'):?>

            Your license is registered with <b><?php echo get_home_url();?></b> domain.</small>
          <?php else: ?>
            You are registering your license with <b><?php echo get_home_url();?></b> domain.</small>
          <?php endif;?>

        </div>



      </div>



    </div>
  </div>
</div>



