<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

final class UserController extends Controller
{
    public function __construct(
        private readonly UserService $service
    ) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): ResponseFactory|Response
    {
        $user = $this->service->store($request->validated());

        event(new Registered($user));

        return response([
            'message' => 'Link de verificaçao enviado para o email!',
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(): Response
    {
        $user = Auth::user();

        return response([
            'message' => 'Usuario consultado com sucesso!',
            'data'    => UserResource::make($user),
        ], 200);
    }

    /**
     *  Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request): Response
    {
        $user = $request->user();

        $this->service->update($request->validated(), $user);

        return response([
            'message' => 'Usuario atualizado com sucesso!',
            'data'    => [],
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
