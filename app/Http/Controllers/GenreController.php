<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Menampilkan semua data genre.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil ditampilkan',
            'data'    => Genre::all(),
        ], 200);
    }

    /**
     * Menambahkan genre baru.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Genre berhasil ditambahkan',
            'data'    => $genre,
        ], 201);
    }

    /**
     * Menampilkan satu genre berdasarkan ID.
     */
    public function show(string|int $id): JsonResponse
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data genre berhasil ditemukan',
            'data'    => $genre,
        ], 200);
    }

    /**
     * Mengubah data genre.
     */
    public function update(Request $request, string|int $id): JsonResponse
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $genre->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Genre berhasil diperbarui',
            'data'    => $genre,
        ], 200);
    }

    /**
     * Menghapus data genre.
     */
    public function destroy(string|int $id): JsonResponse
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data genre tidak ditemukan',
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Genre berhasil dihapus',
        ], 200);
    }
}