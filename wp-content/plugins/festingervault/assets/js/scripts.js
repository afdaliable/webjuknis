
jQuery(document).ready(function(jQuery){
    

  jQuery(".auto_theme_update_switch").change(function(){
      var theme_slug_capture = jQuery(this).data("id");
      var theme_switch_is_checked = true;
      if(jQuery(this).prop("checked") == true){
         theme_switch_is_checked = true;
      }else{
         theme_switch_is_checked = false;
      }

        var ajax_url = plugin_ajax_object.ajax_url;
        jQuery.ajax({ 
             data: {action: 'fv_themes_autoupdate_switch', theme_slug_capture:theme_slug_capture, theme_switch_is_checked:theme_switch_is_checked},
             type: 'POST',
             url: ajax_url,
             success: function(data) {
                var data_s = data.slice(0, -1);
                var json = JSON.parse(data_s);
                if(json.status == 'limitcrossed'){
                  jQuery.alert({
                      title: 'Your auto update limit is crossed!',
                      content: 'You have already used all of your auto updates for this month. You can change auto update list again on next renewal. Your auto update limit is '+json.plan_limit+'. This is not applicable for ONETIME license.',
                  });
                }
            }
        });

  });


  jQuery(".auto_plugin_update_switch").change(function(){
      var plugin_slug_capture = jQuery(this).data("id");
      var plugin_switch_is_checked = false;
      if(jQuery(this).prop("checked") == true){
         plugin_switch_is_checked = true;
      }else{
         plugin_switch_is_checked = false;
      }

        
        var ajax_url = plugin_ajax_object.ajax_url;
        jQuery.ajax({ 
             data: {action: 'fv_plugin_autoupdate_switch', plugin_slug_capture:plugin_slug_capture, plugin_switch_is_checked:plugin_switch_is_checked},
             type: 'POST',
             url: ajax_url,
             success: function(data) {
                var data_s = data.slice(0, -1);
                var json = JSON.parse(data_s);


                if(json.status == 'limitcrossed'){
                  jQuery.alert({
                      title: 'Your auto update limit is crossed!',
                      content: 'You have already used all of your auto updates for this month. You can change auto update list again on next renewal. Your auto update limit is '+json.plan_limit+'. This is not applicable for ONETIME license.',
                  });
                  
                }

            }
        });

  });


    jQuery("#white_label").click(function(){
      jQuery.alert({
          title: 'Sorry!!!',
          content: 'Your activated plan does not have white label feature. Please upgrade your license to enable this awesome feature. Click <a href="https://festingervault.com/get-started/" target="_blank">here</a> to upgrade. ',
      });
    });


    jQuery("#pluginforceupdate").click(function(event){
      if(!confirm ("Please confirm and auto update will run instantly!"))
      event.preventDefault();
    });

    jQuery("#themeforceupdate").click(function(event){
      if(!confirm ("Please confirm and auto update will run instantly!"))
      event.preventDefault();
    });




    jQuery("#manual_force_update_r").click(function(){
      jQuery.alert({
          title: 'Sorry!!!',
          content: 'Your activated plan does not have FORCE UPDATE feature.  Please upgrade your license to enable this awesome feature. Click <a href="https://festingervault.com/get-started/" target="_blank">here</a> to upgrade. ',
      });
    });


    jQuery("#no_update_available").click(function(){
      jQuery.alert({
          content: 'No new update is available at this moment!',
      });
    });


    var ajax_filter_data = {};


    if(plugin_ajax_object.get_curr_screen == 'toplevel_page_festinger-vault'){
      jQuery('#ajax-plugin-search-form').ready(function(e){
        load_data(ajax_filter_data);
      });
    }

    jQuery("#filter_type").change(function() {
        var filterValue = jQuery(this).val();
        var row = jQuery('.filter_type_cate_val'); 
          
        row.hide()
        row.each(function(i, el) {

           if(jQuery(el).attr('data-type') == filterValue) {
               jQuery(el).show();
           }
        });

      if ("all" == filterValue) {
        row.show();
      }

         
    });


    jQuery("#reset_filter").click(function(){

      var filterValue = jQuery(this).val();
      var row = jQuery('.filter_type_cate_val'); 
          
      row.show()
      ajax_filter_data = {};

      jQuery("#popular").removeClass("active_button");
      jQuery("#recent").removeClass("active_button");
      jQuery("#featured").removeClass("active_button");
      jQuery("#mylist").removeClass("active_button");
      jQuery("#filter_type").removeClass("active_button");
      jQuery("#filter_category").removeClass("active_button");
      jQuery("#ajax_search").removeClass("active_button");


      jQuery(function() {
          jQuery('#filter_type').val( 'all' );
          jQuery('#filter_category').val( 'all' );
          jQuery('#ajax_search').val( '' );
      })

      load_data(ajax_filter_data);
    });

    jQuery("#mylist").click(function(){
      var mylist = jQuery("#mylist").val();
      Object.assign(ajax_filter_data, {content_type: mylist});
      jQuery("#popular").removeClass("active_button");
      jQuery("#recent").removeClass("active_button");
      jQuery("#featured").removeClass("active_button");
      jQuery("#mylist").addClass("active_button");
      load_data(ajax_filter_data);
    });

    jQuery("#featured").click(function(){
      var featured = jQuery("#featured").val();
      Object.assign(ajax_filter_data, {content_type: featured});
      jQuery("#popular").removeClass("active_button");
      jQuery("#recent").removeClass("active_button");
      jQuery("#mylist").removeClass("active_button");
      jQuery("#featured").addClass("active_button");
      load_data(ajax_filter_data);
    });


    jQuery("#popular").click(function(){
      var popular = jQuery("#popular").val();
      Object.assign(ajax_filter_data, {content_type: popular});
      jQuery("#featured").removeClass("active_button");
      jQuery("#recent").removeClass("active_button");
      jQuery("#popular").addClass("active_button");
      jQuery("#mylist").removeClass("active_button");
      load_data(ajax_filter_data);
    });


    jQuery("#recent").click(function(){
      var recent = jQuery("#recent").val();
      Object.assign(ajax_filter_data, {content_type: recent});
      jQuery("#featured").removeClass("active_button");
      jQuery("#popular").removeClass("active_button");
      jQuery("#mylist").removeClass("active_button");
      jQuery("#recent").addClass("active_button");
      load_data(ajax_filter_data);
    });

    jQuery("#filter_type").change(function(){
      var filter_type = jQuery("#filter_type").val();
      if(filter_type == 'all'){
        jQuery("#filter_type").removeClass("active_button");
      }else{
        jQuery("#filter_type").addClass("active_button");
      }
      Object.assign(ajax_filter_data, {filter_type: filter_type});
      load_data(ajax_filter_data);
    });

    jQuery("#filter_category").change(function(){
      var filter_category = jQuery("#filter_category").val();
      if(filter_category == 'all'){
        jQuery("#filter_category").removeClass("active_button");
      }else{
        jQuery("#filter_category").addClass("active_button");
      }
      Object.assign(ajax_filter_data, {filter_category: filter_category});
      load_data(ajax_filter_data);
    });


    jQuery('#ajax_search').keyup(function(e){
      var ajax_search = jQuery("#ajax_search").val();

      if(ajax_search.length >= 1){
        jQuery("#ajax_search").addClass("active_button");
      }else{
        jQuery("#ajax_search").removeClass("active_button");
      }

      if(e.keyCode == 8){
        Object.assign(ajax_filter_data, {search_data: ajax_search});
        load_data(ajax_filter_data);
      }

      if(ajax_search.length >= 3){
        Object.assign(ajax_filter_data, {search_data: ajax_search});
        load_data(ajax_filter_data);
      }
    
    }); 



    jQuery('#ajax-license-activation-form').on('submit', function(e) {
      e.preventDefault();
      jQuery("#overlaybef").show();　
      jQuery("#overlay").fadeIn(300);　

      var licenseKeyInput = jQuery("#licenseKeyInput").val();
      var ajax_url = plugin_ajax_object.ajax_url;

      jQuery.ajax({ 
           data: {action: 'fv_activation_ajax', licenseKeyInput:licenseKeyInput},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);


              if(json.result == 'failed'){
                jQuery("#activation_result").addClass("card text-center text-danger");
                jQuery("#activation_result").removeClass("text-success text-warning");
              }else if(json.result == 'invalid'){              
                jQuery("#activation_result").addClass("card text-center text-warning");
                jQuery("#activation_result").removeClass("text-success text-danger");
              }else if(json.result == 'valid'){
                jQuery("#ajax-license-activation-form").hide();
                jQuery("#activation_result").addClass("card text-center text-success");
                jQuery("#activation_result").removeClass("text-warning text-danger");
              }

              jQuery('#activation_result').html( json.msg );


            setTimeout(function() {
                location.reload();
            }, 3000);

          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });

    });


    jQuery('#ajax-license-refill-form').on('submit', function(e) {
      e.preventDefault();
      jQuery("#overlaybef").show();　

      jQuery("#overlay").fadeIn(300);　

      var license_key = jQuery("#license_key").val();
      var refill_key = jQuery("#refill_key").val();
      var ajax_url = plugin_ajax_object.ajax_url;

      jQuery.ajax({ 
           data: {action: 'fv_license_refill_ajax', license_key:license_key, refill_key:refill_key},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);

              if(json.result == 'success'){
                jQuery("#credit_refill_msg").removeClass("text-danger mb-3");
                jQuery("#credit_refill_msg").addClass("text-success mb-3");
                jQuery(".refill_button").hide();
                jQuery(".refresh_button").show();
                jQuery("#credit_refill_msg").html(json.msg);
              }else{
                jQuery("#credit_refill_msg").removeClass("text-success mb-3");
                jQuery("#credit_refill_msg").addClass("text-danger mb-3");
                jQuery("#credit_refill_msg").html(json.msg);
              }
            jQuery("#refill_key").val('');
          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });

    });



    jQuery('#ajax-license-refill-form2').on('submit', function(e) {
      e.preventDefault();
      jQuery("#overlaybef").show();　

      jQuery("#overlay").fadeIn(300);　

      var license_key = jQuery("#license_key2").val();
      var refill_key = jQuery("#refill_key2").val();
      var ajax_url = plugin_ajax_object.ajax_url;

      jQuery.ajax({ 
           data: {action: 'fv_license_refill_ajax', license_key:license_key, refill_key:refill_key},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);

              if(json.result == 'success'){
                jQuery("#credit_refill_msg").removeClass("text-danger mb-3");
                jQuery("#credit_refill_msg").addClass("text-success mb-3");
                jQuery(".refill_button").hide();
                jQuery(".refresh_button").show();
                jQuery("#credit_refill_msg").html(json.msg);
              }else{
                jQuery("#credit_refill_msg").removeClass("text-success mb-3");
                jQuery("#credit_refill_msg").addClass("text-danger mb-3");
                jQuery("#credit_refill_msg").html(json.msg);
              }

            jQuery("#refill_key2").val('');
          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });

    });





    jQuery('.ajax-license-deactivation-form').on('submit', function(e) {

      e.preventDefault();
      jQuery("#overlaybef").show();　
      jQuery("#overlay").fadeIn(300);　
      var license_key = jQuery("#license_key").val();
      var license_d = jQuery("#license_d").val();
      var ajax_url = plugin_ajax_object.ajax_url;

      jQuery.ajax({ 
           data: {action: 'fv_deactivation_ajax', license_key:license_key, license_d:license_d},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);

              if(json.result == 'failed'){
                jQuery(".deactivation_result").addClass("card text-center text-danger");
                jQuery(".deactivation_result").removeClass("text-success text-warning");
              }else if(json.result == 'notfound'){
                jQuery(".deactivation_result").addClass("card text-center text-warning");
                jQuery(".deactivation_result").removeClass("text-success text-danger");
              }else if(json.result == 'success'){
                jQuery("#ajax-license-activation-form").hide();
                jQuery(".deactivation_result").addClass("card text-center text-success");
                jQuery(".deactivation_result").removeClass("text-warning text-danger");
              }
              jQuery('.deactivation_result').html( json.msg );
            setTimeout(function() {
                location.reload();
            }, 5000);

          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });

    });


    jQuery('.ajax-license-deactivation-form-2').on('submit', function(e) {
      e.preventDefault();
      jQuery("#overlaybef").show();　
      jQuery("#overlay").fadeIn(300);　
      var license_key = jQuery("#license_key_2").val();
      var license_d = jQuery("#license_d_2").val();
      var ajax_url = plugin_ajax_object.ajax_url;

      jQuery.ajax({ 
           data: {action: 'fv_deactivation_ajax_2', license_key:license_key, license_d:license_d},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);
              if(json.result == 'failed'){
                jQuery(".deactivation_result2").addClass("card text-center text-danger");
                jQuery(".deactivation_result2").removeClass("text-success text-warning");
              }else if(json.result == 'notfound'){
                jQuery(".deactivation_result2").addClass("card text-center text-warning");
                jQuery(".deactivation_result2").removeClass("text-success text-danger");
              }else if(json.result == 'success'){
                jQuery("#ajax-license-activation-form").hide();
                jQuery(".deactivation_result2").addClass("card text-center text-success");
                jQuery(".deactivation_result2").removeClass("text-warning text-danger");
              }
              jQuery('.deactivation_result2').html( json.msg );
            setTimeout(function() {
                location.reload();
            }, 5000);
          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });

    });

});



  function grab_product_hash(d){
    jQuery("#overlay").fadeIn(300);　

    var product_hash = (d.getAttribute("data-id"));
      var ajax_url = plugin_ajax_object.ajax_url;
      jQuery.ajax({ 
           data: {action: 'fv_plugin_buttons_ajax', product_hash:product_hash},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);
             if(json.result == 'failed'){
                    setTimeout(function(){
                      jQuery("#overlay").fadeOut(300);
                    },500);
                    
                    jQuery.alert({
                        content: json.msg,
                    });
              }
              if(json.length == 0){
                jQuery.alert({
                    content: 'To enjoy this feature please activate your license.',
                });
              }else{
                collectort(json);
              }
          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });
  }




  function grab_product_dowload_link(d){
    jQuery("#overlay").fadeIn(300);　

    var plugin_download_hash = (d.getAttribute("data-id"));
    var license_key = (d.getAttribute("data-license"));
    var ajax_url = plugin_ajax_object.ajax_url;

      jQuery.ajax({ 
           data: {action: 'fv_plugin_download_ajax', plugin_download_hash:plugin_download_hash, license_key:license_key},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);

              if(json.result == 'success'){
                jQuery('#'+license_key+' #plan_limit_id').html( json.plan_limit );
                jQuery('#'+license_key+' #current_limit_id').html( json.download_current_limit );
                jQuery('#'+license_key+' #limit_available_id').html( json.download_available + ' / ');
                location.href = json.link;
                jQuery('#empModal').modal('hide'); 
              }else{
                jQuery('#empModal').modal('hide'); 
                if(json.result == 'failed' && json.msg == 'Daily limit crossed'){
                  if(json.plan_type == 'onetime'){
                    jQuery.alert({
                        title: 'Sorry! Limit issue!',
                        content: 'Your Download Limit is over, For onetime license please refill to enjoy downloading again! Happy downloading.',
                    });
                  }else{
                    jQuery.alert({
                        title: 'Sorry! Limit issue!',
                        content: 'Your daily Download Limit is crossed, you can download tomorrow again! Happy downloading.',
                    });
                  }
                }else{
                  if(json.msg){
                    jQuery.alert({
                        title: 'Alert!',
                        content: json.msg,
                    });
                  }else{
                    jQuery.alert({
                        title: 'Alert!',
                        content: 'Something went wrong, Please try again later!',
                    });
                  }
                }
              }
          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });

  }
 


  function collectort(json){
    var button_data = '<div class="row">';

      jQuery.each(json, function(index, item) {
      var ind_item = JSON.parse(item);
      button_data += '<div class="col"><div class="card bg-light" style="min-width:100%;">';
      button_data += '<div class="card-header">';
      button_data += ind_item.plan_name;
      button_data += '</div>';
      button_data += '<ul class="list-group list-group-flush">';
      button_data += '<li class="list-group-item">Plan Type<b>: '+ind_item.plan_type.toUpperCase()+'</b></li>';
      button_data += '<li class="list-group-item">Plan Limit: '+ind_item.plan_limit+'</li>';
      button_data += '<li class="list-group-item">Available Limit: '+(ind_item.download_available)+'</li>';
      button_data += '</ul>';
      button_data += '</div>';
      button_data += '<button id="option1" data-license="'+ ind_item.license_key+'" data-id="'+ind_item.product_hash+'" onclick="grab_product_dowload_link(this); this.disabled=true;" class="btn btn-sm btn-block btn-custom-color"><i class="fa fa-arrow-down"></i>Download from '+ind_item.plan_type.toUpperCase()+' plan </button> ';
      button_data += '</div>';
    });
      button_data += '</div>';

        jQuery('.modal-body').html(button_data);
        jQuery('#empModal').modal('show');
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);

  }


  function grab_product_install_hash(d){
    jQuery("#overlay").fadeIn(300);　

    var product_hash = (d.getAttribute("data-id"));
      var ajax_url = plugin_ajax_object.ajax_url;
      jQuery.ajax({ 
           data: {action: 'fv_plugin_install_button_modal_generate', product_hash:product_hash},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);
              if(json.result == 'failed'){
                    setTimeout(function(){
                      jQuery("#overlay").fadeOut(300);
                    },500);
                    jQuery.alert({
                        content: json.msg,
                    });
              }

              if(json.length == 0){
                jQuery.alert({
                    content: 'To enjoy this feature please activate your license.',
                });
              }else{
                setTimeout(function(){
                  jQuery("#overlay").fadeOut(300);
                },500);
                          
                install_btn_modal_pop_button(json);
              }
          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });
  }


  function install_btn_modal_pop_button(json){

    var generate_install_link = '';
    var button_data = '<div class="row">';
    jQuery.each(json, function(index, item) {
      var ind_item = JSON.parse(item);
      var install_and_activated_text;

      if(ind_item.product_type == 'wordpress-themes'){
        install_and_activated_text = 'Install';
      }else{
        install_and_activated_text = 'Install & Activate';
      }
      generate_install_link = '<button id="option1" data-license="'+ ind_item.license_key+'" data-type="'+ ind_item.product_type+'" data-id="'+ind_item.product_hash+'" href="#" onclick="grab_product_install_link(this);this.disabled=true;" class="btn btn-sm btn-block btn-custom-color"><i class="fa fa-arrow-down"></i>'+install_and_activated_text+' from '+ind_item.plan_type.toUpperCase()+' plan </button>';


      if( jQuery.inArray(ind_item.product_slug, JSON.parse(plugin_ajax_object.get_all_active_themes_js)) !== -1 ) {
        generate_install_link = '<button class="btn btn-sm btn-block disabled btn-custom-color"><i class="fa fa-arrow-down"></i>Already Installed </button>';
      }


      if( jQuery.inArray(ind_item.product_slug, JSON.parse(plugin_ajax_object.get_all_active_plugins_js)) !== -1 ) {
        generate_install_link = '<button class="btn btn-sm btn-block disabled btn-custom-color"><i class="fa fa-arrow-down"></i>Already Installed </button>';
      }

      if( jQuery.inArray(ind_item.product_slug, JSON.parse(plugin_ajax_object.get_all_inactive_themes_js)) !== -1 ) {
        generate_install_link = '<button id="option1" data-license="'+ ind_item.license_key+'" data-type="'+ ind_item.product_type+'" data-id="'+ind_item.product_hash+'" href="#" onclick="grab_product_install_link(this);this.disabled=true;" class="btn btn-sm btn-block btn-custom-color"><i class="fa fa-arrow-down"></i>Already Installed Please Activate</button>';
      }


      if( jQuery.inArray(ind_item.product_slug, JSON.parse(plugin_ajax_object.get_all_inactive_plugins_js)) !== -1 ) {
        generate_install_link = '<button id="option1" data-license="'+ ind_item.license_key+'" data-type="'+ ind_item.product_type+'" data-id="'+ind_item.product_hash+'" href="#" onclick="grab_product_install_link(this);this.disabled=true;" class="btn btn-sm btn-block btn-custom-color"><i class="fa fa-arrow-down"></i>Already Installed Please Activate</button>';
      }

      button_data += '<div class="col"><div class="card bg-light" style="min-width:100%;">';
      button_data += '<div class="card-header">';
      button_data += ind_item.plan_name;
      button_data += '</div>';
      button_data += '<ul class="list-group list-group-flush">';
      button_data += '<li class="list-group-item">Plan Type<b>: '+ind_item.plan_type.toUpperCase()+'</b></li>';
      button_data += '<li class="list-group-item">Plan Limit: '+ind_item.plan_limit+'</li>';
      button_data += '<li class="list-group-item">Available Limit: '+(ind_item.download_available)+'</li>';
      button_data += '</ul>';
      button_data += '</div>';
      button_data += generate_install_link;
      button_data += '</div>';
    });
      button_data += '</div>';
      jQuery('.modal-body').html(button_data);
      jQuery('#empModal').modal('show'); 


      

  }




  function grab_product_install_link(d){
    jQuery("#overlay").fadeIn(300);　
    var plugin_download_hash = (d.getAttribute("data-id"));
    var license_key = (d.getAttribute("data-license"));
    var ajax_url = plugin_ajax_object.ajax_url;


      jQuery.ajax({ 
           data: {action: 'fv_plugin_install_ajax', plugin_download_hash:plugin_download_hash, license_key:license_key},
           type: 'POST',
           url: ajax_url,
           success: function(data) {

              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);
              if(json.result == 'success'){
                jQuery('#'+license_key+' #plan_limit_id').html( json.plan_limit );
                jQuery('#'+license_key+' #current_limit_id').html( json.download_current_limit );
                jQuery('#'+license_key+' #limit_available_id').html( json.download_available + ' / ');
                
                if(json.link == 'theme'){
                  jQuery.alert({
                      content: 'Theme successfully installed. Click here to <a target="_blank" href="'+ json.theme_preview +'">Preview theme</a>!',
                  });         
                }else{
                  location.href = json.activation;
                }
                jQuery('#empModal').modal('hide'); 
              }else{
                jQuery('#empModal').modal('hide'); 
                if(json.result == 'failed' && json.msg == 'Daily limit crossed'){
                    jQuery.alert({
                        title: 'Sorry! Limit issue!',
                        content: 'Your daily Download Limit is crossed, you can download tomorrow again! Happy downloading.',
                    });
                }else{
                  if(json.msg){
                    jQuery.alert({
                        title: 'Alert!',
                        content: json.msg,
                    });
                  }else{
                    jQuery.alert({
                        title: 'Alert!',
                        content: 'Hello!Something went wrong, Please try again later!',
                    });
                  }
                }
              }
          }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });

  }
 


    jQuery.date = function(orginaldate) { 
        var date = new Date(orginaldate);
        var dates = new Date(orginaldate);
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        final_month = months[dates.getMonth()];
        var date =  final_month + " " + day + ", " + year; 

        return date;
    };



    function load_data(ajax_search=''){
      var ajax_url = plugin_ajax_object.ajax_url;
      var show_title_img_fv_link = plugin_ajax_object.show_title_img_fv_link;
      var cdl_allow = plugin_ajax_object.cdl_allow;
      jQuery("#overlay").fadeIn(300);　

      jQuery.ajax({ 
           data: {action: 'fv_search_ajax_data', ajax_search: ajax_search},
           type: 'POST',
           url: ajax_url,
           success: function(data) {
              var data_s = data.slice(0, -1);
              var json = JSON.parse(data_s);
              var here_install_button = '';
              var featured_button = '';

              jQuery('#list').pagination({
                dataSource: json,
                pageSize: 48,
                showNavigator: true,
                formatNavigator: '<span style="color:#fff;"> <%= totalNumber %> results - showing <%= currentPage %> - <%= totalPage %> pages </span>',

                callback: function(data, pagination) {

                    var wrapper = jQuery('#list .wrapper').empty();
                    var row_start = '<div class="row">';
                    var row_end = '</div>';
                    jQuery('#list .wrapper').append(row_start);
                    var plugin_list_data = '<div class="row mb-3">';
                    var j = 1;
                    var col_md_3_visible = '';
                    if(data.length < 4){
                      col_md_3_visible = 'col-md-3';
                    }else{
                      col_md_3_visible = 'col';
                    }
                    if(data.length == 0){
                      jQuery('#list .wrapper').html('<div class=mt-4 mb-4"" style="color:#fff; font-size:20px; text-align:center;">Sorry, No plugins or themes are found!</div>');
                      jQuery('.paginationjs').hide();
                    }else{
                      jQuery('html, body').animate({
                        scrollTop: 0
                      }, 100);

                      jQuery('.paginationjs').show();
                    }

                    var get_list_wrapper_display_size = jQuery('.wrapper').width();
                    var final_show_num_of_items = 4;

                    if(get_list_wrapper_display_size > 900 && get_list_wrapper_display_size < 1500){
                      final_show_num_of_items = 4;
                    }else if(get_list_wrapper_display_size > 2000 && get_list_wrapper_display_size < 3999){
                      final_show_num_of_items = 6;
                    }else if(get_list_wrapper_display_size > 4000){
                      final_show_num_of_items = 8;
                    }else{
                      final_show_num_of_items = 2;
                    }

                    jQuery.each(data, function (i, f) {
                      var here_download_button = '';
                      var here_details_button  = '';
                      var disable_the_button   = '';
                      var is_req_text = '';

                      if(cdl_allow == 0){
                          disable_the_button     = 'disabled';
                      }

                      var fv_wl_link_allow_first_part = '';
                      var fv_wl_link_allow_last_part  = '';

                      if(show_title_img_fv_link == 1){
                        fv_wl_link_allow_first_part = "<a href='"+ f.href +"' style='text-decoration:none;' target='_blank'>";
                        fv_wl_link_allow_last_part  = '</a>';
                      }

                      if(f.featured == 1 || f.featured == '1'){
                        featured_button = '<div style="position: absolute; margin-top: -24px; background: #5a00f0; padding: 4px 12px; border-radius: 12px; margin-left: 36%; font-size: 12px; letter-spacing: .5px; font-weight: 600;"> Featured</div>  ';
                      }else{
                        featured_button = '';
                      }
                        here_install_button = '<button data-id="'+f.unique_rand_md5+'" href="#" onclick="grab_product_install_hash(this);"  class="btn '+disable_the_button+' btn-sm btn-block btn-grey-color" > <i class="fas fa-hourglass-start"></i> Install  </button>';
                      if(f.image == null){
                        f.image = 'https://festingervault.com/wp-content/uploads/2020/12/unnamed-1.jpg';
                      }

                      if(f.type_slug == "wordpress-requests"){
                        here_install_button = '<a class="btn '+disable_the_button+' btn-sm btn-block btn-custom-color" style="font-size:12.6px;padding:13px;" target="_blank" href="'+ f.href +'"><i class="fas fa-external-link-alt"></i>Request Download</a>';
                      }
                      

                      if(f.type_slug == "wordpress-requests"){
                        is_req_text = '<div class="card card-body" style="padding:5px!important; background:#333333; color:#fff;"> This item is requested, but not available for download yet. Vote for it and it will be added! </div>';
                      }else{
                        is_req_text = '';
                      }

                      if( jQuery.inArray(f.new_generated_slug, JSON.parse(plugin_ajax_object.get_all_active_themes_js)) !== -1 ) {
                        here_install_button = '<button class="btn '+disable_the_button+' btn-sm btn-block disabled btn-custom-color"><i class="fa fa-arrow-down"></i>Installed </button>';
                      }

                      if( jQuery.inArray(f.new_generated_slug, JSON.parse(plugin_ajax_object.get_all_active_plugins_js)) !== -1 ) {
                        here_install_button = '<button class="btn '+disable_the_button+' btn-sm btn-block disabled btn-custom-color"><i class="fa fa-arrow-down"></i>Installed </button>';
                      }

                      if( jQuery.inArray(f.new_generated_slug, JSON.parse(plugin_ajax_object.get_all_inactive_themes_js)) !== -1 ) {
                        
                        if(f.type_slug == "wordpress-themes"){
                          here_install_button = '<a data-id="'+f.unique_rand_md5+'"  href="themes.php?theme='+f.new_generated_slug+'" target="_blank" class="btn '+disable_the_button+' btn-sm btn-block btn-custom-color"><i class="fa fa-eye"></i>Manage</a>';

                        }else{
                          here_install_button = '<button data-id="'+f.unique_rand_md5+'"  onclick="grab_product_install_hash(this);" class="btn '+disable_the_button+' btn-sm btn-block btn-custom-color"><i class="fa fa-arrow-down"></i>Activate</button>';
                        }
                      }


                      if( jQuery.inArray(f.new_generated_slug, JSON.parse(plugin_ajax_object.get_all_inactive_plugins_js)) !== -1 ) {
                        
                        if(f.type_slug == "wordpress-themes"){
                          here_install_button = '<a data-id="'+f.unique_rand_md5+'"  href="themes.php?theme='+f.new_generated_slug+'" target="_blank" class="btn '+disable_the_button+' btn-sm btn-block btn-custom-color"><i class="fa fa-eye"></i>Preview</a>';

                        }else{
                          here_install_button = '<button data-id="'+f.unique_rand_md5+'" onclick="grab_product_install_hash(this);" class="btn '+disable_the_button+' btn-sm btn-block btn-custom-color"><i class="fa fa-arrow-down"></i>Activate</button>';
                                  
                        }
                      }
                      if(f.type_slug != "wordpress-requests"){
                        here_download_button = '<div class="col"> <button id="option1" data-id="'+f.unique_rand_md5+'" href="#" onclick="grab_product_hash(this);" class="btn '+disable_the_button+' btn-sm btn-block btn-custom-color"><i class="fa fa-arrow-down"></i>Download </button></div>';
                      }

                      if(f.type_slug != "wordpress-requests"){
                        here_details_button = '<div class="col"> <a target="_blank" style="font-size:12.6px;" href="'+ f.preview+'" class="btn '+disable_the_button+' btn-sm btn-block btn-grey-color"> <i class="fas fa-external-link-alt"></i> Preview </a> </div>';
                      }

                      var summary = jQuery(f.summary).text();
                       plugin_list_data += '<div class="col margin-bottom-xs"><div style="max-width:350px;" class="card h-100"> '+fv_wl_link_allow_first_part+' <img src="'+f.image+'" class="card-img-top" alt="'+ f.title+'" style="height:155px;"> '+fv_wl_link_allow_last_part+' <div class="card-body" style="background: #1a1a1a; color:#f4f5f6; padding:0px;"> <div  style="border-bottom:solid 1px #515151;"> <div class="card-title" style="font-size:12px; padding-bottom:20px; padding-top:10px;padding-left:10px;padding-right:10px;"> '+ featured_button +' <div class="float-start"> '+ jQuery.date(f.modified) +' </div> <div class="float-end"> <i class="fas fa-chart-line"></i> ' + f.hits + ' </div> </div>  </div> <div style="padding:16px 10px;"> '+fv_wl_link_allow_first_part+' <h5 class="card-title" style="font-size: 1.125rem; color:#f4f5f6;font-weight:700;margin-bottom:3px;">'+ f.title+'</h5> '+fv_wl_link_allow_last_part+' <p class="card-text" style="color: #cfcfcf;font-size:.75rem;font-weight:700;letter-spacing:.025rem;text-transform:uppercase;"> '+f.category_slug.replace('-',' ').toUpperCase().replace('-',' ') +' </p>  </div>  <div style="padding: 0px 10px;font-size:.875rem!important;color:#cfcfcf!important; "> '+summary.substring(0,105)+'...'+' '+is_req_text+'</div>  </div> <div class="card-footer" style="background: #1a1a1a;border-top:1px solid #515151;padding:12px 10px;"> <div class="row"> <div class="col"> '+here_install_button+' </div> '+ here_download_button +' '+ here_details_button +'  </div> </div> </div></div>';
                    
                       if(j % final_show_num_of_items==0){
                        plugin_list_data += '</div><div class="row mb-3">';
                       }

                       j++;
                    });

                    if(j % final_show_num_of_items!=0){
                      plugin_list_data += '</div>';
                    }
                      plugin_list_data += '</div>';
                      jQuery('#list .wrapper').append(plugin_list_data);
                  }

                 });


            }
      }).done(function() {
        setTimeout(function(){
          jQuery("#overlay").fadeOut(300);
        },500);
      });

    }









