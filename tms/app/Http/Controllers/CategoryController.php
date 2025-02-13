<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Get all categories
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name',
            ]);

            // Create new category
            $category = Category::create($validatedData);

            return response()->json($category, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function show($id)
    {
        try {
            // Get the category by id
            $category = Category::findOrFail($id);

            return response()->json($category, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Category not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name',
            ]);

            // Find the category or return 404
            $category = Category::findOrFail($id);

            // Update category with validated data
            $category->update($validatedData);

            return response()->json($category, 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'errors'  => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Category not found'
            ], 404);

        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();
        return response()->json(null, 204);
    }
}
