<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function store(StoreCategoryRequest $request){

        $category = new Category();

        $category->name = $request->name;
        $category->description= $request->description;

        $category->save();
    }

    public function show($id){
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    public function destroy($id){
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json([
            'message' => 'Category was deleted successfully'
        ]);
    }

    public function update(UpdateCategoryRequest $request, $id){

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->update();

        return response()->json([
            'message' => 'Category was updated successfully.'
        ]);
    }
}
