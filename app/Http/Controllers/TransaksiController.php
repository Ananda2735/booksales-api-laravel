<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    // Admin: melihat semua transaksi
    public function index()
    {
        $transaksis = Transaksi::with('user')->get();

        return response()->json([
            'success' => true,
            'message' => 'Semua transaksi berhasil ditampilkan',
            'data' => $transaksis,
        ]);
    }

    // Customer: membuat transaksi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_transaksi' => 'required|string|max:255',
            'total' => 'required|numeric|min:0',
            'status' => 'sometimes|string|max:50',
        ]);

        $validated['user_id'] = Auth::id();

        $transaksi = Transaksi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaksi,
        ], 201);
    }

    // Customer: melihat detail transaksi miliknya
    public function show(Transaksi $transaksi)
    {
        if ($transaksi->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Kamu tidak memiliki akses ke transaksi ini',
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $transaksi->load('user'),
        ]);
    }

    // Customer: memperbarui transaksi miliknya
    public function update(Request $request, Transaksi $transaksi)
    {
        if ($transaksi->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Kamu tidak memiliki akses ke transaksi ini',
            ], 403);
        }

        $validated = $request->validate([
            'nama_transaksi' => 'sometimes|required|string|max:255',
            'total' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|string|max:50',
        ]);

        $transaksi->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui',
            'data' => $transaksi,
        ]);
    }

    // Admin: menghapus transaksi
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dihapus',
        ]);
    }
}

