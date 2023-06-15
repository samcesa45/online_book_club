<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Events\ProfileCreated;
use App\Events\ProfileUpdated;
use App\Events\ProfileDeleted;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class ProfileController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_user = auth()->user();
        $profiles = User::all();
        return view('profiles.index')
        ->with('current_user',$current_user)
        ->with('profiles',$profiles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $input = $request->all();
        if(empty($input)){
            return redirect(route('profiles.index'));
        }
        if($request->hasFile('profile_picture_path')){
              $file = $request->file('profile_picture_path');
              $fileName = $file->hashName();
              $extension = $file->extension();
              $input['profile_picture_path'] = $file->store('uploads/','public');
        }

        $profile = User::create($input);
        ProfileCreated::dispatch($input);
        return redirect(route('profiles.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $current_user = auth()->user();
        $profile = User::find($id);
        if(empty($profile)) {
            return redirect(route('profiles.index'));
        }

        return view('profiles.show')
        ->with('current_user',$current_user)
        ->with('profile',$profile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $current_user = auth()->user();
        $profile = User::find($id);
        if(empty($profile)) {
            return redirect(route('profiles.index'));
        }

        return view('profiles.edit')
        ->with('current_user', $current_user)
        ->with('profile',$profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request,  $id)
    {
        $profile = User::find($id);
        $input = $request->all();
        if(empty($profile)) {
            $this->sendError('Profile not found');
        }

        if($request->hasFile('profile_picture_path')) {
            $file = $request->file('profile_picture_path');
            $fileName = $request->hashName();
            $extension = $request->extension();
            $input['profile_picture_path'] = $file->store('uploads/','public');

        }

        $profile->fill($input);
        $profile->save();

        return $this->sendResponse($profile->toArray(),'Profile Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profile = User::find($id);
        if(empty($profile)) {
            return redirect(route('profiles.index'));
        }

       $profile->delete();
       ProfileDeleted::dispatch($profile);
       return $this->sendSuccess('Profile deleted successfully');


    }
}
