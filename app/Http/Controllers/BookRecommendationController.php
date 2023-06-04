<?php

namespace App\Http\Controllers;

use App\Models\BookRecommendation;
use App\Http\Requests\StoreBookRecommendationRequest;
use App\Http\Requests\UpdateBookRecommendationRequest;

class BookRecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreBookRecommendationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRecommendation $bookRecommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookRecommendation $bookRecommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRecommendationRequest $request, BookRecommendation $bookRecommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookRecommendation $bookRecommendation)
    {
        //
    }
}
