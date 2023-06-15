<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;
use App\Events\BookRecommendationCreated;
use App\Events\BookRecommendationUpdated;
use App\Events\BookRecommendationDeleted;
use Illuminate\Support\Facades\File;
use App\Http\Requests\API\CreateBookRecommendationAPIRequest;
use App\Http\Requests\API\UpdateBookRecommendationAPIRequest;
use App\Models\BookRecommendation;

class BookRecommendationAPIController extends AppBaseController
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = BookRecommendation::query();

       if($request->get('skip')) {
        $query->skip($request->get('skip'));
       }

       if($request->get('limit')){
        $query->limit($request->get('limit'));
       }

       $bookRecommendations = $this->showAll($query->get());
       

       return $this->sendResponse($bookRecommendations->toArray(), 'BookRecommendations retrieved successfully');
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
    public function store(CreateBookRecommendationAPIRequest $request)
    {
        $input = $request->all();
        $bookRecommendation = BookRecommendation::create($input);

        BookRecommendationCreated::dispatch($bookRecommendation);
        return $this->sendResponse($bookRecommendation->toArray(),'BookRecommendation saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bookRecommendation = BookRecommendation::find($id);
        if(empty($bookRecommendation)) {
            return $this->sendError('BookRecommendation not found');
        }

        return $this->sendResponse($bookRecommendation->toArray(), 'BookRecommendation retrieved successfully');
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
    public function update(UpdateBookRecommendationAPIRequest $request, $id)
    {
        $bookRecommendation = BookRecommendation::find($id);

        if(empty($bookRecommendation)) {
            return $this->sendError('BookRecommendation not found');
        }

        $bookRecommendation->fill($request->all());
        $bookRecommendation->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bookRecommendation = BookRecommendation::find($id);

        if(empty($bookRecommendation)){
            return $this->sendError('BookRecommendation not found');
        }

        $bookRecommendation->delete();
        BookRecommendationDeleted::dispatch($bookRecommendation);
        return $this->sendSuccess('BookRecommendation deleted successfully');
    }
}
