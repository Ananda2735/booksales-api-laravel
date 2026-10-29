<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Menampilkan semua data author.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Data author berhasil ditampilkan',
            'data'    => Author::all(),
        ], 200);
    }

    /**
     * Menambahkan author baru.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Author berhasil ditambahkan',
            'data'    => $author,
        ], 201);
    }

    /**
     * Menampilkan satu author berdasarkan ID.
     */
    public function show(string|int $id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data author berhasil ditemukan',
            'data'    => $author,
        ], 200);
    }

    /**
     * Mengubah data author.
     */
    public function update(Request $request, string|int $id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $author->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Author berhasil diperbarui',
            'data'    => $author,
        ], 200);
    }

    /**
     * Menghapus data author.
     */
    public function destroy(string|int $id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data author tidak ditemukan',
            ], 404);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author berhasil dihapus',
        ], 200);
    }
}