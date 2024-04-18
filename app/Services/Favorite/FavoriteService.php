<?php

namespace App\Services\Favorite;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteService
{
    public function store(Request $request)
    {
        $user_id = auth()->id();

        return Favorite::create([
            'user_id'         => $user_id,
            'fav_description' => $request->favoriteDescription,
            'fav_name'        => $request->favoriteName,
            'fav_tagline'     => $request->favoriteTagLine,
            'fav_alcohol'     => $request->favoriteAlcohol,
            'fav_amargor'     => $request->favoriteAmargor,
            'fav_food'        => $request->favoriteFood,
            'fav_tips'        => $request->favoriteTips,
            'fav_img_url'     => $request->favoriteImgUrl,
            'fav_date_beer'   => $request->favoriteDateBeer,
        ]);
    }
}
