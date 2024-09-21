<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Services\Favorite\FavoriteService;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{
    public function __construct(
        private FavoriteService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        return FavoriteResource::collection(Favorite::where('user_id', $userId)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteRequest $request): Response
    {
        $favorite = $this->service->store($request->all(), auth()->id());

        return response([
            'message' => 'Favorito criado com sucesso!',
            'data' => FavoriteResource::make($favorite),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite): Response
    {
        return response([
            'message' => 'Favorito consultado com sucesso!',
            'data' => FavoriteResource::make($favorite),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFavoriteRequest $request, Favorite $favorite): Response
    {
        $this->service->update($request->all(), $favorite);

        return response([
            'message' => 'Favorito atualizado com sucesso!',
            'data' => FavoriteResource::make($favorite),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite): Response
    {
        $this->service->forceDelete($favorite);

        return response([
            'message' => 'Favorito deletado com sucesso!',
        ], 200);
    }
}
