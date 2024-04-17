<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Favorite\FavoriteDTO;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Services\Favorite\FavoriteService;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function __construct(
        private FavoriteService $service
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = auth()->user();

        return response([
            'favorites' => 'ola mundo'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ds($request->all());
        $favorite = $this->service->store($request);

        return FavoriteResource::make($favorite);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
