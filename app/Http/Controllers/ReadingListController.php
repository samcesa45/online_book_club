<?php

namespace App\Http\Controllers;

use App\Models\ReadingList;
use App\Http\Requests\StoreReadingListRequest;
use App\Http\Requests\UpdateReadingListRequest;

class ReadingListController extends Controller
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
    public function store(StoreReadingListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReadingList $readingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReadingList $readingList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReadingListRequest $request, ReadingList $readingList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReadingList $readingList)
    {
        //
    }
}
