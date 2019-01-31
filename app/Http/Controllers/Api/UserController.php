<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class UserController extends ApiController
{
    
    public function __construct () {
    
        $this->middleware('ajax');
    
    }
    
    public function index() {
        
        return [
            
            'data' => UserResource::collection(User::latest('updated_at')->get())
            
        ];
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        User::create(
            
            $request->except('avatar') +
            ['avatar' => (new User)->uploadImage($request->avatar)]
        
        );
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $user->update([
    
            'name' => $request->input('name') ?? $user->name,
            'email' => $request->input('email') ?? $user->email,
            'role_id' => $request->input('role_id') ?? $user->role_id,
            'password' => bcrypt($request->input('password')) ?? $user->password,
            'avatar' => $request->filled('avatar') ?
                $user->uploadImage($request->avatar, $user->avatar) :
                $user->avatar,

        ]);
        
        return $this->showOne($user);
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return $this->showOne($user);
    }
    
}
