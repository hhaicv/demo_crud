<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $data = Game::query()->get();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        $data= $request->all();

        $model= Game::query()->create($data);
        return response()->json($model, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Game::query()->findOrFail($id);
        return response()->json($data, 200);

    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, string $id)
    {
        $model= Game::query()->findOrFail($id);
        $data= $request->all();

        $res=$model->update($data);
        return response()->json($res, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= Game::query()->findOrFail($id);
        $data->delete();
        return response()->json( 200);
    }
}
