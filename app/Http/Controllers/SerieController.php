<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;
use App\Models\Serie;

use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index(){
        
        $series = Serie::all();

        return response()->json($series);
    }

    public function store(StoreSerieRequest $request){

        $serie = new Serie();

        $serie->name = $request->name;
        $serie->description = $request->description;

        $serie->save();

        return response()->json([
            'message' => 'Serie was added successfully'
        ]);

    }

    public function show($id){
        $serie = Serie::findOrFail($id);

        return response()->json($serie);
    }

    public function destroy($id){
        $serie = Serie::findOrFail($id);

        $serie->delete();

        return response()->json([
            'message' => 'Serie was deleted successfully'
        ]);
    }

    public function update(UpdateSerieRequest $request, $id){

        $serie = Serie::findOrFail($id);

        $serie->name = $request->name;
        $serie->description = $request->description;

        $serie->update();

        return response()->json([
            'message' => 'Serie was updated successfully.'
        ]);
    }
}
