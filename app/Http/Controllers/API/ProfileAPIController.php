<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;
use App\Events\ProfileCreated;
use App\Events\ProfileUpdated;
use App\Events\ProfileDeleted;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\API\CreateProfileAPIRequest;
use App\Http\Requests\API\UpdateProfileAPIRequest;
use Illuminate\Support\Collection;
class ProfileAPIController extends AppBaseController
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $query = User::query();

       if($request->get('skip')) {
        $query->skip($request->get('skip'));
       }

       if($request->get('limit')) {
        $query->limit($request->get('limit'));
       }

       $profiles = $this->showAll($query->get());
       return $this->sendResponse($profiles->toArray(), 'Profiles retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProfileAPIRequest $request)
    {
        $input = $request->all();

        if($request->hasFile('profile_picture_path')){
            $file = $request->file('profile_picture_path');
            $fileName = $file->hashName();
            $extension = $file->extension();
            $input['profile_picture_path'] = $file->store('uploads/', 'public');
        }
        
        $profile = User::create($input);
        ProfileCreated::dispatch($profile);
        return $this->sendResponse($profile->toArray(), 'Profile saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile = User::find($id);
        if(empty($profile)){
            return $this->sendError('Profile not found');
        }

        return $this->sendResponse($profile->toArray(), 'Profile retrieved successfully');
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
    public function update(UpdateProfileAPIRequest $request,$id)
    {
        $input = $request->all();
        $profile = User::find($id);

        if(empty($profile)) {
            return $this->sendError('Profile not found');
        }

        if($request->hasFile('profile_picture_path')) {
            $file = $request->file('profile_picture_path');
            $fileName = $file->hashName();
            $extension = $file->extension();
            $input['profile_picture_path'] = $file->store('uploads/', 'public');

        }

        $profile->fill($input);
        $profile->save();
        ProfileUpdated::dispatch($profile);
        return $this->sendResponse($profile->toArray(), 'Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $profile = User::find($id);
       
       if(empty($profile)) {
        return $this->sendError('Profile not found');
       }

       $profile->delete();
       ProfileDeleted::dispatch($profile);
       return $this->sendSuccess('Profile deleted successfully');
    }
}
