

<div class="modal fade" id="mdl-book_review-modal" tabindex="-1" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">

          <div class="modal-header">
              <h5 id="lbl-book_review-modal-title" class="modal-title">Book Review</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

              <div id="div-book_review-modal-error" class="alert alert-danger" role="alert"></div>
              <form class="form-horizontal" id="frm-book_review-modal" role="form" method="POST" enctype="multipart/form-data" action="">
                      <div class="col-lg-12 pe-2">
                          
                          @csrf
                          
                          {{-- <div class="offline-flag"><span class="offline-book_reviews">You are currently offline</span></div> --}}

                          <div id="spinner-book_reviews" class="spinner-border text-primary" role="status"> 
                              <span class="visually-hidden">Loading...</span>
                          </div>

                          <input type="hidden" id="txt-book_review-primary-id" value="0" />
                          <div id="div-show-txt-book_review-primary-id">
                              <div class="row">
                                  <div class="col-lg-12">
                                  @include('book_reviews.show_fields')
                                  </div>
                              </div>
                          </div>
                          <div id="div-edit-txt-book_review-primary-id">
                              <div class="row">
                                  <div class="col-lg-12">
                                  @include('books.partials.fields')
                                  </div>
                              </div>
                          </div>

                      </div>
                  
              </form>
              <div class="modal-footer" id="div-save-mdl-book_review-modal">
                  <button type="button" class="btn btn-primary btn-save-mdl-book_review-modal" id="btn-save-mdl-book_review-modal" value="add">Save</button>
              </div>
          </div>

      

      </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    //Show Modal for New Entry
    $(document).on('click', ".btn-new-mdl-book_review-modal", function(e) {
        $('#div-book_review-modal-error').hide();
        $('#mdl-book_review-modal').modal('show');
        $('#frm-book_review-modal').trigger("reset");
        $('#txt-book_review-primary-id').val(0);

        $('#div-show-txt-book_review-primary-id').hide();
        $('#div-edit-txt-book_review-primary-id').show();

        $("#spinner-book_reviews").hide();
        $("#div-save-mdl-book_review-modal").attr('disabled', false);
    });

     //Show Modal for View
     $(document).on('click', ".btn-show-mdl-book_review-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        // if (!window.navigator.onLine) {
        //     $('.offline-book_review').fadeIn(300);
        //     return;
        // }else{
        //     $('.offline-book_review').fadeOut(300);
        // }

        $('#div-book_review-modal-error').hide();
        $('#mdl-book_review-modal').modal('show');
        $('#frm-book_review-modal').trigger("reset");

        $("#spinner-book_review").show();
        $("#div-save-mdl-book_review-modal").attr('disabled', true);

        $('#div-show-txt-book_review-primary-id').show();
        $('#div-edit-txt-book_review-primary-id').hide();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('api.book_reviews.show','') }}/"+itemId).done(function( response ) {
			
			$('#txt-book_review-primary-id').val(response.data.id);
		$('#spn_book_review_title').html(response.data.title);
		$('#spn_book_review_description').html(response.data.description);
		$('#spn_book_review_author').html(response.data.author);
		$('#spn_book_review_cover_image').html(response.data.cover_image);
		$('#spn_book_review_cover_image_path').html(response.data.cover_image_path);
	


            $("#spinner-book_review").hide();
            $("#div-save-mdl-book_review-modal").attr('disabled', false);
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
     $(document).on('click', ".btn-edit-mdl-book_review", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        $('#div-book_review-modal-error').hide();
        $('#mdl-book_review-modal').modal('show');
        $('#frm-book_review-modal').trigger("reset");

        $("#spinner-book_review").show();
        $("#div-save-mdl-book_review-modal").attr('disabled', true);

        $('#div-show-txt-book_review-primary-id').hide();
        $('#div-edit-txt-book_review-primary-id').show();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('api.book_reviews.show','') }}/"+itemId).done(function( response ) {     

			$('#txt-book_review-primary-id').val(response.data.id);
      $('#title').val(response.data.title);
      $('#description').val(response.data.description);
      $('#author').val(response.data.author);
     $('#cover_image_path_preview').attr('src', response.data.cover_image);
		


            $("#spinner-book_review").hide();
            $("#div-save-mdl-book_review-modal").attr('disabled', false);
        });
    });
 //Save details
 $('.btn-save-mdl-book_review-modal').click(function(e) {
   
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});


        //check for internet status 
        // if (!window.navigator.onLine) {
        //     $('.offline-book_reviews').fadeIn(300);
        //     return;
        // }else{
        //     $('.offline-book_reviews').fadeOut(300);
        // }

        $("#spinner-book_reviews").show();
        $("#div-save-mdl-book_review-modal").attr('disabled', true);

        let actionType = "POST";
        let endPointUrl = "{{ route('api.book_reviews.store') }}";
        let primaryId = $('#txt-book_review-primary-id').val();
       
        
        let formData = new FormData();
        formData.append('_token', $('input[name="_token"]').val());
        

        if (primaryId != "0"){
            actionType = "PUT";
            endPointUrl = "{{ route('api.book_reviews.update','') }}/"+primaryId;
            formData.append('id', primaryId);
        }
        
        formData.append('_method', actionType);
       
   
        if ($('#review_text').length){	formData.append('review_text',$('#review_text').val());	}
       	formData.append('user_id','{{auth()->user()->id}}');
        formData.append('book_id',  '{{$book->id}}');

       
	
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
					$('#div-book_review-modal-error').html('');
					$('#div-book_review-modal-error').show();
                    
                    $.each(result.errors, function(key, value){
                        $('#div-book_review-modal-error').append('<li class="">'+value+'</li>');
                    });
                }else{
                    $('#div-book_review-modal-error').hide();
                    // window.setTimeout( function(){

                        $('#div-book_review-modal-error').hide();

                        swal({
                                title: "Saved",
                                text: "book_review saved successfully",
                                type: "success"
                            },function(){
                                location.reload(true);
                        });

                    // },20);
                }

                $("#spinner-book_reviews").hide();
                $("#div-save-mdl-book_review-modal").attr('disabled', false);
                
            }, error: function(data){
                console.log(data);
                swal("Error", "Oops an error occurred. Please try again.", "error");

                $("#spinner-book_reviews").hide();
                $("#div-save-mdl-book_review-modal").attr('disabled', false);

            }
        });
    });


    //Delete action
    $(document).on('click', ".btn-delete-mdl-book_review", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        // if (!window.navigator.onLine) {
        //     $('.offline-book_review').fadeIn(300);
        //     return;
        // }else{
        //     $('.offline-book_review').fadeOut(300);
        // }

        let itemId = $(this).attr('data-val');
        swal({
                title: "Are you sure you want to delete this book_review?",
                text: "You will not be able to recover this book_review if deleted.",
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
                        title: '<div id="spinner-book_review" class="spinner-border text-primary" role="status"> <span class="visually-hidden">  Processing...  </span> </div> <br><br> Please wait...',
                        text: 'Deleting book_review.',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        html: true
                    }) 
                                        
                    let endPointUrl = "{{ route('api.book_reviews.destroy','') }}/"+itemId;

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
                                        text: "book_review deleted successfully",
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
