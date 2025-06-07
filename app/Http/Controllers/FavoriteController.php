<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Services\Favorite\FavoriteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

final class FavoriteController extends Controller
{
    public function __construct(
        private FavoriteService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->paginate(10);

        return response([
            'message'    => 'Favoritos consultados com sucesso!',
            'data'       => FavoriteResource::collection($favorites),
            'pagination' => [
                'pageSize'     => $favorites->perPage(),
                'page'         => $favorites->currentPage(),
                'totalPages'   => $favorites->lastPage(),
                'totalRecords' => $favorites->total(),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteRequest $request): Response
    {
        $this->service->store($request->all(), Auth::id());

        return response([
            'message' => 'Favorito criado com sucesso!',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite): Response
    {
        return response([
            'message' => 'Favorito consultado com sucesso!',
            'data'    => FavoriteResource::make($favorite),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Favorite $favorite, StoreFavoriteRequest $request): Response
    {
        $this->service->update($request->all(), $favorite, $request->user()->id);

        return response([
            'message' => 'Favorito atualizado com sucesso!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite, Request $request): Response
    {
        $this->service->forceDelete($favorite, $request->user()->id);

        return response([
            'message' => 'Favorito deletado com sucesso!',
        ], 200);
    }
}
