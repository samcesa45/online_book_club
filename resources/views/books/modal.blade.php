

<div class="modal fade" id="mdl-book-modal" tabindex="-1" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">

          <div class="modal-header">
              <h5 id="lbl-book-modal-title" class="modal-title">Book</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

              <div id="div-book-modal-error" class="alert alert-danger" role="alert"></div>
              <form class="form-horizontal" id="frm-book-modal" role="form" method="POST" enctype="multipart/form-data" action="">
                      <div class="col-lg-12 pe-2">
                          
                          @csrf
                          
                          {{-- <div class="offline-flag"><span class="offline-books">You are currently offline</span></div> --}}

                          <div id="spinner-books" class="spinner-border text-primary" role="status"> 
                              <span class="visually-hidden">Loading...</span>
                          </div>

                          <input type="hidden" id="txt-book-primary-id" value="0" />
                          <div id="div-show-txt-book-primary-id">
                              <div class="row">
                                  <div class="col-lg-12">
                                  @include('books.show_fields')
                                  </div>
                              </div>
                          </div>
                          <div id="div-edit-txt-book-primary-id">
                              <div class="row">
                                  <div class="col-lg-12">
                                  @include('books.fields')
                                  </div>
                              </div>
                          </div>

                      </div>
                  
              </form>
              <div class="modal-footer" id="div-save-mdl-book-modal">
                  <button type="button" class="btn btn-primary" id="btn-save-mdl-book-modal" value="add">Save</button>
              </div>
          </div>

      

      </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    //Show Modal for New Entry
    $(document).on('click', ".btn-new-mdl-book-modal", function(e) {
        $('#div-book-modal-error').hide();
        $('#mdl-book-modal').modal('show');
        $('#frm-book-modal').trigger("reset");
        $('#txt-book-primary-id').val(0);

        $('#div-show-txt-book-primary-id').hide();
        $('#div-edit-txt-book-primary-id').show();

        $("#spinner-books").hide();
        $("#div-save-mdl-book-modal").attr('disabled', false);
    });

     //Show Modal for View
     $(document).on('click', ".btn-show-mdl-book-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        // if (!window.navigator.onLine) {
        //     $('.offline-book').fadeIn(300);
        //     return;
        // }else{
        //     $('.offline-book').fadeOut(300);
        // }

        $('#div-book-modal-error').hide();
        $('#mdl-book-modal').modal('show');
        $('#frm-book-modal').trigger("reset");

        $("#spinner-book").show();
        $("#div-save-mdl-book-modal").attr('disabled', true);

        $('#div-show-txt-book-primary-id').show();
        $('#div-edit-txt-book-primary-id').hide();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('api.books.show','') }}/"+itemId).done(function( response ) {
			
			$('#txt-book-primary-id').val(response.data.id);
		$('#spn_book_title').html(response.data.title);
		$('#spn_book_description').html(response.data.description);
		$('#spn_book_author').html(response.data.author);
		$('#spn_book_cover_image').html(response.data.cover_image);
		$('#spn_book_cover_image_path').html(response.data.cover_image_path);
	


            $("#spinner-book").hide();
            $("#div-save-mdl-book-modal").attr('disabled', false);
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
     $(document).on('click', ".btn-edit-mdl-book", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        $('#div-book-modal-error').hide();
        $('#mdl-book-modal').modal('show');
        $('#frm-book-modal').trigger("reset");

        $("#spinner-book").show();
        $("#div-save-mdl-book-modal").attr('disabled', true);

        $('#div-show-txt-book-primary-id').hide();
        $('#div-edit-txt-book-primary-id').show();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('api.books.show','') }}/"+itemId).done(function( response ) {     

			$('#txt-book-primary-id').val(response.data.id);
      $('#title').val(response.data.title);
      $('#description').val(response.data.description);
      $('#author').val(response.data.author);
     $('#cover_image_path_preview').attr('src', response.data.cover_image);
		


            $("#spinner-book").hide();
            $("#div-save-mdl-book-modal").attr('disabled', false);
        });
    });
 //Save details
 $('#btn-save-mdl-book-modal').click(function(e) {
    console.log('hello');
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});


        //check for internet status 
        // if (!window.navigator.onLine) {
        //     $('.offline-books').fadeIn(300);
        //     return;
        // }else{
        //     $('.offline-books').fadeOut(300);
        // }

        $("#spinner-books").show();
        $("#div-save-mdl-book-modal").attr('disabled', true);

        let actionType = "POST";
        let endPointUrl = "{{ route('api.books.store') }}";
        let primaryId = $('#txt-book-primary-id').val();
        console.log($('#txt-book-primary-id').val());
        
        let formData = new FormData();
        formData.append('_token', $('input[name="_token"]').val());
        

        if (primaryId != "0"){
            actionType = "PUT";
            endPointUrl = "{{ route('api.books.update','') }}/"+primaryId;
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
					$('#div-book-modal-error').html('');
					$('#div-book-modal-error').show();
                    
                    $.each(result.errors, function(key, value){
                        $('#div-book-modal-error').append('<li class="">'+value+'</li>');
                    });
                }else{
                    $('#div-book-modal-error').hide();
                    // window.setTimeout( function(){

                        $('#div-book-modal-error').hide();

                        swal({
                                title: "Saved",
                                text: "book saved successfully",
                                type: "success"
                            },function(){
                                location.reload(true);
                        });

                    // },20);
                }

                $("#spinner-books").hide();
                $("#div-save-mdl-book-modal").attr('disabled', false);
                
            }, error: function(data){
                console.log(data);
                swal("Error", "Oops an error occurred. Please try again.", "error");

                $("#spinner-books").hide();
                $("#div-save-mdl-book-modal").attr('disabled', false);

            }
        });
    });


    //Delete action
    $(document).on('click', ".btn-delete-mdl-book", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        // if (!window.navigator.onLine) {
        //     $('.offline-book').fadeIn(300);
        //     return;
        // }else{
        //     $('.offline-book').fadeOut(300);
        // }

        let itemId = $(this).attr('data-val');
        swal({
                title: "Are you sure you want to delete this book?",
                text: "You will not be able to recover this book if deleted.",
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
                        title: '<div id="spinner-book" class="spinner-border text-primary" role="status"> <span class="visually-hidden">  Processing...  </span> </div> <br><br> Please wait...',
                        text: 'Deleting book.',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        html: true
                    }) 
                                        
                    let endPointUrl = "{{ route('api.books.destroy','') }}/"+itemId;

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
                                        text: "book deleted successfully",
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
