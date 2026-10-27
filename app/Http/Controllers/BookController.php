<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        $books = [
            [
                'id' => 1,
                'title' => 'Pemrograman Web',
                'author' => 'Andi',
                'price' => 50000
            ],
            [
                'id' => 2,
                'title' => 'Belajar Laravel',
                'author' => 'Budi',
                'price' => 65000
            ],
            [
                'id' => 3,
                'title' => 'Dasar Database',
                'author' => 'Citra',
                'price' => 45000
            ]
        ];

        return response()->json([
            'success' => true,
            'message' => 'Data buku berhasil ditampilkan',
            'data' => $books
        ], 200);
    }
}


