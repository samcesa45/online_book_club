<?php

namespace App\Http\Controllers;

use App\Models\BookReview;
use App\Models\Book;
use App\Http\Requests\StoreBookReviewRequest;
use App\Http\Requests\UpdateBookReviewRequest;
use App\Events\BookReviewCreated;
use App\Events\BookReviewUpdated;
use App\Events\BookReviewDeleted;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
class BookReviewController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_user = auth()->user();
        $book_reviews = BookReview::all();
       
    
       
        return view('book_reviews.index')
        ->with('current_user',$current_user)
        ->with('book_reviews',$book_reviews);
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return views('book_reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookReviewRequest $request)
    {
         $input = $request->all();

         $book_review = BookReview::create($input);
         BookReviewCreated::dispatch($book_review);
         return redirect(route('book_reviews.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        dd(Book::with('BookReview'));
        $curent_user = auth()->user();
        $book_review = BookReview::find($id);
        if(empty($book_review)){
            return redirect(route('book_reviews.index'));
        }

        return view('book_reviews.show')
        ->with('current_user',$current_user)
        ->with('book_review',$book_review);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cuurent_user = auth()->user();
        $book_review = BookReview::find($id);
        if(empty($book_review)){
            return redirect(route('book_reviews.index'));
        }

        return view('book_reviews.edit')
        ->with('current_user',$current_user)
        ->with('book_review',$book_review);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookReviewRequest $request, BookReview $bookReview)
    {
        $input = $request->all();
        $book_review = BookReview::find($id);
        if(empty($book_review)){
            return redirect(route('book_reviews.index'));
        }

        $book_review->fill($input);
        $book_review->save();

        BookReviewUpdated::dispatch($book_review);
        return redirect(route('book_reviews.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $book_review = BookReview::find($id);
       if(empty($book_review)) {
        return redirect(route('book_reviews.index'));
       }

       BookReviewDeleted::dispatch($book_review);
       return redirect(route('book_reviews.index'));
    }
}
