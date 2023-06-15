<?php

namespace App\Http\Controllers\API;
use App\Models\BookReview;
use App\Events\BookReviewCreated;
use App\Events\BookReviewUpdated;
use App\Events\BookReviewDeleted;
use App\Http\Requests\API\CreateBookReviewAPIRequest;
use App\Http\Requests\API\UpdateBookReviewAPIRequest;
use Illuminate\Support\Collection;
use App\Http\Controllers\AppBaseController;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class BookReviewAPIController extends AppBaseController
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BookReview::query();

        if($requet->get('skip')) {
            $query->skip($request->get('skip'));
        }

        if($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $book_reviews = $this->showAll($query->get());

        return $this->sendResponse($book_reviews->toArray(),'BookReviews retrieved successfully ');
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
    public function store(CreateBookReviewAPIRequest $request)
    {
        $input = $request->all();

        $book_review = BookReview::create($input);
        BookReviewCreated::dispatch($book_review);
        return $this->sendResponse($book_review->toArray(),'BookReviews saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book_review = BookReview::find($id);

        if(empty($book_review)){
            return $this->sendError('BookReview not found');
        }

        return $this->sendResponse($book->toArray(), 'BookReview retrieved successfully');
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
    public function update(UpdateBookReviewAPIRequest $request, $id)
    {
        $input = $request->all();
        $book_review = BookReview::find($id);

        if(empty($book_review)) {
            return $this->sendResponse('BookReview not found');
        }

        $book_review->fill($input);
        $book_review->save();
        BookReviewUpdated::dispatch($book_review);

        return $this->sendResponse($book_review->toArray(), 'Book Review Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book_review = BookReview::find($id);
        if(empty($book_review)){
            return $this->sendError('BookReview not found');
        }

        $book_review->delete();
        BookReviewDeleted::dispatch($book_review);

        return $this->sendSuccess('BookReview deleted successfully');
    }
}
