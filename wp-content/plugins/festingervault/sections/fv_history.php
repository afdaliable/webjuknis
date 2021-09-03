<div class="container-fluid" style="padding:0px; background: #222222;">
  
	<div class="row" style="padding:20px;background: #222;">
		<div class="col-md-12 plugin_updated_h4 pb-2">
			<h4>History </h4>
			<p>Your Subscriptions, Downloads, Refill Update history will be here.</p>
		</div>
	</div>



  <div class="row">



    <div class="col-md-12" style="background: #1b1b1b;">
<div class="card history_page_card" style="max-width: 100%">
  <div class="card-body table-responsive">

		<table id="history_table" class="display table table-responsive ">
		  <thead>
			<tr class="table-dark">
				<th>Name</th>
				<th style="min-width: 100px;">History Type</th> <!-- update, download, istall-->
				<th>Website</th>
				<th>Credit</th>
				<th style="min-width: 100px;">Plan Type</th>
				<th>License Key</th>
				<th style="min-width: 100px;">Date (Y-m-d)</th>
			</tr>
		  </thead>
		  <tbody>
			<?php foreach($license_histories as $history): ?>

				<tr>
					<td><?= $history->theme_plugin_name ;?></td>
					<td><?= ucfirst($history->history_type) ;?></td>
					<td><?= ($history->website) ;?></td>
					<td><?= ($history->credit_required) ;?></td>
					<td><?= ucfirst($history->logged_license_type) ;?></td>
					<td>
						<?php  
							$license_key_view = $history->logged_license; 
							echo substr($license_key_view,0,5) . '**********************' . substr($license_key_view,-5);
 						?>
					</td>
					<td class="text-center"><?= date("Y-m-d",strtotime($history->created_at)) ;?></td>
				</tr>
			<?php endforeach; ?>
		  </tbody>
		</table>

  </div>
</div>



	</div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {


	    $('#history_table').DataTable( {
	    	"pageLength": 50,
	        "order": [[ 6, "DESC" ]]
	    } );

	} );
</script>