<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    
    public function index() {
    
        return response()->json([
            
            'data' => User::all()
            
        ]);
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->all());
        
        return response()->json(['success' => 'El Usuario ha sido creado exitosamente!'], 201);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            
            'name' => $request->input('name') ?? $user->name,
            'email' => $request->input('email') ?? $user->email,
            'role' => $request->input('role') ?? $user->role,
            'avatar' => $request->input('avatar') ?? $user->avatar,
            
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
    
}
