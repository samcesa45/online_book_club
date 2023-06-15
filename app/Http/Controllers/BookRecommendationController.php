<?php

namespace App\Http\Controllers;

use App\Models\BookRecommendation;
use App\Models\Book;
use App\Http\Requests\StoreBookRecommendationRequest;
use App\Http\Requests\UpdateBookRecommendationRequest;
use App\Events\BookRecommendationCreated;
use App\Events\BookRecommendationUpdated;
use App\Events\BookRecommendationDeleted;
use App\Http\Controllers\AppBaseController;
class BookRecommendationController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_user = auth()->user();
        $bookRecommendations = BookRecommendation::with('Book')->get();
        //  dd( $bookRecommendations);
        return view('book_recommendations.index')
        ->with('book_recommendations',$bookRecommendations)
        ->with('current_user',$current_user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book_recommendations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRecommendationRequest $request)
    {
        $input = $request->all();
        $bookRecommendation = BookRecommendation::create($input);
        
        BookRecommendationCreated::dispatch($input);
        return redirect(route('book_recommendations.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRecommendation $bookRecommendation)
    {
        $current_user = auth()->user();
        $bookRecommendation = BookRecommendation::find($id);
        if(empty($bookRecommendation)){
            return redirect(route('book_recommendations.index'));
        }

        return view('book_recommendations.show')
        ->with('current_user',$current_user)
        ->with('bookRecommendation',$bookRecommendation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $current_user =auth()->user();
        $bookRecommendation = BookRecommendation::find($id);
        if(empty($bookRecommendation)) {
            return redirect(route('book_recommendations.index'));
        }

        return view('book_recommendations.edit')
        ->with('current_user',$current_user)
        ->with('bookRecommendation',$bookRecommendation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRecommendationRequest $request,$id)
    {
        $bookRecommendation = BookRecommendation::find($id);

        if(empty($bookRecommendation)) {
            return redirect(route('book_recommendations.index'));
        }

        $bookRecommendation->fill($request->all());
        $bookRecommendation->save();

        BookRecommendationUpdated::dispatch($bookRecommendation);
        return redirect(route('book_recommendations.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bookRecommendation = BookRecommendation::find($id);

        if(empty($bookRecommendation)) {
            return redirect(route('book_recommendations.index'));
        }

        $bookRecommendation->delete();
        BookRecommendationDeleted::dispatch($bookRecommendation);
        return redirect(route('bookRecommendation.index'));
    }
}
