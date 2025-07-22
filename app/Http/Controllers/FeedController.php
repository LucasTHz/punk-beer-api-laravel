<?php

namespace App\Http\Controllers;

use App\Http\Resources\CombinationResource;
use App\Services\Feed\FeedService;
use Illuminate\Http\Request;

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
}
