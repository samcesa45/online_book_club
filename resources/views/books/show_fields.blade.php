<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<div class="card p-4" style="border:0 !important;">
<div class="row row-cols-1 row-cols-md-2">
      <div class="col-md-5">
        <div class="mb-3">
          {{-- <label for="cover_image_path" class="form-label">Upload Book Image</label> --}}
          <span id="spn_book_cover_image_path">
            @if (isset($book->cover_image) && empty($book->cover_image)==false)
             <img src="{!! $book->cover_image !!}" alt=""> 
          @else
              N/A
          @endif
          </span>
        </div>
      </div>
      <div class="col-md-7">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <span id="spn_book_title">
            @if (isset($book->title) && empty($book->title)==false)
              {!! $book->title !!}
          @else
              N/A
          @endif
          </span>
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <span id="spn_book_author">
            @if (isset($book->author) && empty($book->author)==false)
              {!! $book->author !!}
          @else
              N/A
          @endif
          </span>
        </div>
        <div class="mb-3">
          <label for="Description" class="form-label">Description</label>
          <span id="spn_book_description">
            @if (isset($book->description) && empty($book->description)==false)
              {!! $book->description !!}
          @else
              N/A
          @endif
          </span>
        </div>    
        <div class="d-flex justify-content-start mt-3">
          <i class="fas fa-star" style="color: #FECB1C;"></i>
          <i class="fas fa-star" style="color: #FECB1C;"></i>
          <i class="fas fa-star" style="color: #FECB1C;"></i>
          <i class="fas fa-star" style="color: #FECB1C;"></i>
          <i class="fas fa-star" style="color: #FECB1C;"></i>
        </div>
        <div>
          <a data-val="" class="btn-new-mdl-book_review-modal text-decoration-none" style="color:#FECB1C;cursor:pointer;">review this book</a>
        </div>
     </div>
      </div>
    
    </div>
  </div>


