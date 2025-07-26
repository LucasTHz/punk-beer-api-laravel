<?php

namespace App\Http\Controllers;

use App\Services\Favorite\FavoriteService;
use Illuminate\Support\Facades\Auth;

final class FavoriteController extends Controller
{
    public function __construct(private FavoriteService $favoriteService = new FavoriteService()) {}

    public function index()
    {
        $favorites = $this->favoriteService->getUserFavorites(Auth::id());

        return response([
            'message' => 'Favoritos consultados com sucesso!',
            'data'    => $favorites,
        ]);
    }
}
