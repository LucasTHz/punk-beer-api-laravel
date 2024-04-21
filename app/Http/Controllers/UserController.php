<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        private UserService $service
    ) {
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
    public function show(User $user): Response
    {
        return response([
            'message' => 'Usuario consultado com sucesso!',
            'data'    => UserResource::make($user),
        ], 200);
    }

    /**
     *  Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): Response
    {
        $this->service->update($request->all(), $user);

        return response([
            'message' => 'Usuario atualizado com sucesso!',
            'data'    => UserResource::make($user),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response([
            'message' => 'Usuario deletado com sucesso!',
        ], 200);
    }
}
