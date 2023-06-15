<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\BookReview;
use App\Models\BookRecommendation;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index()
    {
       
        $books = Book::all();
        $book_reviews = BookReview::with('Book')->get();
     
        $current_user = auth()->user();
        $bookRecommendations = BookRecommendation::with('Book')->get()->take(4);
        // dd($bookRecommendations);
 
        return view ('dashboard.index')
        ->with('current_user', $current_user)
        ->with('book_recommendations',$bookRecommendations)
        ->with('book_reviews',$book_reviews)
        ->with('books',$books);
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}

    public function join() {
        return view('dashboard.join');
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
