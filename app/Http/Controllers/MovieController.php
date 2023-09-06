<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use app\Models\Movie;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        
        $movies = Movie::all();

        return response()->json($movies);
    }

    public function store(StoreMovieRequest $request){

        $movie = new Movie();

        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category_id = $request->category_id;
        $movie->file = $request->file;
        $movie->thumbnail = $request->thumbnail;
        $movie->rating = $request->rating;
        $movie->serie_id = $request->serie_id;
        $movie->date = now();

        $movie->save();

        return response()->json([
            'message' => 'Movie was added successfully'
        ], 200);

    }

    public function show($id){
        $movie = Movie::findOrFail($id);

        return response()->json($movie);
    }

    public function destroy($id){
        $movie = Movie::findOrFail($id);

        $movie->delete();

        return response()->json([
            'message' => 'Movie was deleted successfully'
        ]);
    }

    public function update(UpdateMovieRequest $request, $id){

        $movie = Movie::findOrFail($id);

        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category_id = $request->category_id;
        $movie->file = $request->file;
        $movie->thumbnail = $request->thumbnail;
        $movie->rating = $request->rating;
        $movie->serie_id = $request->serie_id;
        $movie->date = now();

        $movie->update();

        return response()->json([
            'message' => 'Movie was updated successfully.'
        ]);
    }
}
