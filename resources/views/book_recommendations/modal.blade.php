

<div class="modal fade" id="mdl-book_recommendation-modal" tabindex="-1" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">

          <div class="modal-header">
              <h5 id="lbl-book_recommendation-modal-title" class="modal-title">Book_recommendation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

              <div id="div-book_recommendation-modal-error" class="alert alert-danger" role="alert"></div>
              <form class="form-horizontal" id="frm-book_recommendation-modal" role="form" method="POST" enctype="multipart/form-data" action="">
                      <div class="col-lg-12 pe-2">
                          
                          @csrf
                          
                          {{-- <div class="offline-flag"><span class="offline-book_recommendations">You are currently offline</span></div> --}}

                          <div id="spinner-book_recommendations" class="spinner-border text-primary" role="status"> 
                              <span class="visually-hidden">Loading...</span>
                          </div>

                          <input type="hidden" id="txt-book_recommendation-primary-id" value="0" />
                          <div id="div-show-txt-book_recommendation-primary-id">
                              <div class="row">
                                  <div class="col-lg-12">
                                  @include('book_recommendations.show_fields')
                                  </div>
                              </div>
                          </div>
                          <div id="div-edit-txt-book_recommendation-primary-id">
                              <div class="row">
                                  <div class="col-lg-12">
                                  @include('book_recommendations.fields')
                                  </div>
                              </div>
                          </div>

                      </div>
                  
              </form>
              <div class="modal-footer" id="div-save-mdl-book_recommendation-modal">
                  <button type="button" class="btn btn-primary" id="btn-save-mdl-book_recommendation-modal" value="add">Save</button>
              </div>
          </div>

      

      </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    //Show Modal for New Entry
    $(document).on('click', ".btn-new-mdl-book_recommendation-modal", function(e) {
        $('#div-book_recommendation-modal-error').hide();
        $('#mdl-book_recommendation-modal').modal('show');
        $('#frm-book_recommendation-modal').trigger("reset");
        $('#txt-book_recommendation-primary-id').val(0);

        $('#div-show-txt-book_recommendation-primary-id').hide();
        $('#div-edit-txt-book_recommendation-primary-id').show();

        $("#spinner-book_recommendations").hide();
        $("#div-save-mdl-book_recommendation-modal").attr('disabled', false);
    });

     //Show Modal for View
     $(document).on('click', ".btn-show-mdl-book_recommendation-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        // if (!window.navigator.onLine) {
        //     $('.offline-book_recommendation').fadeIn(300);
        //     return;
        // }else{
        //     $('.offline-book_recommendation').fadeOut(300);
        // }

        $('#div-book_recommendation-modal-error').hide();
        $('#mdl-book_recommendation-modal').modal('show');
        $('#frm-book_recommendation-modal').trigger("reset");

        $("#spinner-book_recommendation").show();
        $("#div-save-mdl-book_recommendation-modal").attr('disabled', true);

        $('#div-show-txt-book_recommendation-primary-id').show();
        $('#div-edit-txt-book_recommendation-primary-id').hide();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('api.book_recommendations.show','') }}/"+itemId).done(function( response ) {
			
			$('#txt-book_recommendation-primary-id').val(response.data.id);
		$('#spn_book_recommendation_title').html(response.data.title);
		$('#spn_book_recommendation_description').html(response.data.description);
		$('#spn_book_recommendation_author').html(response.data.author);
		$('#spn_book_recommendation_cover_image').html(response.data.cover_image);
		$('#spn_book_recommendation_cover_image_path').html(response.data.cover_image_path);
	


            $("#spinner-book_recommendation").hide();
            $("#div-save-mdl-book_recommendation-modal").attr('disabled', false);
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
     $(document).on('click', ".btn-edit-mdl-book_recommendation", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        $('#div-book_recommendation-modal-error').hide();
        $('#mdl-book_recommendation-modal').modal('show');
        $('#frm-book_recommendation-modal').trigger("reset");

        $("#spinner-book_recommendation").show();
        $("#div-save-mdl-book_recommendation-modal").attr('disabled', true);

        $('#div-show-txt-book_recommendation-primary-id').hide();
        $('#div-edit-txt-book_recommendation-primary-id').show();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('api.book_recommendations.show','') }}/"+itemId).done(function( response ) {     

			$('#txt-book_recommendation-primary-id').val(response.data.id);
      $('#title').val(response.data.title);
      $('#description').val(response.data.description);
      $('#author').val(response.data.author);
     $('#cover_image_path_preview').attr('src', response.data.cover_image);
		


            $("#spinner-book_recommendation").hide();
            $("#div-save-mdl-book_recommendation-modal").attr('disabled', false);
        });
    });
 //Save details
 $('#btn-save-mdl-book_recommendation-modal').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});


        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline-book_recommendations').fadeIn(300);
            return;
        }else{
            $('.offline-book_recommendations').fadeOut(300);
        }

        $("#spinner-book_recommendations").show();
        $("#div-save-mdl-book_recommendation-modal").attr('disabled', true);

        let actionType = "POST";
        let endPointUrl = "{{ route('api.book_recommendations.store') }}";
        let primaryId = $('#txt-book_recommendation-primary-id').val();
        console.log($('#txt-book_recommendation-primary-id').val());
        
        let formData = new FormData();
        formData.append('_token', $('input[name="_token"]').val());
        

        if (primaryId != "0"){
            actionType = "PUT";
            endPointUrl = "{{ route('api.book_recommendations.update','') }}/"+primaryId;
            formData.append('id', primaryId);
        }
        
        formData.append('_method', actionType);
       
        // formData.append('', $('#').val());
        if ($('#title').length){	formData.append('title',$('#title').val());	}
		if ($('#author').length){	formData.append('author',$('#author').val());	}
		if ($('#description').length){	formData.append('description',$('#description').val());	}
            if ($('#cover_image').length){	formData.append('cover_image',$('#cover_image')[0].files[0]);	}
            if ($('#cover_image_path').length){	formData.append('cover_image_path',$('#cover_image_path')[0].files[0]);	}
        
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
					$('#div-book_recommendation-modal-error').html('');
					$('#div-book_recommendation-modal-error').show();
                    
                    $.each(result.errors, function(key, value){
                        $('#div-book_recommendation-modal-error').append('<li class="">'+value+'</li>');
                    });
                }else{
                    $('#div-book_recommendation-modal-error').hide();
                    // window.setTimeout( function(){

                        $('#div-book_recommendation-modal-error').hide();

                        swal({
                                title: "Saved",
                                text: "book_recommendation saved successfully",
                                type: "success"
                            },function(){
                                location.reload(true);
                        });

                    // },20);
                }

                $("#spinner-book_recommendations").hide();
                $("#div-save-mdl-book_recommendation-modal").attr('disabled', false);
                
            }, error: function(data){
                console.log(data);
                swal("Error", "Oops an error occurred. Please try again.", "error");

                $("#spinner-book_recommendations").hide();
                $("#div-save-mdl-book_recommendation-modal").attr('disabled', false);

            }
        });
    });


    //Delete action
    $(document).on('click', ".btn-delete-mdl-book_recommendation", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline-book_recommendation').fadeIn(300);
            return;
        }else{
            $('.offline-book_recommendation').fadeOut(300);
        }

        let itemId = $(this).attr('data-val');
        swal({
                title: "Are you sure you want to delete this book_recommendation?",
                text: "You will not be able to recover this book_recommendation if deleted.",
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
                        title: '<div id="spinner-book_recommendation" class="spinner-border text-primary" role="status"> <span class="visually-hidden">  Processing...  </span> </div> <br><br> Please wait...',
                        text: 'Deleting book_recommendation.',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        html: true
                    }) 
                                        
                    let endPointUrl = "{{ route('api.book_recommendations.destroy','') }}/"+itemId;

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
                                        text: "book_recommendation deleted successfully",
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
