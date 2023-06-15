

<div class="modal fade" id="mdl-profile-modal" tabindex="-1" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">

          <div class="modal-header">
              <h5 id="lbl-profile-modal-title" class="modal-title">profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

              <div id="div-profile-modal-error" class="alert alert-danger" role="alert"></div>
              <form class="form-horizontal" id="frm-profile-modal" role="form" method="POST" enctype="multipart/form-data" action="">
                      <div class="col-lg-12 pe-2">
                          
                          @csrf
                          
                          {{-- <div class="offline-flag"><span class="offline-profiles">You are currently offline</span></div> --}}

                          <div id="spinner-profiles" class="spinner-border text-primary" role="status"> 
                              <span class="visually-hidden">Loading...</span>
                          </div>

                          <input type="hidden" id="txt-profile-primary-id" value="0" />
                          <div id="div-show-txt-profile-primary-id">
                              <div class="row">
                                  <div class="col-lg-12">
                                  {{-- @include('profiles.show_fields') --}}
                                  </div>
                              </div>
                          </div>
                          <div id="div-edit-txt-profile-primary-id">
                              <div class="row">
                                  <div class="col-lg-12">
                                  @include('profiles.fields')
                                  </div>
                              </div>
                          </div>

                      </div>
                  
              </form>
              <div class="modal-footer" id="div-save-mdl-profile-modal">
                  <button type="button" class="btn btn-primary" id="btn-save-mdl-profile-modal" value="add">Save</button>
              </div>
          </div>

      

      </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    //Show Modal for New Entry
    $(document).on('click', ".btn-new-mdl-profile-modal", function(e) {
        $('#div-profile-modal-error').hide();
        $('#mdl-profile-modal').modal('show');
        $('#frm-profile-modal').trigger("reset");
        $('#txt-profile-primary-id').val(0);

        $('#div-show-txt-profile-primary-id').hide();
        $('#div-edit-txt-profile-primary-id').show();

        $("#spinner-profiles").hide();
        $("#div-save-mdl-profile-modal").attr('disabled', false);
    });

     //Show Modal for View
     $(document).on('click', ".btn-show-mdl-profile-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        // if (!window.navigator.onLine) {
        //     $('.offline-profile').fadeIn(300);
        //     return;
        // }else{
        //     $('.offline-profile').fadeOut(300);
        // }

        $('#div-profile-modal-error').hide();
        $('#mdl-profile-modal').modal('show');
        $('#frm-profile-modal').trigger("reset");

        $("#spinner-profile").show();
        $("#div-save-mdl-profile-modal").attr('disabled', true);

        $('#div-show-txt-profile-primary-id').show();
        $('#div-edit-txt-profile-primary-id').hide();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('api.profiles.show','') }}/"+itemId).done(function( response ) {
			
             
		$('#txt-profile-primary-id').val(response.data.id);
        $('#spn_profile_first_name').html(response.data.first_name);
		$('#spn_profile_last_name').html(response.data.last_name);
		$('#spn_profile_middle_name').html(response.data.middle_name);
		$('#spn_profile_profile_picture_path').html(response.data.profile_picture_path);
		$('#spn_profile_email').html(response.data.email);
		$('#spn_profile_username').html(response.data.username);
		$('#spn_profile_telephone').html(response.data.telephone);
		$('#spn_profile_job_title').html(response.data.job_title);
		$('#spn_profile_date_of_birth').html(response.data.date_of_birth);
	


            $("#spinner-profile").hide();
            $("#div-save-mdl-profile-modal").attr('disabled', false);
        });
    });
    $(document).on('change', '#cover_image_path', function(e){
       var input = $(this)[0];
       if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                $('#cover_image_path_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
       }
 
    })
     //Show Modal for Edit
     $(document).on('click', ".btn-edit-mdl-profile", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        $('#div-profile-modal-error').hide();
        $('#mdl-profile-modal').modal('show');
        $('#frm-profile-modal').trigger("reset");

        $("#spinner-profile").show();
        $("#div-save-mdl-profile-modal").attr('disabled', true);

        $('#div-show-txt-profile-primary-id').hide();
        $('#div-edit-txt-profile-primary-id').show();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('api.profiles.show','') }}/"+itemId).done(function( response ) {     

			$('#txt-profile-primary-id').val(response.data.id);
      $('#first_name').val(response.data.first_name);
      $('#last_name').val(response.data.last_name);
      $('#middle_name').val(response.data.middle_name);
      $('#date_of_birth').val(response.data.date_of_birth);
      $('#telephone').val(response.data.telephone);
      $('#job_title').val(response.data.job_title);
      $('#username').val(response.data.username);
      $('#email').val(response.data.email);
    //   $('#password').val(response.data.password);
    //  $('#cover_image_path_preview').attr('src', response.data.cover_image);
		


            $("#spinner-profile").hide();
            $("#div-save-mdl-profile-modal").attr('disabled', false);
        });
    });
 //Save details
 $('#btn-save-mdl-profile-modal').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});


        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline-profiles').fadeIn(300);
            return;
        }else{
            $('.offline-profiles').fadeOut(300);
        }

        $("#spinner-profiles").show();
        $("#div-save-mdl-profile-modal").attr('disabled', true);

        let actionType = "POST";
        let endPointUrl = "{{ route('api.profiles.store') }}";
        let primaryId = $('#txt-profile-primary-id').val();
        console.log($('#txt-profile-primary-id').val());
        
        let formData = new FormData();
        formData.append('_token', $('input[name="_token"]').val());
        

        if (primaryId != "0"){
            actionType = "PUT";
            endPointUrl = "{{ route('api.profiles.update','') }}/"+primaryId;
            formData.append('id', primaryId);
        }
        
        formData.append('_method', actionType);

        // formData.append('', $('#').val());
        if ($('#first_name').length){	formData.append('first_name',$('#first_name').val());	}
		if ($('#last_name').length){	formData.append('last_name',$('#last_name').val());	}
		if ($('#middle_name').length){	formData.append('middle_name',$('#middle_name').val());	}
            if ($('#telephone').length){	formData.append('telephone',$('#telephone').val());	}
            if ($('#job_title').length){	formData.append('job_title',$('#job_title').val());	}
            if ($('#username').length){	formData.append('username',$('#username').val());	}
            if ($('#email').length){	formData.append('email',$('#email').val());	}
            if ($('#date_of_birth').length){	formData.append('date_of_birth',$('#date_of_birth').val());	}
            if ($('#password').length){	formData.append('password',$('#password').val());	}
            if ($('#profile_picture_path').length){	formData.append('profile_picture_path',$('#profile_picture_path')[0].files[0]);	}
        
        $.ajax({
            url:endPointUrl,
            type: "POST",
            data: formData,
            cache: false,
            processData:false,
            contentType: false,
            dataType: 'json',
            success: function(result){
                if(result.errors){
					$('#div-profile-modal-error').html('');
					$('#div-profile-modal-error').show();
                    
                    $.each(result.errors, function(key, value){
                        $('#div-profile-modal-error').append('<li class="">'+value+'</li>');
                    });
                }else{
                    $('#div-profile-modal-error').hide();
                    // window.setTimeout( function(){

                        $('#div-profile-modal-error').hide();

                        swal({
                                title: "Saved",
                                text: "profile saved successfully",
                                type: "success"
                            },function(){
                                location.reload(true);
                        });

                    // },20);
                }

                $("#spinner-profiles").hide();
                $("#div-save-mdl-profile-modal").attr('disabled', false);
                
            }, error: function(data){
                console.log(data);
                swal("Error", "Oops an error occurred. Please try again.", "error");

                $("#spinner-profiles").hide();
                $("#div-save-mdl-profile-modal").attr('disabled', false);

            }
        });
    });


    //Delete action
    $(document).on('click', ".btn-delete-mdl-profile", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline-profile').fadeIn(300);
            return;
        }else{
            $('.offline-profile').fadeOut(300);
        }

        let itemId = $(this).attr('data-val');
        swal({
                title: "Are you sure you want to delete this profile?",
                text: "You will not be able to recover this profile if deleted.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {

                    swal({
                        title: '<div id="spinner-profile" class="spinner-border text-primary" role="status"> <span class="visually-hidden">  Processing...  </span> </div> <br><br> Please wait...',
                        text: 'Deleting profile.',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        html: true
                    }) 
                                        
                    let endPointUrl = "{{ route('api.profiles.destroy','') }}/"+itemId;

                    let formData = new FormData();
                    formData.append('_token', $('input[name="_token"]').val());
                    formData.append('_method', 'DELETE');
                    
                    $.ajax({
                        url:endPointUrl,
                        type: "POST",
                        data: formData,
                        cache: false,
                        processData:false,
                        contentType: false,
                        dataType: 'json',
                        success: function(result){
                            if(result.errors){
                                console.log(result.errors)
                                swal("Error", "Oops an error occurred. Please try again.", "error");
                            }else{
                                swal({
                                        title: "Deleted",
                                        text: "profile deleted successfully",
                                        type: "success",
                                        confirmButtonClass: "btn-success",
                                        confirmButtonText: "OK",
                                        closeOnConfirm: false
                                    },function(){
                                        location.reload(true);
                                });
                            }
                        },
                    });
                }
        });
    });

  });
</script>
