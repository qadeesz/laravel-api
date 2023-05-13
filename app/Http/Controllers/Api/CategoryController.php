<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryOnlyResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('products')->paginate(3);
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'categories/' .uniqid().'.'.$file->extension();
            $file->storePubliclyAs('public', $name);
            $data['photo'] = $name;
        }
        // dd($data);
        $category = Category::create($data);
        return new CategoryOnlyResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category){
        // public function show(string $id) {
        return new CategoryResource($category);
        // ->response()
        // ->header('X-Value', 'True');
    }


/**
 * Update the specified resource in storage.
 */
public function update(StoreCategoryRequest $request, Category $category)
{
    $category->update($request->all());

    return new CategoryResource($category);
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Category $category)
{
    $category->delete();
    return new Response(null, Response::HTTP_NO_CONTENT);
}
}
