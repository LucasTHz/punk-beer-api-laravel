<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\User\UserDTO;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        private UserService $service
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ds('ola mundo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->service->store($request->all());

        return UserResource::make($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        ds($user);
        return response([
            'message' => 'User found',
            'data' => UserResource::make($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function login(Request $request)
    {
        ds('ola mundo');
    }
}
