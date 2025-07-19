<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCombinationRequest;
use App\Http\Resources\CombinationResource;
use App\Models\Combination;
use App\Services\Combination\CombinationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

final class CombinationController extends Controller
{
    public function __construct(
        private CombinationService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combinations = Combination::where('user_id', Auth::id())->paginate(10);

        return response([
            'message'    => 'Favoritos consultados com sucesso!',
            'data'       => CombinationResource::collection($combinations),
            'pagination' => [
                'pageSize'     => $combinations->perPage(),
                'page'         => $combinations->currentPage(),
                'totalPages'   => $combinations->lastPage(),
                'totalRecords' => $combinations->total(),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCombinationRequest $request): Response
    {
        $this->service->store($request->all(), Auth::id());

        return response([
            'message' => 'Favorito criado com sucesso!',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Combination $combination): Response
    {
        return response([
            'message' => 'Favorito consultado com sucesso!',
            'data'    => CombinationResource::make($combination),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Combination $combination, StoreCombinationRequest $request): Response
    {
        $this->service->update($request->all(), $combination, $request->user()->id);

        return response([
            'message' => 'Favorito atualizado com sucesso!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Combination $combination, Request $request): Response
    {
        $this->service->forceDelete($combination, $request->user()->id);

        return response([
            'message' => 'Favorito deletado com sucesso!',
        ], 200);
    }
}
