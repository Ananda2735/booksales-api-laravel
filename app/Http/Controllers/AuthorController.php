<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    public function index(): JsonResponse
    {
        $authors = [
            [
                'id' => 1,
                'name' => 'Andi'
            ],
            [
                'id' => 2,
                'name' => 'Budi'
            ],
            [
                'id' => 3,
                'name' => 'Citra'
            ],
            [
                'id' => 4,
                'name' => 'Dina'
            ],
            [
                'id' => 5,
                'name' => 'Eko'
            ]
        ];

        return response()->json([
            'success' => true,
            'message' => 'Data penulis berhasil ditampilkan',
            'data' => $authors
        ], 200);
    }
}