<?php

namespace App\Http\Controllers\API;
use App\Models\Book;
use App\Models\BookRecommendation;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;
use App\Events\BookCreated;
use App\Events\BookUpdated;
use App\Events\BookDeleted;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\API\CreateBookAPIRequest;
use App\Http\Requests\API\UpdateBookAPIRequest;
use App\Http\Requests\StoreBookRecommendationRequest;
use Illuminate\Support\Collection;
class BookAPIController extends AppBaseController
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $query = Book::query();

       if($request->get('skip')) {
        $query->skip($request->get('skip'));
       }

       if($request->get('limit')){
        $query->limit($request->get('limit'));
       }

       $books = $this->showAll($query->get());

       return $this->sendResponse($books->toArray(), 'Books retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookAPIRequest $request)
    {
        
        $input = $request->all();
       
       
        if ($request->hasFile('cover_image') && $request->hasFile('cover_image_path')) {
            $file = $request->file('cover_image');
            $file1 = $request->file('cover_image_path');
            $fileName = $file->hashName();
            $fileName1 = $file1->hashName();
            $extension = $file->extension();
            $extension1 = $file1->extension();
            $input['cover_image'] = $file->store('uploads/', 'public');
            $input['cover_image_path'] = $file1->store('uploads/', 'public');
    
        }
    
        $book = Book::create($input);
        BookCreated::dispatch($book);
        return $this->sendResponse($book->toArray(),'Book saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        if(empty($book)) {
            return $this->sendError('Book not found');
        }

        return $this->sendResponse($book->toArray(), 'Book retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookAPIRequest $request,$id)
    {
        $book = Book::find($id);
        $input = $request->all();

        if(empty($book)) {
            return $this->sendError('Book not found');
        }
        
        if ($request->hasFile('cover_image') && $request->hasFile('cover_image_path')) {
            $file = $request->file('cover_image');
            $file1 = $request->file('cover_image_path');
            $fileName = $file->hashName();
            $fileName1 = $file1->hashName();
            $extension = $file->extension();
            $extension1 = $file1->extension();
            $input['cover_image'] = $file->store('uploads/', 'public');
            $input['cover_image_path'] = $file1->store('uploads/', 'public');
    
        }
         $book->fill($input);
         $book->save();
         return $this->sendResponse($book->toArray(), 'Book Updated successfully');
       
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if(empty($book)){
            return $this->sendError('Book not found');
        }

        $book->delete();
        BookDeleted::dispatch($book);
        return $this->sendSuccess('Book deleted successfully');
    }


    protected function search(Collection $collection) {
        foreach(request()->query as $query => $value) {
          if(isset($query,$value) && !in_array($query,['skip','limit','sort_by','sort_order','per_page'])) {
            $collection=$collection->where($query,$value);
          }
        }
        return $collection;
      }
}
