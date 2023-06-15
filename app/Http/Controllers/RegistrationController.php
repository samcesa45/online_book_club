<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\User;
use App\Events\UserLoginEvent;
use App\Events\UserPasswordResetEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\LoginAPIRequest;
use App\Http\Requests\API\RegisterAPIRequest;
use App\Http\Requests\API\PasswordResetAPIRequest;;

class RegistrationController extends Controller
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
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterAPIRequest $request)
    {
       
        $request->validated($request->all());

        $user = User::create([
          'username' => $request->username,
          'email' => $request->email,
          'password' => Hash::make($request->password),
        ]);

             
        return redirect()->intended('dashboard')->withSuccess('Registration successful');
        
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
