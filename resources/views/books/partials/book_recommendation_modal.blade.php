


<script type="text/javascript">
  $(document).ready(function() {

     //Save details
 $('.btn-new-mdl-book_recommendation-modal').change(function(e) {
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
                title: "Are you sure you want to recommend this book?",
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
                        text: 'recommending book.',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        html: true
                    }) 
                                        
                    let endPointUrl = "{{ route('api.book_recommendations.store') }}";
                    let formData = new FormData();
                    formData.append('_token', $('input[name="_token"]').val());
                    formData.append('_method', 'Post');
                    formData.append('user_id','{{auth()->user()->id}}');
                    formData.append('book_id',itemId);

                    
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
                                        title: "Recommended",
                                        text: "book recommended successfully",
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