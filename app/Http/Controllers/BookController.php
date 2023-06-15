<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use App\Models\BookRecommendation;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Events\BookCreated;
use App\Events\BookUpdated;
use App\Events\BookDeleted;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BookController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $current_user = auth()->user();
        $books = Book::all();
        $recommended_books = BookRecommendation::where('user_id', auth()->id())->pluck('book_id');
        return view('books.index')
        ->with('books',$books)
        ->with('recommended_books',$recommended_books)
        ->with('current_user',$current_user);
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('cover_image_path') && $request->hasFile('cover_image_path')) {
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
        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $current_user = auth()->user();
        $book = Book::find($id);
        $book_reviews = BookReview::all();
        if(empty($book)){
            return redirect(route('books.index'));
        }

        return view('books.show')
        ->with('current_user',$current_user)
        ->with('book',$book)
        ->with('book_reviews',$book_reviews);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $current_user =auth()->user();
        $book = Book::find($id);
        if(empty($book)) {
            return redirect(route('books.index'));
        }

        return view('books.edit')
        ->with('current_user',$current_user)
        ->with('book',$book);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, $id)
    {
        
        $book = Book::find($id);

        if(empty($book)) {
            return redirect(route('books.index'));
        }

        if($request->hasFile('cover_image_path')) {
            if($request->image_path != null) {
                $newImagePath = time() . $request->name . '.' . $request->cover_image_path->extension();
                $request->cover_image_path->move(public_path('images'), $newImagePath);
                $cover_image_path = public_path('images/' . $request->cover_image_path);
            }
        }
        $book->fill($request->all());
        $book->save();

        BookUpdated::dispatch($book);
        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if(empty($book)) {
            return redirect(route('books.index'));
        }

        $book->delete();
        BookDeleted::dispatch($book);
        return redirect(route('books.index'));
    }
}
