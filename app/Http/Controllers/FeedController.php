<?php

namespace App\Http\Controllers;

use App\Http\Resources\CombinationResource;
use App\Models\Combination;
use App\Services\Favorite\FavoriteService;
use App\Services\Feed\FeedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
        /**
     * Display a feed of combinations.
     */
    public function feed(Request $request)
    {

        $feed = (new FeedService())->feed($request->all());

        return response([
            'message'    => 'Combinações consultados com sucesso!',
            'data'       => CombinationResource::collection($feed),
            'pagination' => [
                'pageSize'     => $feed->perPage(),
                'page'         => $feed->currentPage(),
                'totalPages'   => $feed->lastPage(),
                'totalRecords' => $feed->total(),
            ],
        ]);
    }

    public function addToFavorites(Combination $combination)
    {
        (new FavoriteService())->addToFavorites($combination->id, Auth::id());

        return response([
            'message' => 'Combinação adicionada aos favoritos com sucesso!',
        ]);
    }

    public function removeFromFavorites(Combination $combination)
    {
        (new FavoriteService())->removeFromFavorites($combination->id, Auth::id());

        return response([
            'message' => 'Combinação removida dos favoritos com sucesso!',
        ]);
    }
}
